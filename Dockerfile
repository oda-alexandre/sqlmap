FROM debian:stretch-slim

MAINTAINER https://oda-alexandre.github.io

RUN apt-get update && apt-get install --no-install-recommends -y \
ca-certificates \
apt-transport-https \
sudo \
php \
python \
tor \
privoxy \
apache2 \
git

RUN useradd -d /home/sqlmap -m sqlmap && \
passwd -d sqlmap && \
adduser sqlmap sudo

USER sqlmap

WORKDIR /home/sqlmap

RUN git clone https://github.com/sqlmapproject/sqlmap.git && \
git clone https://github.com/Hood3dRob1n/SQLMAP-Web-GUI.git && \
sudo mv SQLMAP-Web-GUI/sqlmap /var/www/ && \
sudo rm -rf SQLMAP-Web-GUI/

RUN sudo rm -f /etc/privoxy/config && \
sudo rm -f /etc/tor/torcc && \
echo "listen-address localhost:8118" | sudo tee -a /etc/privoxy/config && \
echo "forward-socks5 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4a / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "SOCKSPort localhost:9050" | sudo tee -a /etc/tor/torcc

RUN sudo apt-get --purge autoremove -y \
git

WORKDIR /home/sqlmap/sqlmap

CMD sudo service tor start && sudo service privoxy start && sudo service apache2 start && sqlmapapi -s

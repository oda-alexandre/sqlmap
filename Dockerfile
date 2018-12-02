FROM debian:stretch-slim

MAINTAINER https://oda-alexandre.github.io

RUN apt-get update && apt-get install --no-install-recommends -y \
ca-certificates \
apt-transport-https \
gnupg \
pgpgpg \
dirmngr \
apt-utils \
xz-utils \
wget

RUN echo 'deb https://http.kali.org/kali kali-rolling main contrib non-free' >> /etc/apt/sources.list && \
echo 'deb-src https://http.kali.org/kali kali-rolling main contrib non-free' >> /etc/apt/sources.list && \
wget -q -O - https://archive.kali.org/archive-key.asc | apt-key add

RUN apt-get update && apt-get install --no-install-recommends -y \
sudo \
php \
python \
tor \
privoxy \
apache2 \
sqlmap \
metasploit-framework

COPY ./includes/sqlmap /var/www/

RUN mkdir /tmp/sqlmap

RUN useradd -d /home/sqlmap -m sqlmap && \
passwd -d sqlmap && \
adduser sqlmap sudo

USER sqlmap

RUN sudo rm -f /etc/privoxy/config && \
sudo rm -f /etc/tor/torcc && \
echo "listen-address localhost:8118" | sudo tee -a /etc/privoxy/config && \
echo "forward-socks5 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4a / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "SOCKSPort localhost:9050" | sudo tee -a /etc/tor/torcc

RUN sudo apt-get --purge autoremove -y \
wget

WORKDIR /var/www/sqlmap

CMD sudo service tor start && sudo service privoxy start && sudo service apache2 start && /usr/bin/sqlmapapi -s

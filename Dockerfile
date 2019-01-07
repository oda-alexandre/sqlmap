FROM debian:stretch-slim

MAINTAINER https://oda-alexandre.github.io

# INSTALLATION DES PREREQUIS
RUN apt-get update && apt-get install --no-install-recommends -y \
ca-certificates \
apt-transport-https \
gnupg \
pgpgpg \
dirmngr \
xz-utils \
sudo \
tor \
privoxy \
proxychains \
wget

# INSTALLATION DE L'APPLICATION
RUN apt-get install -y \
sqlmap

# AJOUT UTILISATEUR
RUN useradd -d /home/sqlmap -m sqlmap && \
passwd -d sqlmap && \
adduser sqlmap sudo

# SELECTION UTILISATEUR
USER sqlmap

# CONFIGURATION TOR & PRIVOXY
RUN sudo rm -f /etc/privoxy/config && \
sudo rm -f /etc/tor/torcc && \
echo "listen-address localhost:8118" | sudo tee -a /etc/privoxy/config && \
echo "forward-socks5 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4 / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "forward-socks4a / localhost:9050 ." | sudo tee -a /etc/privoxy/config && \
echo "SOCKSPort localhost:9050" | sudo tee -a /etc/tor/torcc

# NETTOYAGE
RUN sudo apt-get --purge autoremove -y && \
sudo apt-get autoclean -y && \
sudo rm /etc/apt/sources.list && \
sudo rm -rf /var/cache/apt/archives/* && \
sudo rm -rf /var/lib/apt/lists/*

# SELECTION ESPACE DE TRAVAIL
WORKDIR /home/sqlmap

# COMMANDE AU DEMARRAGE DU CONTENEUR
CMD /bin/bash

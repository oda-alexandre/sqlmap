# SQLMAP

[![dockeri.co](https://dockeri.co/image/alexandreoda/sqlmap)](https://hub.docker.com/r/alexandreoda/sqlmap)


## INDEX

- [Badges](#BADGES)
- [Introduction](#INTRODUCTION)
- [Prerequis](#PREREQUIS)
- [Installation](#INSTALLATION)
- [License](#LICENSE)


## BADGES

[![version](https://images.microbadger.com/badges/version/alexandreoda/sqlmap.svg)](https://microbadger.com/images/alexandreoda/sqlmap)
[![size](https://images.microbadger.com/badges/image/alexandreoda/sqlmap.svg)](https://microbadger.com/images/alexandreoda/sqlmap")
[![build](https://img.shields.io/docker/build/alexandreoda/sqlmap.svg)](https://hub.docker.com/r/alexandreoda/sqlmap)
[![automated](https://img.shields.io/docker/automated/alexandreoda/sqlmap.svg)](https://hub.docker.com/r/alexandreoda/sqlmap)


## INTRODUCTION

Ce repository contient le fichier Dockerfile de [sqlmap](http://sqlmap.org)

Mis à jour automatiquement dans le [docker hub public](https://hub.docker.com/r/alexandreoda/sqlmap/).


## PREREQUIS

Installer [docker](https://www.docker.com)


## INSTALLATION

```
docker run -ti --rm --name sqlmap -v ${HOME}:/home/sqlmap alexandreoda/sqlmap
```


## LICENSE

[![GPLv3+](http://gplv3.fsf.org/gplv3-127x51.png)](https://github.com/oda-alexandre/sqlmap/blob/master/LICENSE)

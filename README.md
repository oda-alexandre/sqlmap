# SQLMAP

![sqlmap](https://raw.githubusercontent.com/oda-alexandre/sqlmap/master/img/logo-sqlmap.png) ![docker](https://raw.githubusercontent.com/oda-alexandre/sqlmap/master/img/logo-docker.png)


## INDEX

- [Build Docker](#BUILD)
- [Introduction](#INTRODUCTION)
- [Prerequis](#PREREQUIS)
- [Installation](#INSTALLATION)
- [License](#LICENSE)


## BUILD DOCKER

[![sqlmap docker build](https://img.shields.io/docker/build/alexandreoda/sqlmap.svg)](https://hub.docker.com/r/alexandreoda/sqlmap)


## INTRODUCTION

Ce repository contient le fichier Dockerfile de [sqlmap](http://sqlmap.org) avec interface graphique web pour [Docker](https://www.docker.com), mis à jour automatiquement dans le [Docker Hub](https://hub.docker.com/r/alexandreoda/sqlmap/) public.


## PREREQUIS

Installer [Docker](https://www.docker.com)


## INSTALLATION

```
mkdir $HOME/sqlmap
docker run -d --name sqlmap -v ${HOME}/sqlmap:/home/sqlmap/.sqlmap -v ${HOME}/sqlmap:/var/www/sqlmap -v ${HOME}/sqlmap:/etc/sqlmap alexandreoda/sqlmap
```

lien vers sqlmap http://127.0.0.1/sqlmap/index.php

ID        = sqlmap

PASSWORD  = sqlmap


## LICENSE

[![GPLv3+](http://gplv3.fsf.org/gplv3-127x51.png)](https://github.com/oda-alexandre/sqlmap/blob/master/LICENSE)

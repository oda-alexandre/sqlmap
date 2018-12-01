# SQLMAP

![sqlmap](https://raw.githubusercontent.com/oda-alexandre/sqlmap/master/img/logo-sqlmap.png) ![docker](https://raw.githubusercontent.com/oda-alexandre/sqlmap/master/img/logo-docker.png)


## INDEX

- [Build Docker](#BUILD)
- [Introduction](#INTRODUCTION)
- [Prerequis](#PREREQUIS)
- [Installation](#INSTALLATION)
- [Utilisation](#UTILISATION)
- [License](#LICENSE)


## BUILD DOCKER

[![sqlmap docker build](https://img.shields.io/docker/build/alexandreoda/sqlmap.svg)](https://hub.docker.com/r/alexandreoda/sqlmap)


## INTRODUCTION

Ce repository contient le fichier Dockerfile de [sqlmap](http://sqlmap.org) pour [Docker](https://www.docker.com), mis à jour automatiquement dans le [Docker Hub](https://hub.docker.com/r/alexandreoda/sqlmap/) public.


## PREREQUIS

Installer [Docker](https://www.docker.com)


## INSTALLATION

```
docker run -ti --name sqlmap -v ${HOME}:/home/sqlmap alexandreoda/sqlmap /bin/bash
```


## UTILISATION

Pour utiliser sqlmap associez le à proxychains

```
proxychains sqlmap -u https://votresite.com
```


## LICENSE

[![GPLv3+](http://gplv3.fsf.org/gplv3-127x51.png)](https://github.com/oda-alexandre/sqlmap/blob/master/LICENSE)

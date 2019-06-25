# SQLMAP

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Sqlmap_logo.png/800px-Sqlmap_logo.png" />


## INDEX

- [Badges](#BADGES)
- [Introduction](#INTRODUCTION)
- [Prerequis](#PREREQUIS)
- [Installation](#INSTALLATION)
- [License](#LICENSE)


## BADGES

[![pipeline status](https://gitlab.com/oda-alexandre/sqlmap/badges/master/pipeline.svg)](https://gitlab.com/oda-alexandre/sqlmap/commits/master)


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

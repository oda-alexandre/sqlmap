# SQLMAP

![logo](https://assets.gitlab-static.net/uploads/-/system/project/avatar/12904473/sqlmap.jpg)

## INDEX

- [SQLMAP](#sqlmap)
  - [INDEX](#index)
  - [BADGES](#badges)
  - [INTRODUCTION](#introduction)
  - [PREREQUISITES](#prerequisites)
  - [INSTALL](#install)
    - [DOCKER RUN](#docker-run)
    - [DOCKER COMPOSE](#docker-compose)
  - [LICENSE](#license)

## BADGES

[![pipeline status](https://gitlab.com/oda-alexandre/sqlmap/badges/master/pipeline.svg)](https://gitlab.com/oda-alexandre/sqlmap/commits/master)

## INTRODUCTION

Docker image of :

- [sqlmap](http://sqlmap.org)

Continuous integration on :

- [gitlab pipelines](https://gitlab.com/oda-alexandre/android-studio/pipelines)

Automatically updated on :

- [docker hub public](https://hub.docker.com/r/alexandreoda/sqlmap/)

## PREREQUISITES

Use [docker](https://www.docker.com)

## INSTALL

### DOCKER RUN

```\
docker run -ti --rm \
--name sqlmap \
-v ${HOME}:/home/sqlmap \
alexandreoda/sqlmap
```

### DOCKER COMPOSE

```yml
version: "2.0"

services:
  sqlmap:
    container_name: sqlmap
    image: alexandreoda/sqlmap
    restart: "no"
    privileged: false
    volumes:
      - "${HOME}:/home/sqlmap"
```

## LICENSE

[![GPLv3+](http://gplv3.fsf.org/gplv3-127x51.png)](https://gitlab.com/oda-alexandre/sqlmap/blob/master/LICENSE)

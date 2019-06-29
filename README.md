# SQLMAP

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Sqlmap_logo.png/800px-Sqlmap_logo.png" />


## INDEX

- [Badges](#BADGES)
- [Introduction](#INTRODUCTION)
- [Prerequisites](#PREREQUISITESITES)
- [Install](#INSTALL)
- [License](#LICENSE)


## BADGES

[![pipeline status](https://gitlab.com/oda-alexandre/sqlmap/badges/master/pipeline.svg)](https://gitlab.com/oda-alexandre/sqlmap/commits/master)


## INTRODUCTION

Docker image of :

- [sqlmap](http://sqlmap.org)

Continuous integration on :

- [gitlab](https://gitlab.com/oda-alexandre/android-studio/pipelines)

Automatically updated on :

- [docker hub public](https://hub.docker.com/r/alexandreoda/sqlmap/)


## PREREQUISITES

Use [docker](https://www.docker.com)


## INSTALL

```
docker run -ti --rm --name sqlmap -v ${HOME}:/home/sqlmap alexandreoda/sqlmap
```


## LICENSE

[![GPLv3+](http://gplv3.fsf.org/gplv3-127x51.png)](https://gitlab.com/oda-alexandre/sqlmap/blob/master/LICENSE)

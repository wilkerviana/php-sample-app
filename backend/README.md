# Estrutura do container

Link DockerHub: [backend-fiap-php](https://hub.docker.com/r/wilkerviana/backend-fiap-php/)

## 1. Dockerfile
A partir de um arquivo **Dockerfile** na pasta "php-sample-app/backend", foi realizada a configuração através de comandos utilizados para criar a build de uma imagem do Docker e também executar instâncias de containers.
Com base nesse arquivo serão criadas *Layers Customizadas* utilizando as Default Layers do container MySQL.

#### 1.1 O Dockerfile do "php-sample-app/backend"

Imagem base para build customizado
> **FROM mysql:5.7**

Copia os arquivos do diretório root atual que contém o banco mysql
> **COPY ./demo.sql /docker-entrypoint-initdb.d**

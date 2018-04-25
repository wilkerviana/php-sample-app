# Estrutura do container

## 1. Dockerfile
A partir de um arquivo **Dockerfile** na pasta "php-sample-app/frontend", foi realizada a configuração através de comandos utilizados para criar a build de uma imagem do Docker e também executar instâncias de containers.
Com base nesse arquivo serão criadas *Layers Customizadas* utilizando as Default Layers do container PHP.

#### 1.1 O Dockerfile do "php-sample-app/frontend"

Imagem base para build customizado
> **FROM php:7.2-apache**

Executa o comando de instalação da extensão mysqli
(necessário para integração com o database)
> **RUN docker-php-ext-install mysqli**

Referência de diretório
>**WORKDIR /var/www/html/**

Copia os arquivos do diretório root atual
> **COPY . /var/www/html/**

Porta padrão exposta para uso
> **EXPOSE 80**
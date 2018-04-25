# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

Para utilizar este container basta criar um arquivo *~obrigatório~* ".env" no diretório root da sua aplicação, com as seguintes variáveis de ambiente:

````
    DB_SERVER=[nome do container de db] -> aplicação utiliza o "backend"
    DB_NAME=[nome do banco de dados] -> nesse caso a aplicação está utilizando "demo"
    DB_USERNAME=[usuario mysql]
    DB_PASSWORD=[senha usuario mysql]
````
** *Importante*: essas variáveis são utilizadas nas configurações do front-end e na configuração do MySQL **

Feito isso baixe o container:

````
    docker pull wilkerviana/php-sample-app
````

Por fim, execute o comando:
````
    docker-compose up -d
````
Abra seu navegador e encontre a aplicação rodando no endereço:
````
    localhost:3000
````

## That's all folks! 🤓🖖🏼

---
### Builds da aplicação
 As instruções de como configurar os builds para subir a aplicação do *Docker* :

 - [Frontend](https://github.com/wilkerviana/php-sample-app/blob/master/frontend/README.md)
 - [Backend](https://github.com/wilkerviana/php-sample-app/blob/master/backend/README.md)

---

## Docker Compose

O arquivo [docker-compose](https://github.com/wilkerviana/php-sample-app/blob/master/docker-compose.yml) consiste basicamente na configuração de serviços e criação de uma rede local.

O intuito de criação deste arquivo é diminuir a exposição de erros ao executar a construção de containers de forma manual e agilizar a execução da aplicação.

Abaixo temos as configurações referentes ao container *frontend:*

- build: diretório que contém o Dockerfile referente a aplicação
- image: imagem de build utilizada
- ports: exposição de portas local:aplicação
- networks: rede local para comunicação entre containers
- links: link com database
- volumes: diretório de espelhamento de arquivos
- env_file: arquivo com variáveis de ambiente
- container_name: nome do container

````
    php:
    build: ./frontend
    image: wilkerviana/frontend-fiap-php
    ports:
      - 3000:80
    networks:
      - php-sample-network
    links:
      - db
    volumes:
      - ./frontend:/var/www/html
    env_file: ./.env
    container_name: frontend
````

Em seguida as configurações referentes ao container *backend:*

````
    db:
    build: ./backend
    image: wilkerviana/backend-fiap-php
    environment:
      MYSQL_ALLOW_EMPTY_PASSWORD: 'yes'
      MYSQL_ROOT_PASSWORD: ''
      MYSQL_DATABASE: ${DB_NAME}
      MYSQL_USER: ${DB_USERNAME}
      MYSQL_PASSWORD: ${DB_PASSWORD}
    networks:
      - php-sample-network
    volumes:
      - /var/lib/mysql
    env_file: ./.env
    container_name: backend
````

- environment: configuração de variáveis de ambiente MySQL

---

***Importante:***

Instruções sobre modelo de execução e entregáveis podem ser obtidas no [diretório de documentação](https://github.com/fiapsecdevops/php-sample-app/tree/master/docs) ou no portal do aluno;

Duvidas podem ser enviadas para <profhelder.pereira@fiap.com.br>

Esta app foi adaptada do exemplo contido [neste artigo](https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php)

A estrutura foi criada com base nas seguintes tags:

- frontend-0.1: Versão de testes SEM conexão com o banco para a primeira parte da NAC;
- stable:  Versão COM as linhas de conexão com o banco configuradas, será necessário que o MySQL esteja operante para testes faltando apenas a criação do Dockerfile da aplicação/mysql;

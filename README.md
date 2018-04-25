# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

Para utilizar este container basta criar um arquivo ".env" no diretório root da sua aplicação, com as seguintes variáveis:

````
    DB_SERVER=[nome do container de db] -> aplicação utiliza o "backend"
    DB_NAME=[nome do banco de dados] -> nesse caso a aplicação está utilizando "demo"
    DB_USERNAME=[usuario mysql]
    DB_PASSWORD=[senha usuario mysql]
````
Feito isso baixe o container:

````
    docker pull wilkerviana/php-sample-app
````

Por fim, execute o comando:
````
    docker-compose up -d
````

## That's all folks! 🤓🖖🏼

---
### Builds da aplicação
 As instruções de como configurar os builds para subir a aplicação do *Docker* :

 - [Frontend](https://github.com/wilkerviana/php-sample-app/blob/master/frontend/README.md)
 - [Backend](https://github.com/wilkerviana/php-sample-app/blob/master/backend/README.md)

---

***Importante:***

Instruções sobre modelo de execução e entregáveis podem ser obtidas no [diretório de documentação](https://github.com/fiapsecdevops/php-sample-app/tree/master/docs) ou no portal do aluno;

Duvidas podem ser enviadas para <profhelder.pereira@fiap.com.br>

Esta app foi adaptada do exemplo contido [neste artigo](https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php)

A estrutura foi criada com base nas seguintes tags:

- frontend-0.1: Versão de testes SEM conexão com o banco para a primeira parte da NAC;
- stable:  Versão COM as linhas de conexão com o banco configuradas, será necessário que o MySQL esteja operante para testes faltando apenas a criação do Dockerfile da aplicação/mysql;

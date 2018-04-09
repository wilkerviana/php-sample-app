# Sistemas para Internet - SecDevOps

**Objetivo:** Criação de uma aplicação no formato CRUD (Create, Read, Update e Delete) executada em containers com base na linguagem "PHP" e no sistema gerenciador de banco de dados "MySQL";

**Data de Entrega:** 16 de Abril de 2018

---

## Execução

Criar os arquivos Dockerfile necessários para execução desta aplicação utilizando containers de acordo com a arquitetura e itens descritos abaixo:

1. Executar um fork deste repositório para que alterações pessoais possam ser feitas;

2. Escrever o Dockerfile para que a aplicação possa rodar em um container de frontend executando PHP com apache ou somente PHP de acordo com [as imagens oficiais do projeto](https://hub.docker.com/_/php/).

**Dica:** Tenha em mente que para que o PHP se conecte ao banco de dados MySQL será necessário instalação do módulo "mysqli" na imagem gerada, ou seja o plugin de banco deve ser instalado no PHP que rodará a aplicação, o que pode ser feito utilizando a instrução abaixo na composição de seu dockerfile:

```sh
RUN docker-php-ext-install mysqli
```

> Para maior detalhamento técnico verificar item "How to install more PHP extensions" na documentação do [dockerhub](https://hub.docker.com) na página oficial do projeto php: [https://hub.docker.com/_/php/](https://hub.docker.com/_/php/).

3. Criar a documentação do projeto conforme descrito abaixo:

* 3.1: Na pasta raiz de cada componente (frontend e backend) criar o arquivo README.md com a documentação referente a estrutura e execução do projeto, este arquivo deverá conter instruções detalhadas sobre como executar o build do projeto (seja ele manual ou automatizado) e criar/acessar os containers bem como variáveis e arquivos de configuração relevantes a execução ou customização da aplicação;

* 3.2: Na pasta raiz do projeto editar o arquivo README.md adicionando instruções sobre como executar a aplicação, ou seja, como executar os containers de frontend e backend e acessar o resultado além de quaisquer outros dados que julgar necessário e finalmente a especificação de quais componentes são statefull e quais componentes são stateless;

4. Criar o Dockerfile ou instruções necessárias para execução do banco de dados, lembre-se de que o banco deverá ser populado com a tabela demo.sql disponível no diretório [backend/](https://github.com/fiapsecdevops/php-sample-app/tree/master/backend);

**Dica:** Para que os containers se comuniquem será necessário que o container de frontend seja executado com a criação de uma bridge (uma rede interna do docker comunicando os containers que compõem a aplicação) ou com o uso da instrução "--link", **um processo de configuração que será executado em sala durante a NAC** você pdoe se adiantar e construir seu próprio setuo utilizando como base o exemplo abaixo:

```sh
docker run -d -p 80:80 --link <nome-do-container-mysql> --name frontend <nome-do-container-php>
```

Tenha em mente que o uso da opção "--link" é uma opção legada, verifique informações a respeito deste processo e do uso de bridges [nesta documentação](https://docs.docker.com/network/links/#communication-across-links);

> Verifique também qual a melhor forma de definir os parâmetros de comunicação com o banco e como armazenar esses dados, além disso considere que seria interessante NÃO UTILIZAR o usuário root ou definir uma senha para conexão com o banco, claro que esses dados também devem ser versionados e neste caso tomando curidado de definir um formato sem expor senhas ou dados pessoais.

Fica a cargo do desenvolvedor decidir se a o container com mysql será executado a partir da imagem original com comandos manuais para configurar o banco demo.sql ou se para execução será feito um processo de build via Dockerfile onde o banco "demo" será adicionado gerando uma imagem para o projeto a partir da [imagem oficial do mysql](https://hub.docker.com/_/mysql/);

## Critérios de Avaliação

A documentação criada deverá ser suficiente para execução da aplicação sem qualquer informação adicional, ou seja, a correção será feita lendo a documentação e executando conforme descrito, o resultado esperado é o acesso ao CRUD com gravação no SGBD funcionando conforme esperado e demosntrado em sala;

### Items/Pontuação

| Item  | Descrição                                                                     | Peso          |
|-------|-------------------------------------------------------------------------------|---------------|
| 1 e 2 | Fork e criação do Dockerfile para execução do componente de frontend;         | 5 pontos      |
| 3     | Documentação incluindo informações de execução e detalhamento de componentes; | 3 pontos      |
| 4     | Dockerfile e/ou Intruções para configuração e execução do banco;              | 2 pontos      |
| extra | Build automatico do frontend no dockerhub e versionamento via TAGS;           | 1 ponto na PS |

---

# Questão Extra
Configurar o processo de build de imagens automático usando a integração entre o git e o Docker Hub, a aplicação deverá iniciar um processo de build toda vez que uma nova tah for gerada, documentar o processo e adicionar na documentação o link para o repositório no Docker Hub para validação; 

**“Valor” da questão extra**
Essa questão não contempla o escopo da avaliação por tanto não entra na contagem de 0 a 10 para atribuição de nota, ao invés disso o processo devidamente configurado é validado valerá 1.5 pontos extras na PS;

---

Boa Avaliação!

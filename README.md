
# Setup Docker Laravel 11 com PHP 8.3
Portal Notícias Main.
Essa branch é a que eu estou trabalhando, caso você queira o projeto limpo criei outras branches para isso:
<img src="https://github.com/user-attachments/assets/53127274-d463-4924-855b-de5f162514b2" alt="branches" height="300" width="300"/>

- **crud base:** As operações básicas para monitorar as notícias funcionam e tem pouca estilização. (recomendável pra turma clonar)
- **Main:** A que eu estou trabalhando. Vou usar govDS (não recomendo que clone se quiser personalizar o seu)
- **laravel breeze:** Limpo e com Breeze configurado.
- **laravel ui:** alternativa ao Breeze. Breeze usa tailwind pra estilizar. laravel ui permite usar bootstrap, react e vue nativamente.
- **setup-docker:** caso queira iniciar um outro projeto do zero, comece por aqui.

Estou utilizando o Laravel Scout com Algolia para implementar a função de Search no site com IA.
Caso queira usar o código da branch Main, também é necessário também é necessário preencher sua chave de API do [algolia](https://www.algolia.com/pt-br/) no .env. É de graça, basta [criar uma conta](https://www.algolia.com/pt-br/) .

# Pré-requisitos

Para executar este projeto, você precisará ter os seguintes softwares instalados e configurados em seu ambiente:

- **Docker**: Docker é uma plataforma de contêineres que permite criar, testar e implantar aplicativos rapidamente.  <img src="https://github.com/user-attachments/assets/e6d27697-bdd4-4534-9310-31e6f5e39ca7" alt="branches" height="40" width="40"/>
  - [Instalação do Docker](https://docs.docker.com/get-docker/) 

- **Git**: Git é um sistema de controle de versão distribuído, amplamente utilizado para desenvolvimento de software.
  - [Instalação do Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)



### Passo a passo
Clone Repositório
```sh
git clone https://github.com/Takeshi-mi/portal-noticias-Laravel.git app-laravel
```
```sh
cd app-laravel
```

Suba os containers do projeto
```sh
docker-compose up -d
```

OPCIONAL: Gere o banco SQLite (caso não use o banco MySQL)
```sh
touch database/database.sqlite
```
O arquivo já está configurado para o MySQL

Rodar as migrations
```sh
php artisan migrate
```

Para rodar o Vite:
```sh
# De dentro do container:
npm install
npm run build

# OU
# De fora do container:
docker compose exec npm install && npm run build
```
Para deixar o storage publico e aparecer as imagens:
```sh
php artisan storage
```
Acesse o projeto
[http://localhost:8000](http://localhost:8000)

Caso queira encerrar o docker:
```sh
docker-compose down
```

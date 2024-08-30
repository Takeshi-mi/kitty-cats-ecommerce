# Kitty Cats Ecommerce
meaw (>.<)

# Setup Docker Laravel 11 com PHP 8.3

Estamos utilizando o Laravel Scout com Algolia para implementar a função de Search no site com IA.
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
git clone https://github.com/Takeshi-mi/kitty-cats-ecommerce.git kitty-cats
```
```sh
cd app-laravel
```

Suba os containers do projeto
```sh
docker-compose up -d
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

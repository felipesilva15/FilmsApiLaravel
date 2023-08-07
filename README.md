
<h1 align="center">
  API de filmes - Laravel
</h1>

<div align="center">
   <img src="http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=RED&style=for-the-badge" alt="badge-desenvolvimento"/>
</div>

<div align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/felipesilva15/FilmsApiLaravel.svg">
  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/felipesilva15/FilmsApiLaravel.svg">
  <img alt="Repository size" src="https://img.shields.io/github/repo-size/felipesilva15/FilmsApiLaravel.svg">
  <a href="https://github.com/felipesilva15/FilmsApiLaravel/commits/main">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/felipesilva15/FilmsApiLaravel.svg">
  </a>
  <a href="https://github.com/felipesilva15/FilmsApiLaravel/issues">
    <img alt="Repository issues" src="https://img.shields.io/github/issues/felipesilva15/FilmsApiLaravel.svg">
  </a>
  <img alt="GitHub" src="https://img.shields.io/github/license/felipesilva15/FilmsApiLaravel.svg">
</div>

## 📝 Descrição do projeto

Este é um projeto se baseia em uma API de locação de filmes, no qual permite o usuário de se cadastrar, cadastrar filmes e registrar a locação dos mesmos.

## 🚀 Rodando localmente

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

* PHP v8.2.0+
* Composer

### 🔧 Instalação

1. Clone o projeto utilizando o comando abaixo

``` bash
  git clone https://github.com/felipesilva15/FilmsApiLaravel.git
```

2. Acesse a pasta dos fonts deste projeto

```bash
  cd FilmsApiLaravel
```

3. Instale as dependências do projeto

```bash
  composer install
```

4. Copie o arquivo de exemplo de variáveis de ambiente  

```bash
  cp .env.example .env
```

5. Atualize as credenciais de acesso ao seu banco de dados e secret para o JWT preenchendo os campos abaixo

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=

  JWT_SECRET=example-secret
```

6. Gere a chave da aplicação  

```bash
  php artisan key:generate
```

7. Gere as tabelas da aplicação e a semente para o serviço de autenticação

```bash
  php artisan migrate --seed
```

8. Inicie a aplicação

```bash
  php artisan serve
```

9. Acesse a aplicação (Geralmente é inicializada no endereço <http://localhost:8000>).

### 🧪 Testes

Você pode realizar os testes das rotas disponíveis através do [Postman](https://www.postman.com/) importando a collection v2.1 [FilmsApiLaravel.postman_collection.json](https://github.com/felipesilva15/FilmsApiLaravel/blob/main/FilmsApiLaravel.postman_collection.json) deste projeto.

## 🛠️ Construído com

* [Laravel (PHP)](https://laravel.com/) - Framework de PHP para Front-end e Back-end

## ✒️ Autores

* **Felipe Silva** - *Desenvolvedor e mentor* - [felipesilva15](https://github.com/felipesilva15)

## 📄 Licença

Este projeto está sob a licença (MIT) - veja o arquivo [LICENSE](https://github.com/felipesilva15/FoxtrotToyStore/blob/main/LICENCE) para detalhes.

---
Documentado por [Felipe Silva](https://github.com/felipesilva15) 😊

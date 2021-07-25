#  HeroBook
  
  
##  Tabela de conteudos
  
  
- [Sobre](#about )
- [Inicializando](#getting_started )
  
##  Sobre <a name = "about"></a>
  
Uma aplicação simples que simula um catálogo de heróis. Com ela, podemos cadastrar novos heróis com nome, descrição, imagem e super-poderes. Podemos também deletar, editar e visualizar individualmente cada herói.
  
  
  
###  Pré-requisitos <a name = "pre-requisites"></a>
  
  
```bash
- PHP >= 7.3
- MySQL >= 8.0.25 #Mais recomendado
```
  
###  Instalação
  
  
Para instalar o projeto e baixar suas dependências, execute:
  
```bash
$ git clone https://github.com/nicolaswalcker/herobook
$ cd herobook
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan serve
```
Acesssar pela url: http://localhost:8000/heroes
  
  
  
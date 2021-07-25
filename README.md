# HeroBook

## Tabela de conteudos

- [Sobre](#about)
- [Inicializando](#getting_started)
- [Pré-requisitos](#pre-requisites)
- [Instalação](#initialization)

## Sobre <a name = "about"></a>
Uma aplicação simples que simula um catálogo de heróis. Com ela, podemos cadastrar novos heróis com nome, descrição, imagem e super-poderes. Podemos também deletar, editar e visualizar individualmente cada herói.



### Pré-requisitos <a name = "pre-requisites"></a>

```bash 
- PHP >= 7.3
- Composer >= 2.0
- Laravel >= 8.0
- MySQL >= 8.0 #Mais recomendado
- Node >= 15.14
- NPM ou Yarn
```

### Instalação <a name = "installation"></a>

Para instalar o projeto e baixar suas dependências, execute:

```bash
$ git clone https://github.com/nicolaswalcker/herobook
$ cd herobook
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
php artisan storage:link #habilita link simbólico com storage
$ php artisan serve
```
Acesssar pela url: http://localhost:8000/heroes





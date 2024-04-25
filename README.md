# API de Usuários

API de Usuários desenvolvida como desafio técnico para o cargo de desenvolvedor PHP.

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
PHP 8.0 ou superior
Banco de Dados MySQL 8 ou superior
Gerenciador de dependências PHP (Composer)
Você também pode rodar a partir do Docker, basta rodar o comando 'docker-compose up -d' para levantar todo o ambiente necessário
```

## 📦 Implantação

Basta clonar o projeto para para um diretório de sua preferência e inicializar o servidor embutido do próprio Laravel para levantar a aplicação. <br/>
Em seguida faça um cópia do arquivo '.env.example' com o nome '.env', e adicione as credênciais do banco de dados que você instalou. <br/>
Rode o comando 'composer install' para instalar as dependências da aplicação. <br/>
Rode o comando 'php artisan migrate' para rodar as migrations de versionamento do banco de dados. <br/>
Rode o comando 'php artisan key:generate' para gerar a chave de segurança da aplicação. <br/>

## 🛠️ Construído com

* [Laravel](https://laravel.com/) - Framework utilizado

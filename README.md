<h1>Restaurant Reservation API</h1>
<p>A Restaurant Reservation API é uma aplicação construída com Laravel que permite a gestão de reservas de mesas em restaurantes. 
Este README fornece uma visão geral do projeto, como configurá-lo, executá-lo e usá-lo.</p>

## Índice

- Pré-requisitos
- Instalação
- Configuração
- Migrações e Seeders
- Executando a Aplicação
- Contribuição

## Pré-requisitos

<p>Antes de começar, certifique-se de ter os seguintes pré-requisitos instalados:</p>

- PHP >= 8.2
- Composer
- MySQL
- Laravel CLI

## Instalação

1. Clone o repositório para a sua máquina local:

```
git clone https://github.com/silviooosilva/Restaurant-Reservation-API.git
cd Restaurant-Reservation-API
```

2. Instale as dependências

```
composer install
```

## Configuração

1. Copie o arquivo de exemplo .env e configure suas variáveis de ambiente:

```
cp .env.example .env
```

2. Gere uma nova chave de aplicação:

```
php artisan key:generate
```

<p>Configure o arquivo .env com suas credenciais do banco de dados e outras configurações necessárias.</p>

3. Gere as chaves de encriptação do Passport:

```
php artisan passport:keys
```

## Migrações e Seeders

1. Execute as migrações para criar as tabelas no banco de dados:

```
php artisan migrate
```

<p>Ou, pode ainda importar o arquivo <b>SQL</b>no diretório migrations</p>

```
apidb.sql
```

2. Execute os seeders para gerar o acesso Admin:

```
php artisan db:seed
```

## Executando a Aplicação

1. Inicie o servidor de desenvolvimento:

```
php artisan serve
```

## Contribuiçao

Se você deseja contribuir com este projeto, siga estas etapas:

1. Faça um fork do projeto.
2. Crie um branch para sua feature (git checkout -b feature/nova-feature).
3. Commit suas mudanças (git commit -m 'Adiciona nova feature').
4. Envie para o branch (git push origin feature/nova-feature).
5. Abra um Pull Request.

<h1>FEITO COM 💜 POR: <b>SÍLVIO SILVA</b></h1>

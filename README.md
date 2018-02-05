# real-state-admin

Laravel 5.5 application that manages properties.

## Environment Requirements

- PHP >= 7.0.0
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
- Composer
- Nginx/Apache

 You can use the current version of Homestead as well.

## Installation

Clone this repo into your machine:

```bash
git clone https://github.com/mbemvieira/real-state-admin
```

Inside your repo folder, run the following commands:

```bash
composer install
npm install
npm run dev
php artisan key:generate
cp .env.example .env
```

Set DB configurations on .env file and run the migrations and seeder:

```bash
php artisan migrate --seed
```

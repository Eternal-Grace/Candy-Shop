# Candy-Shop
「Candy Shop」 - 'Laravel 5.8' Project

## Intro

This is the Candy-Shop.
NO! Not the one from that rapper in the United States.
And actual, genuine Candy-Shop. We sell candy!
Seriously! WE DO!

~ This is an actual __Technical Test__ required by a company to showcase my skills in under 24h.

## Setup

1) COPY/PASTE the following:
```shell
echo -e "Copy example ENV file"
cp .env.example .env

echo -e "Generate Key"
php artisan key:generate
```

2) ENTER `.env` file.

3) EDIT the following variables:
- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=

4) Copy/Past the following:
```shell
php artisan optimize
php artisan migrate:status
```
IF you encounter an error on __(4)__. FIX IT BEFORE YOU PROCEED.

5) COPY/PASTE the following:
```shell
echo -e "Migrate Tables to Database"
php artisan migrate

echo -e "Import Products DATA to Database"
php artisan db:seed
```
6) FINALLY
```shell
php artisan serve
```

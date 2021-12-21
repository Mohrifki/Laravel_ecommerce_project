## Requirements

	PHP = ^7.3|^8.0
    laravel-ui = ^3.2

## Install

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install 

```
composer install
```

Install Nodejs


[Download Node.js](https://nodejs.org/en/download/)

step untuk menjalankan project
1. download or clone project
2. Go to the folder application using cd
3. Run composer install on your cmd or terminal
4. Copy .env.example file to .env on root folder. 
    You can type copy .env.example .env if using command prompt Windows 
    or cp .env.example .env if using terminal Ubuntu
5. Open your .env file and change the database name (DB_DATABASE)
6. Run php artisan key:generate
7. Run php artisan migrate
8.Run php artisan serve


NPM dependencies
```
npm install
```

Using Laravel Mix 

```
npm run dev
```

## How to setting 

Go into .env file and change Database and Email credentials.

```
php artisan migrate
```

```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=UserRoleSeeder
php artisan db:seed --class=DatabaseSeeder
```
	
Generating a New Application Key
```
php artisan key:generate
```

install vue loader
```
npm i vue-loader  
```

update vue-loader
```
php artisan ui vue 
```

install vue router
```
npm install vue-router 
```

add plugin image
```
php composer require intervention/image 
```
```
php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent" 
```

install vue pagination
```
npm install laravel-vue-pagination
```
```
php artisan ui vue
```

install vuex
```
npm install vuex --save
```

install vuex persistedstate 
```
npm install --save vuex-persistedstate
```

install stripe
```
npm install --save stripe
```
```
npm install --save stripe
```
```
npm i -s vue-owl-carousel
```

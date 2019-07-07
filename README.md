# Бекэнд сайта - путеводитель по крыму

## Настройка окружения
Для работы Laravel 5.8 требуется PHP 7.1.3 и выше с установленными модулями: BCMat, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML. Чтобы посмотреть какие расширения PHP у вас установленны используйте след. команды.
```
php -m // Модули
php -i // Текущая конфигурация
```
Например на моейм VPS (Vscale.io) небыл установлен модуль BCMat. Установим недостающие модули. 
```
sudo apt install php7.0-bcmath
```
Добавляем или изменяем конфиги в nginx
https://github.com/daylerees/laravel-website-configs/blob/master/nginx.conf

## Установка Laravel
Установим Laravel глобально при помощи композера
```
composer global require laravel/installer
```
Если нужно удалить какой либо пакет то 
```
composer global remove <name>
```
Или просмотреть какие завизимости есть
```
composer global show -i
```
Или посмотреть какие новые версии есть у пакетов
```
composer global show -i
```
Настроим bash чтобы стала доступна команда laravel. Добавьте следующее в конец файла ```.bashrc``` файл (не .bash_profile).
```
export PATH=~/.config/composer/vendor/bin:$PATH
```
А затем выполните команду ```source ~/.bashrc``` в терминале. Перезапустим терминал. Перейдем в папку проекта и установим Laravel
```
laravel new app
```
Установим все библиотеки и зависимости 
```
composer install
```
Возникли проблемы с настройкой прав папок и файлов так как устанавливал из под root, перейдем в папку ниже корневой Laravel
```
sudo chown -R www-data:www-data backend/
sudo find backend/ -type f -exec chmod 644 {} \;
sudo find backend/ -type d -exec chmod 755 {} \;
```
Откроем доступы серверу для записи в кеш и хранилище, перейдем в корень Laravel
```
cd backend
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```
Также нужно установить ключ предварительно клонировав файл .env.example лежащий в корне laravel (переименовать его в .env) и после этого запустить генератор ключа в консоле 
```
php artisan key:generate
```

## Запуск проекта из репозитория
Клонируем репозиторий на сервер
```
git clone git@github.com:renderlife/crimea-guide-book-backend.git
```
Если возникли проблемы с настройкой прав папок и файлов так как устанавливал из под root, перейдем в папку ниже корневой Laravel
```
sudo chown -R www-data:www-data backend/
sudo find backend/ -type f -exec chmod 644 {} \;
sudo find backend/ -type d -exec chmod 755 {} \;
```
Откроем доступы серверу для записи в кеш и хранилище, перейдем в корень Laravel
```
cd backend
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```
Установим все библиотеки и зависимости 
```
composer install 
```
Также нужно установить ключ предварительно клонировав файл .env.example лежащий в корне laravel (переименовать его в .env) 
```
cp .env.example .env
```
и после этого запустить генератор ключа в консоле 
```
php artisan key:generate
```
Создадим базу и настроим привилегии, укажем настройки подключения к базе в файле .env и применим миграции по умолчанию 
```
php artisan migrate
```

Лицензия
----

MIT

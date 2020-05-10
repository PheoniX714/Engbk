;<? exit(); ?>

[database]

;Сервер базы данных
db_server = "astyle.mysql.ukraine.com.ua"

;Пользователь базы данных
db_user = "astyle_maincms"

;Пароль к базе
db_password = "rfqvkqle"

;Имя базы
db_name = "astyle_maincms"

;Префикс для таблиц
db_prefix = f_;

;Кодировка базы данных
db_charset = UTF8;

;Режим SQL
db_sql_mode =;

;Смещение часового пояса
;db_timezone = +04:00;


[php]
error_reporting = E_ALL;
php_charset = UTF8;
php_locale_collate = ru_RU;
php_locale_ctype = ru_RU;
php_locale_monetary = ru_RU;
php_locale_numeric = ru_RU;
php_locale_time = ru_RU;
;php_timezone = Europe/Moscow;

logfile = admin/log/log.txt;

[smarty]

smarty_compile_check = true;
smarty_caching = false;
smarty_cache_lifetime = 0;
smarty_debugging = false;
smarty_html_minify = false;
 
[images]
;Использовать imagemagick для обработки изображений (вместо gd)
use_imagick = true;

;Директория оригиналов изображений
original_images_dir = files/originals/;

;Директория миниатюр
resized_images_dir = files/products/;

;Изображения категорий
category_images_dir = files/category/; 

;Изображения брендов
brands_images_dir = files/brands/;

;Превью страницы
page_image_dir = files/pages/;

Дополнительные изображения страниц
page_images_dir = files/page_images/;

;Превью новостей
news_image_dir = files/news/;

;Дополнительные изображения страниц
news_images_dir = files/news_images/;

;Файл изображения с водяным знаком
watermark_file = engine/files/watermark/watermark.png;

[files]

;Директория хранения цифровых товаров
downloads_dir = files/downloads/;

debug = 1;
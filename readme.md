<p>Server Requirements : </p>
<ol>
    <li>PHP >= 7.1.3</li>
    <li>OpenSSL PHP Extension</li>
    <li>PDO PHP Extension</li>
    <li>Mbstring PHP Extension</li>
    <li>Tokenizer PHP Extension</li>
    <li>XML PHP Extension</li>
    <li>Ctype PHP Extension</li>
    <li>JSON PHP Extension</li>
</ol>

<p>How To Install </p>
<ol>
    <li>Clone : git@github.com:jrpikong/pinjam.git</li>
    <li>Run "composer install"</li>
    <li>Run In your terminal "cp .env.example .env" add setting databse, save and run "php artisan key:generate"</li>
    <li>Run migration table "php artisan migrate" make sure you have already database</li>
    <li>Run faker data product dummy "php artisan db:seed --class=ProductsTableSeeder
"</li>
    <li>run "php artisan serve" and go to your web browser and type in your url "http://localhost:8000"</li>
    <li>Done</li>
</ol>
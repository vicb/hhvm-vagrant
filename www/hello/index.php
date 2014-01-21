<?hh

require "/vagrant/www/xhp/php-lib/init.php";

$hello = "Hello HACK!";

echo <html>
    <head>
        <title>{$hello}!</title>
    </head>
    <body>
        <h1>{$hello}</h1>
    </body>
</html>;

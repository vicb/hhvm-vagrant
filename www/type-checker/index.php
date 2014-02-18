<?hh // strict

require "/vagrant/www/xhp/php-lib/init.php";

set_error_handler(function ($no, $str) {
    $func = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
    $line = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['line'];
    echo <p>ERROR(calling "{$func}()" on l.{$line}) : {$str}</p>;
});

function add(int $a, int $b): int {
    return $a + $b;
}

// ERROR(calling "add()" on l.17) : Argument 2 passed to add() must be an
// instance of int, string given
echo <p>add(1, "a") = {add(1, "a")}</p>;

// ERROR(calling "add()" on l.22) : Argument 2 passed to add() must be an
// instance of int, string given
function add_array(array<int> $a): int {
    return array_reduce($a, "add", 0);
}

echo <p>add_array([1, "a"]) = {add_array([1, "a"])}</p>;
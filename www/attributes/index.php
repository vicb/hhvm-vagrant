<?hh

require "/vagrant/www/xhp/php-lib/init.php";

<< UA('klass', ['type' => 'class']) >>
class klass {
    protected $prop;

    << UA(['type' => 'function']) >>
    public function funktion(<< Argument >> $arg) {
    }
}

$rc = new ReflectionClass(klass);
$rm = $rc->getMethod('funktion');
$ra = $rm->getParameters()[0];

// On class
// array ( 'UA' => array ( 0 => 'klass', 1 => array ( 'type' => 'class', ), ), )
// On method
// array ( 'UA' => array ( 0 => array ( 'type' => 'function', ), ), )
// On argument
// array ( 'Argument' => array ( ), )
echo <div><h1>User annotations</h1>
    <h2>On the class</h2><p>{var_export($rc->getAttributes(), true)}</p>
    <h2>On the method</h2><p>{var_export($rm->getAttributes(), true)}</p>
    <h2>On the argument</h2><p>{var_export($ra->getAttributes(), true)}</p></div>;

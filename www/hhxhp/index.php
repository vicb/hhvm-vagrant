<?hh

require "/vagrant/www/xhp/php-lib/init.php";

$examples = [
    'hello'        => 'Hello HHVM / HACK',
    'promotion'    => 'Constructor argument promotion',
    'collections'  => 'Collections',
    'types'        => 'Types and Generics',
    'type-checker' => 'The type checker',
    'attributes'   => 'User attributes',
];

// The XHP validation should be disabled for better performance in production
//:x:base::$ENABLE_VALIDATION = false;

class :tuto:examples extends :x:element {
    // examples, current are required attributes
    attribute array examples @required;
    attribute string current @required;

    // forbid to explicitly add children
    children empty;

    protected function render() {
        $select = <select onchange="window.location.href=window.location.pathname + '?ex=' + this.value"/>;
        foreach ($this->getAttribute('examples') as $name => $label) {
            $selected = $name === $this->getAttribute('current');
            $child = <option selected={$selected} value={$name}>{$label}</option>;
            $select->appendChild($child);
        }
        return $select;
    }
}

$folder = preg_replace('/[^-_a-z0-9]/', '',isset($_GET['ex']) ? $_GET['ex'] : '');

function getTheCode($folder) {
    $path = '/' . $folder . '/index.php';
    $file = __DIR__ . '/..' . $path;
    $uri = str_replace('8080', '80', dirname($_SERVER['SCRIPT_URI']). $path);

    if (file_exists($file)) {
        // use "<x:frag>" to return a HTML fragment
        return <x:frag>
        <h2>Source file</h2>
        <pre><code>{file_get_contents($file)}</code></pre>
        <h2>Output</h2>
        <pre><code>{file_get_contents($uri)}</code></pre>
        </x:frag>;
    }
}

echo <html>
    <head><title>"XHP generated index"</title></head>
    <body>
        <tuto:examples examples={$examples} current={$folder} />
        {getTheCode($folder)}
    </body></html>;




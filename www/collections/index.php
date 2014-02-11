<?hh

require "/vagrant/www/xhp/php-lib/init.php";

$v = Vector {"d", "c", "b"};
$v->add("a");
$v->reverse();
$v = $v->map(($_) ==> strtoupper($_))->filter(($_) ==> strcmp($_, "D") < 0);

$items = <ul />;
foreach ($v as $i) {
    $items->appendChild(<li>{$i}</li>);
}
echo <div>Vector:{$items}</div>; // A, B, C

$m = Map {"a" => 1, "b" => 2};
$m->add(Pair {"d", 4});

echo <div>Map:
    <ul>
        <li>contains "a": {$m->contains("a") ? "yes" : "no"}</li> <!-- yes -->
        <li>contains "c": {$m->contains("c") ? "yes" : "no"}</li> <!-- no -->
        <li>size: {$m->count()}</li> <!-- 3 -->
    </ul>
</div>;

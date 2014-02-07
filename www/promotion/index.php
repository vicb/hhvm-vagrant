<?hh

class PHPClass {
    public $pub;
    protected $pro;
    private $pri;

    public function __construct($pub, $pro, $pri) {
        $this->pub = $pub;
        $this->pro = $pro;
        $this->pri = $pri;
    }
}

// object(PHPClass)#6 (3) {
//   ["pub"]=> string(3) "pub"
//   ["pro":protected]=> string(3) "pro"
//   ["pri":"PHPClass":private]=> string(3) "pri"
//}
var_dump(new PHPClass('pub', 'pro', 'pri'));

// The same class written in HACK is much more concise
// thanks to constructor argument promotion.

class HHClass {
    public function __construct(public $pub, protected $pro, private $pri) {}
}

// object(HHClass)#6 (3) {
//   ["pub"]=> string(3) "pub"
//   ["pro":protected]=> string(3) "pro"
//   ["pri":"HHClass":private]=> string(3) "pri"
// }
var_dump(new HHClass('pub', 'pro', 'pri'));

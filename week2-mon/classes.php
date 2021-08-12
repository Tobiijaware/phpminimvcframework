<?php 

class Animal {

    protected $name;

    public static $count;


    public function __construct(string $name) {
        $this->name = $name;
        static::$count++;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $newName) {
       $this->name = $newName;
    }

}


class Dog extends Animal {

    protected $color;

    public function __construct(string $name, string $color) {
       parent::__construct($name);

       $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $newColor) {
       $this->color = $newColor;
    }

}

$dog = new Dog("Bingo", "Black");

echo $dog->getName();

$dog->setName("Jack");

echo $dog->getName();

echo $dog->getColor();


new Animal("sdsd");
new Animal("s");
new Dog("Bingo", "Black");

var_dump(Dog::$count);



class Config {

    private static $instance;
   
    public static function getInstance() : Config {
        if(!static::$instance) {
            static::$instance = new Config();
        }
        return static::$instance;
    }

    private function __construct() {
     }
}

$config = Config::getInstance();
$config2 = Config::getInstance();
$config3 = Config::getInstance();
$config4 = Config::getInstance();

var_dump($config == $config2);

function printAnimals(Animal ...$animals) {
    foreach($animals as $ani) {
        echo $ani->getName() . PHP_EOL;
    }
}


class Cat extends Animal {}
echo "\n\n===========================\n\n";
printAnimals(new Animal("Test"), new Dog("Jack", "Blue"), new Cat("Min"));
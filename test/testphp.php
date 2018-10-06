<?php
class Person {
    public $name;

    function __construct( $name ) {
        $this->name = $name;
    }
};

$jack = new Person('FILM');
echo $jack->name;

?>
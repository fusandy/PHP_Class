<?php
    class Person{
        var $name;
        public $mobile;
        // private $sno = 'secret';
    }

    $p = new Person;
    $p -> name = 'Sandy Fu';
    $p -> mobile = '0912345678';
    print_r($p);
    echo '<br>------------<br>';
    echo $p->name;
    
?>
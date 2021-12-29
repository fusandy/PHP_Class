<?php
    class Person{
        private $name;     //宣告私有屬性
        function setName($n){    // $n = Sandy
            $this->name=$n;      // this->name = Sandy
        }
        function getName(){
            return $this->name;  // return Sandy
        }
    }
    $p=new Person;
    $p->setName("Sandy");
    echo $p->getName();
?>
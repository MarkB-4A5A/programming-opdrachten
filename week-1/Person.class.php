<?php

class Person {

    public $name = '';
    private $age = null;

    public function __construct($name, $age = 0) {
        $this->name = $name;
        $this->age = $age;
    }

    public function showPerson() {
        return 'Naam: ' . $this->name . ' Leeftijd: ' . $this->age . '<br />';
    }

    public function getAge() {
        return $this->name . ' is aged ' . $this->age . '!';
    }

    public function setAge($age) {
        if (is_int($age) && $age >= 0 && $age <= 150) {
            $this->age = $age;
            return $this->name . ' is now aged ' . $this->age . ', happy birthday!';
        } else {
            return $this->name . ' cannot be aged ' . $age;
        }
    }

    public function checkAge() {
        if ($this->age >= 18) {
            return $this->name . ' is not underage!';
        } else {
            return $this->name . ' is underage!';
        }
    }

}



$tim = new Person('Tim');
print $tim->showPerson() . '<br />';
print $tim->setAge(44) . '<br />';
print $tim->getAge() . '<br />';
print $tim->checkAge() . '<br />';

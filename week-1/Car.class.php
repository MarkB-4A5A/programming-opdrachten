<?php

class Car {

    public $color = '';
    public $brand = '';
    public $type = '';
    public $fuel = '';
    public $licensePlate = '';
    public $modelYear = NULL;
    public $horsePower = NULL;

    public function __construct($brand, $type, $fuel, $licensePlate, $modelYear, $horsePower, $color = 'Green') {
        $this->color = $color;
        $this->brand = $brand;
        $this->type = $type;
        $this->fuel = $fuel;
        $this->licensePlate = $licensePlate;
        $this->modelYear = $modelYear;
        $this->horsePower = $horsePower;
    }

    public function showInfo() {
        $string = '';
        $string .= '<b>Color: </b>' . $this->color . '<br />';
        $string .= '<b>Brand: </b>' . $this->brand . '<br />';
        $string .= '<b>Type: </b>' . $this->type . '<br />';
        $string .= '<b>Fuel: </b>' . $this->fuel . '<br />';
        $string .= '<b>License plate: </b>' . $this->licensePlate . '<br />';
        $string .= '<b>Model year: </b>' . $this->modelYear . '<br />';
        $string .= '<b>Horsepower: </b>' . $this->horsePower . '<br />';

        return $string;
    }

    public function checkSustainability() {
        if ($this->fuel == 'Hybrid' || $this->fuel == 'Electricity') {
            return 'This ' . $this->brand . ' ' . $this->type . ' has fuel type ' . $this->fuel . ' and is sustainable! Go environment, bitch!';
        } else {
            return 'This ' . $this->brand . ' ' . $this->type . ' has fuel type ' . $this->fuel . ' and is <b>not</b> sustainable! Go environment, bitch!';
        }
    }

    public function setColor($color) {
        $allowed = ['Red','Green','Blue'];

        if(in_array($color, $allowed)) {
            $this->color = $color;
            return 'Color <b style="color: '.$color.'">' . $color . '</b> set!';
        } else {
            return 'Color cannot be set: color <b style="color: '.$color.'">' . $color . '</b> is not allowed';
        }

    }

}

$ford = new Car('Ford', 'Fiesta', 'Gasoline', '04-RT-PP', 2005, 69);
print $ford->showInfo() . '<br />';
print $ford->checkSustainability() . '<br /><br />';
print $ford->setColor('MediumSpringGreen');

<?php

    class Math {

        protected $numbers = [];

        public function __construct($numbers) {
            $this->numbers = $numbers;
        }

        public function getNumbers() {
            return $this->numbers;
        }

        public function getFormula($action) {
            $string = '';

            foreach($this->numbers as $number){
                $string .= ' ' . $number . ' ' . $action;
            }

            return rtrim($string, $action);
        }


        protected function getCalc($type) {
            $result = $this->numbers[0];

            for ($x = 1; $x < count($this->numbers); $x++) {
                if ($type == '+') {
                    $result += $this->numbers[$x];
                } elseif ($type == '-') {
                    $result -= $this->numbers[$x];
                } elseif ($type == '*') {
                    $result *= $this->numbers[$x];
                }
            }

            return $result;
        }

    }

    // Add up numbers (+)

    class Sum extends Math {

        public function calculate() {
            return $this->getCalc('+');
        }

    }

    // Subtract numbers (-)

    class Subtract extends Math {

        public function calculate() {
            return $this->getCalc('-');
        }

    }

    // Multiply numbers (*)

    class Multiply extends Math {

        public function calculate() {
            return $this->getCalc('*');
        }

    }

    $sum = new Sum([5, 5, 6]);
    print $sum->getFormula('+') . ' = ' . $sum->calculate() . '<br />';

    $subtract = new Subtract([5, 3]);
    print $subtract->getFormula('-') . ' = ' . $subtract->calculate() . '<br />';

    $multiply = new Multiply([2, 2, 2]);
    print $multiply->getFormula('*') . ' = ' . $multiply->calculate() . '<br />';

    print '<pre>';
    print_r($multiply->getNumbers());
    print '</pre>';

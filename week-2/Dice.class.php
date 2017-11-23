<?php

    abstract class Dice {

        protected $numbers = [];

        private function getNumber() {
            return rand(1,6);
        }

        public function roll() {

            for($x = 0; $x < 3; $x++) {
                array_push($this->numbers, $this->getNumber());
            }

            $string = '';

            foreach ($this->numbers as $number) {
                $string .= '<img src="'.$this->images[$number].'" style="width: 75px;">';
            }

            return $string;
        }

    }

    class DiceNormal extends Dice {

        protected $images = array(
            1 => 'icons/dice-six-faces-one.svg',
            2 => 'icons/dice-six-faces-two.svg',
            3 => 'icons/dice-six-faces-three.svg',
            4 => 'icons/dice-six-faces-four.svg',
            5 => 'icons/dice-six-faces-five.svg',
            6 => 'icons/dice-six-faces-six.svg'
        );


    }

    class DiceInverted extends Dice {

      protected $images = array(
          1 => 'icons/inverted-dice-1.svg',
          2 => 'icons/inverted-dice-2.svg',
          3 => 'icons/inverted-dice-3.svg',
          4 => 'icons/inverted-dice-4.svg',
          5 => 'icons/inverted-dice-5.svg',
          6 => 'icons/inverted-dice-6.svg'
      );

    }

    class Dice3DNumber extends Dice {

      protected $images = array(
          1 => 'icons/perspective-dice-six-faces-one.svg',
          2 => 'icons/perspective-dice-six-faces-two.svg',
          3 => 'icons/perspective-dice-six-faces-three.svg',
          4 => 'icons/perspective-dice-six-faces-four.svg',
          5 => 'icons/perspective-dice-six-faces-five.svg',
          6 => 'icons/perspective-dice-six-faces-six.svg'
      );

    }

    $DiceNormal = new DiceNormal();
    print $DiceNormal->roll() . '<br />';

    $DiceInverted = new DiceInverted();
    print $DiceInverted->roll() . '<br />';

    $Dice3DNumber = new Dice3DNumber();
    print $Dice3DNumber->roll() . '<br />';

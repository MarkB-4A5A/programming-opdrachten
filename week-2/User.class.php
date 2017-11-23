<?php

    abstract class User {

        private $username = '';
        private $password = '';

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }

        public function checkPassword($password) {
            if (password_verify($password, $this->password)) {
                return true;
            } else {
                return false;
            }
        }

        abstract public function userStuff();

    }

    class Supervisor extends User {

        public function userStuff() {
            return 'Supervisor stuff';
        }

    }

    $supervisor = new Supervisor('tomas', 'legend32');
    print $supervisor->userStuff() . '<br />';

    class NormalUser extends User {

        public function userStuff() {
            return 'Normal stuff';
        }

    }

    $user = new NormalUser('anna', 'whatevah96');
    print $user->userStuff();

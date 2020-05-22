<?php
    class Account {
        //constructor Functions
        public function __construct()
        {

        }
        public function register(){
            // checking the sanitized data
            $this->validateUserName($username);
            $this->validateFirstName($firstname);
            $this->validateLastName($lastname);
            $this->validateEmails($email,$email2);
            $this->validatePasswords($password,$password2);
        }
        //validations functions
        private function validateUserName($username){

        }
        private function validateFirstName($firstname){

        }
        private function validateLastName($lastname){

        }
        private function validateEmails($email1,$email2){

        }
        private function validatePasswords($p1,$p2){

        }

    }
?>
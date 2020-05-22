<?php
    class Account {
        private $errorArray;
        //constructor Functions
        public function __construct()
        {
            $this->errorArray= array();
        }
        public function register($username,$firstname,$lastname,$email,$email2,$password,$password2){
            // checking the sanitized data
            $this->validateUserName($username);
            $this->validateFirstName($firstname);
            $this->validateLastName($lastname);
            $this->validateEmails($email,$email2);
            $this->validatePasswords($password,$password2);

            if(empty($this->errorArray)){
                //insert into the database

                return true;
            }else{
                return false;
            }
        }

        public function getError($error){
            //looking for the error in errorArray
            if(!in_array($error,$this->errorArray)){
                $error="";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        //validations functions
        private function validateUserName($username){
            if(strlen($username)> 25 || strlen($username) < 5 ){
                array_push($this->errorArray,"Your username must be between 5 and 25 characters ");
                return ;
            }
            //Check if username exists

        }
        private function validateFirstName($firstname){
            if(strlen($firstname)> 25 || strlen($firstname) < 2 ){
                array_push($this->errorArray,"Your first name must be between 2 and 25 characters ");
                return ;
            }
        }
        private function validateLastName($lastname){
            if(strlen($lastname)> 25 || strlen($lastname) < 2 ){
                array_push($this->errorArray,"Your last name must be between 2 and 25 characters ");
                return ;
            }
        }
        private function validateEmails($email1,$email2)
        {
            if ($email1 != $email2){
                array_push($this->errorArray, "Your emails does not match");
                return;
            }
            if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray,"Email is invalid");
                return;
            }
            //check if the email has not been already used

        }
        private function validatePasswords($p1,$p2){
            if($p1!=$p2){
                array_push($this->errorArray,"Passwords do not match");
                return ;
            }
            // if the password is not alphanumeric one then
            if(preg_match_all('/[^A-Za-z0-9]/',$p1)){
                array_push($this->errorArray,"Password should only contain numbers and letters");
                return;
            }
            // checking for the length of the password
            if(strlen($p1)>30 || strlen($p1)<6){
                array_push($this->errorArray,"Your password must be between 6 and 30 characters");
                return ;
            }
        }

    }
?>
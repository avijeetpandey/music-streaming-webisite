<?php
    class Account {
        private $errorArray;
        //connection variable
        private $con;
        //constructor Functions
        public function __construct($con)
        {
            $this->con=$con;
            $this->errorArray= array();
        }

        public function login($username,$password){
            $encryptedPassword=md5($password);
            $query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$username' AND password='$encryptedPassword'");

            if(mysqli_num_rows($query)==1) return true;
            else {
                array_push($this->errorArray,Constants::$loginFailed);
                return false;
            };
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
                return $this->insertUserDetails($username,$firstname,$lastname,$email,$password);
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

        // function to insert user details to the database
        private function insertUserDetails($un,$fn,$ln,$em,$pw){
            $encryptedPassword=md5($pw);  //encrypted password
            $profilePic="assets/images/profile_pics/people.png";
            $date=date("Y-m-d");
            $result=mysqli_query($this->con,"INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$encryptedPassword','$date','$profilePic')");
            return $result;
        }

        //validations functions
        private function validateUserName($username){
            if(strlen($username)> 25 || strlen($username) < 5 ){
                array_push($this->errorArray,Constants::$userNameCharacters);
                return ;
            }
            //Check if username exists
            $checkUserNameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($checkUserNameQuery!=0)){
                array_push($this->errorArray,Constants::userNameExists);
                return ;
            }

        }
        private function validateFirstName($firstname){
            if(strlen($firstname)> 25 || strlen($firstname) < 2 ){
                array_push($this->errorArray,Constants::$firstNameCharacters);
                return ;
            }
        }
        private function validateLastName($lastname){
            if(strlen($lastname)> 25 || strlen($lastname) < 2 ){
                array_push($this->errorArray,Constants::$lastNameCharacters);
                return ;
            }
        }
        private function validateEmails($email1,$email2)
        {
            if ($email1 != $email2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray,Constants::$emailInvalid);
                return;
            }
            //check if the email has not been already used
            $checkEmailQuery = mysqli_query($this->con,"SELECT username FROM users WHERE email='$email1'");
            if(mysqli_num_rows($checkEmailQuery!=0)){
                array_push($this->errorArray,Constants::emailAlreadyExists);
                return ;
            }
        }
        private function validatePasswords($p1,$p2){
            if($p1!=$p2){
                array_push($this->errorArray,Constants::$passwordsDoNotMatch);
                return ;
            }
            // if the password is not alphanumeric one then
            if(preg_match_all('/[^A-Za-z0-9]/',$p1)){
                array_push($this->errorArray,Constants::$passwordNotAlphaNumeric);
                return;
            }
            // checking for the length of the password
            if(strlen($p1)>30 || strlen($p1)<6){
                array_push($this->errorArray, Constants::$passwordCharacters);
                return ;
            }
        }

    }
?>
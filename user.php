<?php
    class User
    {
        public $id;
        public $email;
        public $password;
        public $name1;
        public $img;
        public $dob;
        public $phone;
        public $lang;
        public $gender;

    public static function find_all_users()
        {
            $result = self::find_query("SELECT * FROM users");
            array_shift($result);
            return $result;

        }
        public static function get_user_by_id($id)
        {
                global $database;
            $result_array = array();
            $result_array = User::find_query("SELECT * FROM users WHERE id ='$id' LIMIT 1");

            return (!empty($result_array) ? ($result_array) : false) ;



        }
        public static function verify_user($email,$password){

        global $database;
        $username=$database->escape_string($email);
            $password=$database->escape_string($password);

            $sql = "SELECT * FROM  users WHERE ";
            $sql .= "email = '{$email}' ";
            $sql .= " AND password = '{$password}' ";
            $sql .= "LIMIT 1";

            $result_array = self::find_query($sql);
            array_shift($result_array);
            return (!empty($result_array) ? ($result_array) : false) ;





        }
        public static function find_query($sql)
        {
            global $database;
            $result_set = $database->query($sql);

            $the_object_array[]=array();
            while($row = mysqli_fetch_array($result_set))

                {
                    $the_object_array[] = self::instantation($row);

                }

            return $the_object_array;
        }

        public static function instantation($row1)
        {
            $the_object = new self;

            foreach ($row1 as $attribute => $value)
            {
                if($the_object->has_the_attribute($attribute))
                {
                    $the_object->$attribute = $value;
                }
            }

            return $the_object;
        }

        private function has_the_attribute($attribute){
            $object_properties = get_object_vars($this);
            return array_key_exists($attribute,$object_properties);

        }

        public function create() {
        global $database;

            $email = $database->escape_string($this->email);
            $pass_word = $database->escape_string($this->password);
            $namee = $database->escape_string($this->name1);
            $imag = $this->img;
            $dob = $database->escape_string($this->dob);
            $phone = $database->escape_string($this->phone);
            $lang = $database->escape_string($this->lang);
            $gender = $database->escape_string($this->gender);



        $sql = "INSERT INTO users (id,email,password,name1,img,dob,phone,lang,gender) VALUES (NULL,'$email','$pass_word','$namee','$imag','$dob','$phone','$lang','$gender')";


         if($database->query($sql)) {
             $this->id = $database->the_insert_id();
             return true;
         }else{

             return false;
         }


        }
    public function update() {
        global $database;

        $email = $database->escape_string($this->email);
        $pass_word = $database->escape_string($this->password);
        $namee = $database->escape_string($this->name1);

        $dob = $database->escape_string($this->dob);
        $phone = $database->escape_string($this->phone);
        $lang = $database->escape_string($this->lang);
        $gender = $database->escape_string($this->gender);



        $sql = "UPDATE users SET email='$email', password='$pass_word', name1='$namee', dob ='$dob', phone ='$phone', lang ='$lang', gender ='$gender'  WHERE id='$this->id' ";


        $database->query($sql);
        
        return (mysqli_affected_rows($database->connection)==1) ? true :false ;
     

    }
public static function delete($id) {
        global $database;


        $sql = "DELETE FROM users WHERE id='$id'";


        if($database->query($sql)) {
          
             return true;
         }else{

             return false;
         }
     

    }




    }
?>
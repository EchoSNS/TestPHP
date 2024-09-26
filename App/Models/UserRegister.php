<?php

namespace Gray\Test\Models;

use Gray\Test\Model;
use PDO;

class UserRegister extends Model{
    public $errors = [];
    public $profile_image;
    private $maxImageSize = 2 * 1024 * 1024;
    public function __construct($data = []){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
    }

    public function store() {
        $this->validate();
        if (empty($this->errors)) {
            $profilePicture = $_FILES['profilePic'];
            $targetDir = __DIR__ . '/../../public/uploads/';
            $fileName = $this->fName . $this->lName . "_" . time() . '_' . basename($profilePicture['name']);
            $targetFilePath = $targetDir . $fileName;

            $query = 'INSERT INTO 
                users (first_name, middle_name, last_name, email, phone_number, profile_image, created_at)
                values (:first_name, :middle_name, :last_name, :email, :phone_number, :profile_image, :created_at)';
            $db = static::getDB();
            $stmt = $db->prepare($query);
            $stmt->bindValue(':first_name', $this->fName, PDO::PARAM_STR);
            $stmt->bindValue(':middle_name', $this->mName, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->lName, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':phone_number', $this->phoneNumber, PDO::PARAM_STR);
            $stmt->bindValue(':profile_image', $fileName, PDO::PARAM_STR);
            $stmt->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);

            if ($stmt->execute() && move_uploaded_file($profilePicture['tmp_name'], $targetFilePath)) {
                $this->profile_image = $fileName;
                return true;
            }
        }
        return false;
    }

    public function validate(){
        if($this->fName === ''){
            $this->errors['fName'] = 'First Name is required';
        }
        if($this->lName === ''){
            $this->errors['lName'] = 'Last Name is required';
        }
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }
        if (static::isEmailExists($this->email)) {
            $this->errors[] = 'Email already taken';
        }
        if($this->phoneNumber === ''){
            $this->errors['phoneNumber'] = 'Phone Number is required';
        }
        if($_FILES['profilePic']['size'] > $this->maxImageSize) {
            $this->errors['profilePic'] = 'The profile picture is too big. (Max size: 2MB)';
        }
    }

    public static function isEmailExists($email){
        return static::findByEmail($email) !== false;
    }

    public static function findByEmail($email){
        $query = 'SELECT * FROM users WHERE email = :email';
        $db = static::getDB();
        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }
}
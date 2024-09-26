<?php

namespace Gray\Test\Controllers;

use Gray\Test\Controller;
use Gray\Test\Models\UserRegister;

class RegisterController extends Controller{
    public function index(){
        $this->render('register');
    }

    public function createUser() {
        $user = new UserRegister($_POST);
        if ($user->store()) {
            $confirmationData = [
                'fName' => $user->fName,
                'mName' => $user->mName,
                'lName' => $user->lName,
                'email' => $user->email,
                'phoneNumber' => $user->phoneNumber,
                'profile_image' => $user->profile_image
            ];
            $this->render('confirmation', $confirmationData);
        } else {
            $this->render('register', $user->errors);
        }
    }
}
<?php

namespace Gray\Test\Controllers;

use Gray\Test\Controller;
use Gray\Test\Models\UserRegister;
use Gray\Test\Models\Users;

class UsersController extends Controller{
    public function index(){
        $usersModel = new Users();
        $users = $usersModel->retrieveUsers();

        if ($users === false) {
            $this->render('users', ['error' => 'Unable to retrieve users.']);
        } else {
            $this->render('users', $users);
        }
    }
}
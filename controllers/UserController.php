<?php

require_once 'models/User.php';

class UserController 
{
    // To make the connection with model
    private $model;

    public function __construct() {
        // create user model object
        $this->model = new User();
    }

    // select all users
    public function index() {
        // To model
        $users = $this->model->getUsers();

        // To views
        require 'views/users/index.php';
    }

    // select detail for user id
    public function view() {
        $id = $_GET['id'];
        $user = $this->model->getUserById($id);
        require 'views/users/detail.php';
    }

}
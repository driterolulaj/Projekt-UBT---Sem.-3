<?php
include_once '../repository/userRepository.php';
include_once '../models/user.php';

if(isset($_POST['registerBtn'])){
    if(empty($_POST['email']) ||
    empty($_POST['username']) || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $username.rand(100,999);
        $active = 0;

        $user  = new User($id,$email,$username,$password,$active);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
        
        echo "<script> alert('User has been inserted successfuly!'); </script>";
    }
}
?>
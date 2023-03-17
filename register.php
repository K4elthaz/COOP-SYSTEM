<?php
session_start();
include('dbcon.php');


if(isset($_POST['register_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,

    ];
    
    $createdUser = $auth->createUser($userProperties);

    if($createdUser){
        $_SESSION['status'] = "User Created";
        header('Location:login.php');
    }else{
        $_SESSION['status'] = "User not Created";
        header('Location:login.php');
    }

}

?>






<form method = "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input class="input100" id= "email" type="email" name="email" placeholder="Username">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input class="input100" type="password" id= "password" name="password" placeholder="Password">
    <small class="form-text text-muted">7character password.</small>
  </div>

  <button type="submit" name="register_btn" value = "register_btn" id = "register_btn" class="btn btn-primary">Submit</button>
</form>
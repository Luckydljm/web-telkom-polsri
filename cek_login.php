<?php 
include 'config/connect.php';
session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $user_type = $_POST['user_type'];
    $user_type = filter_var($user_type, FILTER_SANITIZE_STRING);
 
    $select_admin = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? AND user_type = ?");
    $select_admin->execute([$email, $password, $user_type]);
    $row = $select_admin->fetch(PDO::FETCH_ASSOC);
 
    if($select_admin->rowCount() > 0){
        $_SESSION['email']        = $row['email'];
        $_SESSION['password']     = $row['password'];
        $_SESSION['first_name']	  = $row['first_name'];
        $_SESSION['last_name']	  = '';
        $_SESSION['user_type']	  = $row['user_type'];
        $_SESSION['id']           = $row['id'];
        $_SESSION['sukses']       = "Welcome to D4 Telekomunikasi - Politeknik Negeri Sriwijaya Website!";
        setcookie('id', $row['id'], time() + 60*60*24*30, '/');
        header('location:layouts/template.php?page=dashboard');
     }else{
        $_SESSION['gagal'] = "Incorrect email or password!";
        header('location:login.php');
     }
 
 }

?>
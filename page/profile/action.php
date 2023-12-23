<?php 

    include '../../config/connect.php';
    session_start();

    if(isset($_COOKIE['id'])){
        $id = $_COOKIE['id'];
     }

     if(isset($_POST['update_profile'])){

      $select_users = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
      $select_users->execute([$id]);
      $fetch_users = $select_users->fetch(PDO::FETCH_ASSOC);
   
      $first_name = $_POST['first_name'];
      $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
   
     if(!empty($first_name)){
      $update_first_name = $conn->prepare("UPDATE `users` SET first_name = ? WHERE id = ?");
      $update_first_name->execute([$first_name, $id]);
      $_SESSION['update'] = "First Name Updated!";
      header('location:../../layouts/template.php?page=profile');
     }

      $last_name = $_POST['last_name'];
      $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
   
     if(!empty($last_name)){
      $update_last_name = $conn->prepare("UPDATE `users` SET last_name = ? WHERE id = ?");
      $update_last_name->execute([$last_name, $id]);
      $_SESSION['update'] = "Last Name Updated!";
      header('location:../../layouts/template.php?page=profile');
     }
   
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
   
      if(!empty($email)){
         $select_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
         $select_email->execute([$email]);
         if($select_email->rowCount() > 0){
            $_SESSION['failed'] = "Email already taken!";
            header('location:../../layouts/template.php?page=profile');
         }else{
            $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
            $update_email->execute([$email, $id]);
            $_SESSION['update'] = "Email Updated!";
            header('location:../../layouts/template.php?page=profile');
         }
      }
   
   }

   if(isset($_POST['update_password'])){

      $select_users = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
      $select_users->execute([$id]);
      $fetch_users = $select_users->fetch(PDO::FETCH_ASSOC);
      
      $prev_pass = $fetch_users['password'];
   
      $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
      $old_pass = sha1($_POST['old_pass']);
      $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
      $new_pass = sha1($_POST['new_pass']);
      $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
      $cpass = sha1($_POST['cpass']);
      $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

      if($old_pass != $empty_pass){
         if($old_pass != $prev_pass){
            $_SESSION['failed'] = "Old password not matched!";
            header('location:../../layouts/template.php?page=profile');
         }elseif($new_pass != $cpass){
            $_SESSION['failed'] = "Confirm password not matched!";
            header('location:../../layouts/template.php?page=profile');
         }else{
            if($new_pass != $empty_pass){
               $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
               $update_pass->execute([$cpass, $id]);
               $_SESSION['update'] = "Password updated!";
               header('location:../../layouts/template.php?page=profile');
            }else{
               $_SESSION['warning'] = "Please enter a new password!";
               header('location:../../layouts/template.php?page=profile');
            }
         }
      }
   
   }

?>
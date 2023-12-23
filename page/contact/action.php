<?php 
    include '../../config/connect.php';
    session_start();


    // submit contact
    if(isset($_POST['submit'])){
        $type = $_POST['type'];
        $type = filter_var($type, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
     
        $add_contact = $conn->prepare("INSERT INTO `contact`(type, description) VALUES(?,?)");
        $add_contact->execute([$type, $description]);

        $_SESSION['success'] = "Data added!";
        header('location:../../layouts/template.php?page=contact');
    
    }

    // delete contact
    if(isset($_POST['delete'])){

        $delete_id = $_POST['id_contact'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

        $verify_contact = $conn->prepare("SELECT * FROM `contact` WHERE id_contact = ? LIMIT 1");
        $verify_contact->execute([$delete_id]);

        if($verify_contact->rowCount() > 0){
            
        $delete_contact = $conn->prepare("DELETE FROM `contact` WHERE id_contact = ?");
        $delete_contact->execute([$delete_id]);
        $_SESSION['flash'] = "Data deleted!";
        header('location:../../layouts/template.php?page=contact');
        
        }else{
            $_SESSION['flash_fail'] = "Data not found!";
            header('location:../../layouts/template.php?page=contact');
        }
    }
?>
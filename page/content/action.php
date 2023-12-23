<?php 
    include '../../config/connect.php';
    session_start();


    // publish content
    if(isset($_POST['publish'])){

        $section = $_POST['section'];
        $section = filter_var($section, FILTER_SANITIZE_STRING);
        $type = $_POST['type'];
        $type = filter_var($type, FILTER_SANITIZE_STRING);

        if($type == 'one-column'){
            $column_1 = $_POST['column_1'];
            $column_1 = filter_var($column_1, FILTER_SANITIZE_STRING);
        }elseif($type == 'two-column'){
            $column_2 = $_POST['column_2'];
            $column_2 = filter_var($column_2, FILTER_SANITIZE_STRING);
            $column_3 = $_POST['column_3'];
            $column_3 = filter_var($column_3, FILTER_SANITIZE_STRING);
        }elseif($type == 'three-column'){
            $column_4 = $_POST['column_4'];
            $column_4 = filter_var($column_4, FILTER_SANITIZE_STRING);
            $column_5 = $_POST['column_5'];
            $column_5 = filter_var($column_5, FILTER_SANITIZE_STRING);
            $column_6 = $_POST['column_6'];
            $column_6 = filter_var($column_6, FILTER_SANITIZE_STRING);
        }elseif($type == 'four-column'){
            $column_7 = $_POST['column_7'];
            $column_7 = filter_var($column_7, FILTER_SANITIZE_STRING);
            $column_8 = $_POST['column_8'];
            $column_8 = filter_var($column_8, FILTER_SANITIZE_STRING);
            $column_9 = $_POST['column_9'];
            $column_9 = filter_var($column_9, FILTER_SANITIZE_STRING);
            $column_10 = $_POST['column_10'];
            $column_10 = filter_var($column_10, FILTER_SANITIZE_STRING);
        } elseif($type == 'image-img'){    
            $images = $_FILES['images']['name'];
            $images = filter_var($images, FILTER_SANITIZE_STRING);
            $ext = pathinfo($images, PATHINFO_EXTENSION);
            $rename = unique_id().'.'.$ext;
            $images_size = $_FILES['images']['size'];
            $images_tmp_name = $_FILES['images']['tmp_name'];
            $images_folder = '../../uploaded_images/'.$rename;
        }
         
        $added_at = $_POST['added_at'];
        $added_at = filter_var($added_at, FILTER_SANITIZE_STRING);
            
        $add_content = $conn->prepare("INSERT INTO `content`(section, type, column_1, column_2, column_3, column_4, column_5, column_6, column_7, column_8, column_9, column_10, added_at, images) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $add_content->execute([$section, $type, $column_1, $column_2, $column_3, $column_4, $column_5, $column_6, $column_7, $column_8, $column_9, $column_10, $added_at, $rename]);
         
        move_uploaded_file($images_tmp_name, $images_folder);
  
        $_SESSION['success'] = "Data added!";
        header('location:../../layouts/template.php?page=content');
    }

    // update content
    // if(isset($_POST['update'])){
    //     $content_id = $_POST['id_content'];
    //     $content_id = filter_var($content_id, FILTER_SANITIZE_STRING);
    //     $section = $_POST['section'];
    //     $section = filter_var($section, FILTER_SANITIZE_STRING);
    //     $type = $_POST['type'];
    //     $type = filter_var($type, FILTER_SANITIZE_STRING);
         
    //     $updated_at = $_POST['updated_at'];
    //     $updated_at = filter_var($updated_at, FILTER_SANITIZE_STRING);
            
    //     $update_content = $conn->prepare("UPDATE `content` SET section = ?, type = ?, updated_at = ? WHERE id_content = ?");
    //     $update_content->execute([$section, $type, $updated_at, $content_id]);
  
    //     $_SESSION['update'] = "Data updated!";
    //     header('location:../../layouts/template.php?page=content');
    // }
    
    // delete content
    if(isset($_POST['delete'])){

        $delete_id = $_POST['id_content'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

        $verify_content = $conn->prepare("SELECT * FROM `content` WHERE id_content = ? LIMIT 1");
        $verify_content->execute([$delete_id]);

        if($verify_content->rowCount() > 0){
            
            $delete_content_images = $conn->prepare("SELECT * FROM `content` WHERE id_content = ? LIMIT 1");
            $delete_content_images->execute([$delete_id]);
            $fetch_images = $delete_content_images->fetch(PDO::FETCH_ASSOC);
            unlink('../../uploaded_images/'.$fetch_images['images']);
            $delete_content = $conn->prepare("DELETE FROM `content` WHERE id_content = ?");
            $delete_content->execute([$delete_id]);
            
        $_SESSION['flash'] = "Data deleted!";
        header('location:../../layouts/template.php?page=content');
        
        }else{
            $_SESSION['flash_fail'] = "Data not found!";
            header('location:../../layouts/template.php?page=content');
        }
    }
?>
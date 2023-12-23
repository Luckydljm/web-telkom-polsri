<?php
ob_start();
error_reporting(0);
$page = $_GET['page'];

// Dashboard
if ($page=='dashboard'){
	include "dashboard.php";
}
// Contact
elseif ($page=='contact'){
    include "page/contact/contact.php";
}
// Content
elseif ($page=='content'){
    include "page/content/content.php";
}
elseif ($page=='add_content'){
    include "page/content/add_content.php";
}
elseif ($page=='edit_content'){
    include "page/content/edit_content.php";
}
// Profile
elseif ($page=='profile'){
    include "page/profile/profile.php";
}

else{
    include "error_page.php";
}
?>
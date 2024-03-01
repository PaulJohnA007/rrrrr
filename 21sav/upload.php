<?php
// Check if file is uploaded
if(isset($_FILES['uploaded_file'])){
    $errors= array();
    $file_name = $_FILES['uploaded_file']['name'];
    $file_size = $_FILES['uploaded_file']['size'];
    $file_tmp = $_FILES['uploaded_file']['tmp_name'];
    $file_type = $_FILES['uploaded_file']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['uploaded_file']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be less than 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"employee-photos/".$file_name);
       echo "Success";
    } else {
       print_r($errors);
    }
 }
?>

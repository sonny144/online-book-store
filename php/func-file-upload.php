<?php

#File upload helper function
function upload_file($files, $allowed_exs, $path){

  #gets the data and stores it in var
  $file_name = $files['name'];
  $tmp_name  = $files['tmp_name'];
  $error = $files['error'];

  #if there is no error occurred while uploading
  if ($error === 0) {
    # get file extension store it in var
    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);

 #converting the file extension into lower case and store iti in var
 $file_ex_lc = strtolower($file_ex);

 #checks if the file extension is exisiting in $allowed_exs array
 if (in_array($file_ex_lc, $allowed_exs )) {
 
  # renaming the file with random strings
  $new_file_name = uniqid("",true).'.'.$file_ex_lc;
 
  #assigning upload path
  $file_upload_path = '../uploads/'.$path.'/'.$new_file_name;
  
  #moving uploaded file to root directory upload/$path folder
  move_uploaded_file($tmp_name, $file_upload_path);

  #Creating success message associative array with named keys status and data
  $sm['status'] = 'success';
  $sm['data']   = $new_file_name;

  #Return the sm array
  return $sm;

 }else{
  #creating error message associative array with named keys status and data
    
  $em['status'] = 'error';
  $em['data']   = "You cant upload files of this type";

  #Return the em array
  return $em;

 }


  }else{
    #creating error message associative array with named keys status and data
    
    $em['status'] = 'error';
    $em['data']   = 'Error occured while uploading!';

    #Return the em array
    return $em;


  }

}
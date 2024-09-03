<?php
session_start();

#if admin is logged in 
if(isset($_SESSION['user_id'])&&
isset($_SESSION['user_email'])) {

    #Database Connection File
  include "../db_conn.php";
    /**
     * checks to see if author name is submitted
     */

    if (isset($_POST['author_name']) &&
    isset($_POST['author_id'])) {
    
 # Gets the data from Post request and stores them in var
    $name = $_POST['author_name'];
    $id   = $_POST['author_id'];

    #simple form of Validation
    if (empty($name)) {
      $em = "The author name is required"; 
      header("Location: ../edit-author.php?error=$em&id=$id");
    exit;
    }else{
        #Help Update the Database
        $sql = "UPDATE authors SET name=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
         $res = $stmt->execute([$name, $id]);

         #If there is no error while inserting the data
         if ($res) {
               #success message
            $sm = "Successfully Updated!"; 
            header("Location: ../edit-author.php?success=$sm&id=$id");
          exit;
               
            
         }else{
            #error message
            $em = "Unknown Error Occurred!"; 
      header("Location: ../edit-author.php?error=$em&id=$id");
    exit;
         }
    }
}else{
    header("Location: ../admin.php");
    exit;  
}
 }else{
    header("Location: ../login.php");
    exit;  
  }
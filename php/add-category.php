<?php
session_start();

#if admin is logged in 
if(isset($_SESSION['user_id'])&&
isset($_SESSION['user_email'])) {

    #Database Connection File
  include "../db_conn.php";
    /**
     * checks to see if category name is submitted
     */

    if (isset($_POST['category_name'])) {
    # Gets the data from Post request and stores it in var
    
    $name = $_POST['category_name'];

    #simple form of Validation
    if (empty($name)) {
      $em = "The category name is required"; 
      header("Location: ../add-category.php?error=$em");
    exit;
    }else{
        #Help Insert Into the Database
        $sql = "INSERT INTO categories (name)
                  VALUES (?)";
         $stmt = $conn->prepare($sql);
         $res = $stmt->execute([$name]);

         #If there is no error while inserting the data
         if ($res) {
               #success message
            $sm = "Successfully created!"; 
            header("Location: ../add-category.php?success=$sm");
          exit;
               
            
         }else{
            #error message
            $em = "Unknown Error Occurred!"; 
      header("Location: ../add-category.php?error=$em");
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
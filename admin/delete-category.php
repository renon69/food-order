<?php 
   include('connect-database.php');
   //check whether the id and the image_name is set or not
   if(isset($_GET['id']) && isset($_GET['image_name'])) 
   {
         // get the value and delete
         $id = $_GET['id'];
         $image_name = $_GET['image_name'];
         
         //remove the image file 
         if($image_name != "") // <-- if image_name is not empty, therefore it is available and can be removed
         {
               //declare the path of the image as $path
               $path = "../images/category/".$image_name;

               //declare a remove function = unlink
               $remove = unlink($path);

               // if failed to remove the image then display error message and stop the process
               if($remove == false) {
                  
                  //set session message
                  $_SESSION['remove'] = "<div class='text-red-500'>failed to remove category image</div>";
                  //redirect to manage category page
                  header('location:'. SITE_URL. 'admin/manage-category.php');
                  //then stop the process
                  die();
               }
         }   
         
         //delete data from database
         $sql = "DELETE FROM tbl_category WHERE id=$id";
         $res = mysqli_query($conn, $sql);
         //redirect to manage category page with message 

         //if query is executed then display session message on manage-category
         if($res == true)
         {
            $_SESSION['delete'] = "<div>Category deleted successfully!</div>";

            header('location:'.SITE_URL.'admin/manage-category.php');
         }
         else
         {

         }
   }
   else 
   {
      header('location:'. SITE_URL. 'admin/manage-category.php');
   }

?>
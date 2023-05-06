<?php 

include('connect-database.php');
// get and id name sa imong admin na gi click
 $id = $_GET['id'];

 //create sql query to delete admin
 $sql = "DELETE FROM tbl_admin WHERE id=$id";

 //execute the query
 $res = mysqli_query($conn, $sql);

 //check kung and query executed 
 if($res == true){
    //create session
    $_SESSION['delete'] = "<div class='text-green-500'>Admin deleted successfully</div>";

    //redirect to manage page para inig delete mo balik sa manage admin page3 then ibutang ang session message sa redirected page
    header("location:".SITE_URL.'admin/manage-admin.php');
 } else {
    $_SESSION['delete'] = "failed to delete admin";

    //redirect to manage page para inig delete mo balik sa manage admin page
    
    
 }
?>
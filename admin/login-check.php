<?php 
    
//if session is not set 
if(!isset($_SESSION['username'])) 
{ //then
    
    //redirect to login page with message
    $_SESSION['not-logged-in'] = "<div class='text-red'> Please log in to access admin</div>";
    header('location:' .SITE_URL. 'admin/login.php');
}
?>
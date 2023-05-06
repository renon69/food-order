<?php 
        //included for defined url (SITE_URL)
    include('connect-database.php');
    // destroys the session
    session_destroy();
    // redirect sa log in page 
    header('location:' .SITE_URL. 'admin/login.php')
?>
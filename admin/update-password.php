<?php 
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class=" p-[1%] w-[80%] m-auto my-10 ">
    <div class="pb-4 "><h1 class="text-4xl font-bold">Update Password</h1></div>

    <?php 
       if(isset($_SESSION['pwd-not-match'])){
        echo $_SESSION['pwd-not-match'];
        unset( $_SESSION['pwd-not-match']);//removes the message after moving to another url or refreshing the page
    }

    ?>

    <form action="" method="post">
        
          <tr>
            <td>Current Password:</td>
            <td >
                <input class="border border-black" type="password" name="current_password">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>New Password:</td>
            <td >
                <input class="border border-black" type="password" name="new_password">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Confirm Password:</td>
            <td >
                <input class="border border-black" type="password" name="confirm_password">
            </td>
        </tr>
        <br><br>
        <div class="pl-24">
        <tr >
            
            <td >
                <!-- hidden ni sya ma ning ID sa user -->
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button class="rounded-lg px-4 py-2 bg-green-700 text-green-100 hover:bg-green-800 duration-300" name="submit">Update</button>
            </td>
        </tr>
        </div>

    </form>

</div>


<?php 

            

                //if the user clicks submit
            if(isset($_POST['submit'])) 
            { //then
                // Convert POST input to variables 
                $id = $_GET['id'];                            // GET nimo and hidden id sa ibabaw
                $current = md5($_POST['current_password']);   // current for the current password with md5(password hash)
                $new = md5($_POST['new_password']);             // new for the new password
                $confirm = md5($_POST['confirm_password']);    //confirm for the confirmation of the new password

                //writing sql query
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current'"; // select all data from tbl_admin where the id is equal to $id(the users id) and password is the $current(current password of the user)
             
                // function to execute a MySQL query against a database connected through a MySQLi connection object
                $res = mysqli_query($conn, $sql); // represented by the $conn variable. The query is specified in the $sql variable.the first  parameter is the MySQLi connection object ($conn), the second is the MYSQL qurey to be executed($sql)
                
                //$res contains the result of executing a MySQL query
               if($res == true)  //  If the query was executed successfully and returns a result set
               {
                //check whether data is available
                $count=mysqli_num_rows($res); //mysqli_num_rows() function to retrieve the number of rows returned by the previously executed MySQL query, which is stored in the $res variable.

                if($count==1) // if the query was executed successfully and returned exactly one row of data, the value of $count will be 1.
                {
                    //user exists and password can be changed
                    if($new == $confirm)  // if the new password and the confirm is match
                    { // then
                        $sql2 = "UPDATE tbl_admin SET password='$new' WHERE id=$id"; //perform another query to update the password

                        $res2 = mysqli_query($conn, $sql2); 

                        if($res2 == true) {
                            $_SESSION['pwd-changed'] = "password updated successfully";
                            header('location:' . SITE_URL.'admin/manage-admin.php');
                        }

                    }
                    else
                    {
                        $_SESSION['pwd-not-match'] = "password dont match";
                        header('Location: '.$_SERVER['PHP_SELF']);
                    }
                }
                else
                {
                    $_SESSION['user-not-found'] = "user not found";
                    header('location:' . SITE_URL.'admin/manage-admin.php');
                }
               }
            }

?>


<?php include('footer.php'); ?>
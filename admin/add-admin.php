<?php 
include('navbar.php');
include ('doctype.php');
?>


<div class=" p-[1%] w-[80%] m-auto my-10 ">
    <div class="pb-4 "><h1 class="text-4xl font-bold">Add Admin</h1></div>

    <?php 
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            
        }
    ?>

    <form action="" method="post">
        
          <tr>
            <td>Full Name:</td>
            <td >
                <input class="border border-black" type="text" name="fullname">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Username:</td>
            <td >
                <input class="border border-black" type="text" name="username">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>password:</td>
            <td >
                <input class="border border-black" type="password" name="password">
            </td>
        </tr>
        <br><br>
        <div class="pl-24">
        <tr >
            
            <td >
            <button class="rounded-lg px-4 py-2 bg-green-700 text-green-100 hover:bg-green-800 duration-300" name="submit">Submit</button>
            </td>
        </tr>
        </div>

    </form>

</div>

<!-- footer -->
<div class="bottom-0"><?php include('footer.php'); ?></div>


<?php 
    // checks if the submit button is clicked
    if(isset($_POST['submit'])) {
    // button clicked
    
    //get data from form
    //assigns sa mga gi input sa fields 
    $fullname = $_POST['fullname']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    

    // sql query to save data into database
        $sql = "INSERT INTO tbl_admin SET
        full_name='$fullname',
        username='$username',
         password='$password'";

        // execute query and save in database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res === true) {
               //create a session variable to display message
               $_SESSION['add'] = "admin added successfully";
               
                //redirect page to manage admin
                header("location:".SITE_URL.'admin/manage-admin.php');
        } else {
            //create a session variable to display message
            $_SESSION['add'] = "failed to add admin";
               
            //redirect page to manage admin
            header("location:".SITE_URL.'admin/add-admin.php');
        }
            }
?>
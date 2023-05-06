<?php 
    include('navbar.php');


?>
 
 <div class=" p-[1%] w-[80%] m-auto my-10 ">
    <div class="pt-4 pl-40"><h1 class="text-4xl font-bold">Manage Admin</h1>
        <br><br>

        <?php 
                //1 get the id of the admin to be updated
                $id=$_GET['id'];

                //2 create sql query to get the details
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                //3 execute the query
                $res = mysqli_query($conn, $sql);

                //check whether the query is executed 
                if($res == true) {
                    //check whether the data is available or not
                    $count = mysqli_num_rows($res);

                    //check whether we have admin data or not
                    if($count == 1) {
            
                        $rows = mysqli_fetch_assoc($res);

                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                    } else
                   {
                    header("location:".SITE_URL.'admin/manage-admin.php');
                   }
                }
        ?>


        <form action="" method="post">

        <tr>
            <td>Full Name:</td>
            <td >
                <input class="border border-black" type="text" name="fullname" value="<?php echo $full_name;?>">
            </td>
        </tr>

        <tr>
            <td>Username:</td>
            <td >
                <input class="border border-black" type="text" name="username" value="<?php echo $username;?>">
            </td>
        </tr>

        <tr>
            
            <td >
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input class="border border-black" type="submit" name="update" value="Update Admin">
            </td>
        </tr>

        </form>

    </div>
</div

<?php 
    if(isset($_POST['update'])) {
        
        $id = $_POST['id'];
        $full_name = $_POST['fullname'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET full_name='$full_name',username='$username' WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true) {
            $_SESSION['update'] = "<div class='text-green-500'>Admin updated successfully</div>";

    //redirect to manage page para inig delete mo balik sa manage admin page
    header("location:".SITE_URL.'admin/manage-admin.php');
        } else {
            $_SESSION['delete'] = "failed to delete admin";

    //redirect to manage page para inig delete mo balik sa manage admin page
    header("location:".SITE_URL.'admin/manage-admin.php');
        }
    }
?>

<?php
    include('footer.php');
?>
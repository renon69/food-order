<?php include("navbar.php"); ?>

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
    
    <div class="pb-4 "><h1 class="text-4xl font-bold">Manage Admin</h1></div>

    <?php 

    //mo display sa confirmation message if the admin has been added successfully
            if(isset($_SESSION['add'])) {
               echo $_SESSION['add']; // mo display sa message
               unset($_SESSION['add']); // removes the message after refreshing or going to another url
            } 
        //mo display ug confimation whether the admin has deleted or failed deleting
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset( $_SESSION['delete']);//removes the message after moving to another url or refreshing the page
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset( $_SESSION['update']);//removes the message after moving to another url or refreshing the page
            }
            
            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset( $_SESSION['user-not-found']);//removes the message after moving to another url or refreshing the page
            }
            if(isset($_SESSION['pwd-changed'])){
                echo $_SESSION['pwd-changed'];
                unset( $_SESSION['pwd-changed']);//removes the message after moving to another url or refreshing the page
            }
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset( $_SESSION['login']);//removes the message after moving to another url or refreshing the page
            }

    ?>

    <div class="pb-8"><a href="add-admin.php">  <button class="rounded-lg px-4 py-2 border-2 border-blue-500 text-blue-500 hover:bg-blue-600 hover:text-blue-100 duration-300">Add admin</button></a></div>
        <table class="table-auto w-[100%] p-8 justify-start">
            
            <tr class="border border-black text-left p-">
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            

        <?php 
            // query to get all admin
            $sql = "SELECT * FROM tbl_admin";
            //execite the query
            $res = mysqli_query($conn, $sql); //$conn is the variable for connection included in navbar and $sql the command above

            //checks whether the query is executed or not
            if($res == true) {
                //count rows kung we have data in database or wala

                $count = mysqli_num_rows($res); //function to get all the rows in database
                $sn = 1;
                //checks the number of rows
                if($count > 0) {  //if  ang rows is more than 0(naay sulod data sa database)
                        
                 while($rows = mysqli_fetch_assoc($res))//gets all the database and store in $rows

                    

                    {
                        //using while loop to get all the data from the database
                        //and while loop will run as long as we have data in the database

                        //get individual data
                        $id = $rows['id'];                    //$id 
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //display the values in our table
                        ?>
                         <tr class="border border-black text-left p-">
                             <td><?php echo $sn++; ?></td>
                             <td><?php echo $full_name; ?> </td>
                            <td><?php echo $username; ?></td>
                           <td> 

                            <!-- url para sa change password -->
                            <a href="<?php echo SITE_URL;?>admin/update-password.php?id=<?php echo $id; ?>" >
                            <button class="rounded-lg px-4 py-2 border-2 border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-100 duration-300">Change Password</button></a>

                            <!-- url para sa update admin -->
                           <a href="<?php echo SITE_URL;?>admin/update-admin.php?id=<?php echo $id; ?>"> <button class="rounded-lg px-4 py-2 border-2 border-green-300 text-green-300 hover:bg-green-300 hover:text-green-100 duration-300">Update</button></a>
                           
                          <!-- url para sa delete admin -->
                           <a href="<?php echo SITE_URL;?>admin/delete-admin.php?id=<?php echo $id; ?>" >
                            <button class="rounded-lg px-4 py-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-red-100 duration-300">Delete</button></a>
                          
                </td>
            </tr>
                        <?php
                    }

                } 
                else
                {

                }
            }


        ?>

           
           
            
        </table>
    </div>
</body>
</html>

<?php include("footer.php"); ?>
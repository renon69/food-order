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
    <div class="pb-4 "><h1 class="text-4xl font-bold">Manage Category</h1></div>
    <br><br>
   <?php 
    if(isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['remove'])) {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
    ?>
    <div class="pb-8"><a href="add-category.php">  <button class="rounded-lg px-4 py-2 border-2 border-blue-500 text-blue-500 hover:bg-blue-600 hover:text-blue-100 duration-300">Add Category</button></a></div>
        <table class="table-auto w-[100%] p-8 justify-start">
            
            <tr class="border border-black text-left p-">
                <th>ID</th>
                <th>Title</th>  
                <th>image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
                
            <?php 
                        //selects all the data from tbl_category
                    $sql = "SELECT * FROM tbl_category";

                    $res = mysqli_query($conn, $sql);

                   if($res == true) {

                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0) {
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];


                            ?>
                         <tr class="border border-black text-left p-">
                             <td><?= $sn++; ?></td>
                             <td><?= $title; ?> </td>
                            <!-- Display image -->
                             <td>
                                <?php 
                                    if($image_name != "") 
                                    {
                                        ?>
                                        <img src="<?php echo SITE_URL;?>images/category/<?php echo $image_name;?>" width="100px">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div class='text-red-100'>image not available</div>";
                                    }
                                ?> 
                            </td>

                            <td><?= $featured; ?></td>
                            <td><?= $active; ?></td>
                           <td> 

                            <!-- url para sa change password -->
                           
                            <!-- url para sa update admin -->
                           <a href="<?php echo SITE_URL;?>admin/update-category.php?id=<?php echo $id; ?>"> <button class="rounded-lg px-4 py-2 border-2 border-green-300 text-green-300 hover:bg-green-300 hover:text-green-100 duration-300">Update</button></a>
                           
                          <!-- url para sa delete admin  $id para sa id sa category to be deleted and $image_name for the image sa category folder-->
                           <a href="<?php echo SITE_URL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" >
                            <button class="rounded-lg px-4 py-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-red-100 duration-300">Delete</button></a>
                          
                </td>
            </tr>
                        <?php
                        }
                    } 
                   }
            ?>
           
            
        </table>
    </div>
</body>
</html>

<?php include("footer.php"); ?>
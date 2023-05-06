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
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                //3 execute the query
                $res = mysqli_query($conn, $sql);

                //check whether the query is executed 
                if($res == true) {
                    //check whether the data is available or not
                    $count = mysqli_num_rows($res);

                    //check whether we have admin data or not
                    if($count == 1) {
            
                        $rows = mysqli_fetch_assoc($res);

                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                    } else
                   {
                    header("location:".SITE_URL.'admin/manage-admin.php');
                   }
                }
        ?>


<form action="" method="post" enctype="multipart/form-data">
        
        <tr>
          <td>Title:</td>
          <td >
              <input class="border border-black" type="text" name="title" value="<?=$title;?>">
          </td>
      </tr>
      <br><br>
      <tr>
            <td>Current Image:</td>
            <td>
                <?php 
                // if image name is not emplty 
                        if($image_name != "") 
                        {
                            //display the image
                            ?>
                            <img class="h-[150px]" src="<?= SITE_URL;?>images/category/<?= $image_name;?>" alt="">
                            <?php
                        }
                        else 
                        {
                            //display message
                            echo "<div>image no added</div>";
                        }
                ?>
            </td>
      </tr>
      <br><br>

      <td>New Image:</td>
            <td>
              
            </td>
      </tr>
      <br><br>
      <!-- featured -->
      <tr>
          <td>Featured:</td>
          <td >
          <input type="radio" name="featured" value="<?=$featured;?>" <?php if ($featured == 'yes') echo 'checked'; ?>>
            <label>Yes</label>

            <input type="radio" name="featured" value="<?=$featured;?>" <?php if ($featured == 'no') echo 'checked'; ?>>
             <label>No</label>
          </td>
      </tr>
      <br><br>
      <tr>
      <td>Active:</td>
          <td >
            <input type="radio" name="active" value="<?=$active;?>" <?php if ($active == 'yes') echo 'checked'; ?>>
            <label>Yes</label>
            <input type="radio" name="active" value="<?=$active;?>" <?php if ($active == 'no') echo 'checked'; ?>>
            <label>No</label>
          </td>
      </tr>
      
      <br><br>
      <div class="pl-24">
      <tr >
          
          <td >
          <button  class="rounded-lg px-4 py-2 bg-green-700 text-green-100 hover:bg-green-800 duration-300" name="update">Submit</button>
          </td>
      </tr>
      </div>

  </form>

    </div>
</div

<?php 
    if(isset($_POST['update']))
    {

    }
    else 
    {
        
    }
?>
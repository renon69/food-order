<?php
 include('navbar.php');
 include('doctype.php');
 ?>


<div class=" p-[1%] w-[80%] m-auto my-10  ">
    <div class="pb-4 "><h1 class="text-4xl font-bold">Add Category</h1></div>

    <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
    ?>

<form action="" method="post" enctype="multipart/form-data">
        
        <tr>
          <td>Title:</td>
          <td >
              <input class="border border-black" type="text" name="title">
          </td>
      </tr>
            <br><br>
      <tr>
            <td>Select Image:</td>
            <td>
                <input type="file" name="image">
            </td>
      </tr>

      <br><br>
      <tr>
          <td>Featured:</td>
          <td >
                <input type="radio" name="featured" value="yes">
                <label >Yes</label>
                <input type="radio" name="featured" value="no">
                <label >No</label>
          </td>
      </tr>
      <br><br>
      <tr>
      <td>Active:</td>
          <td >
                <input type="radio" name="active" value="yes">
                <label >Yes</label>
                <input type="radio" name="active" value="no">
                <label >No</label>
          </td>
      </tr>
      
      <br><br>
      <div class="pl-24">
      <tr >
          
          <td >
          <button  class="rounded-lg px-4 py-2 bg-green-700 text-green-100 hover:bg-green-800 duration-300" name="submit">Submit</button>
          </td>
      </tr>
      </div>

  </form>
    
</div>





<?php include('footer.php'); ?>

<?php 

            if(isset($_POST['submit'])) {
              
              $title = $_POST['title'];
            
              $featured = $_POST['featured'];
              $active = $_POST['active'];

              //check whether the image is selected or not and  set the value for image name
              //inig pring r nimo naay category sa image
              // name for pangan sa image
              //tmp_name is for the path
              //and image is the name of the input which is the image
           if(isset($_FILES['image']['name'])) 
           {
                //upload the image
                //to upload image we need image name, source path and destination path
                $image_name = $_FILES['image']['name'];

                //auto rename the image
                //get the extension of our image(jpg,png, .. etc)
                $ext = end(explode('.', $image_name));

                //rename the image + random numbers from 000 - 999
                $image_name = "Food_Category_".rand(000, 999).'.'.$ext;

                // tmp_name filename of the file in which the uploaded file was stored on the server
                $source_path = $_FILES['image']['tmp_name'];
                //path to be uploaded
                $desination_path = "../images/category/".$image_name;

                //upload sa image
                $upload = move_uploaded_file($source_path, $desination_path);

                //check whether the image is uploaded or not
                if($upload == false) {

                    $_SESSION['upload'] = "<div class='text-red-500'>failed to upload image</div>";
                    header('location:'.SITE_URL.'admin/manage-category.php');
                    // stop the process so we dont put the image data in the database
                    die();
                }
           }
           else
           {
                //dont upload the image and set the image_name value as blank
                $image_name = "";
           }

              $sql = "INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
              ";

              $res = mysqli_query($conn, $sql);

             if($res == true) {

              $_SESSION['add'] = "{$title} Added Successfully";
              header("location:".SITE_URL.'admin/manage-category.php');
             }
             else 
             {
                $_SESSION['add'] = "failed to add category";
                header('Location: '.$_SERVER['PHP_SELF']);

             }
            }
?>  
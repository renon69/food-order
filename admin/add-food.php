<?php 
include('navbar.php');
include ('doctype.php');
?>


<div class=" p-[1%] w-[80%] m-auto my-10 ">
    <div class="pb-4 "><h1 class="text-4xl font-bold">Add Food</h1></div>

    <?php 
       
    ?>

    <form action="" method="post">
        
          <tr>
            <td>Title:</td>
            <td >
                <input class="border border-black" type="text" name="title">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Description:</td>
            <td >
                <textarea class="border border-black" name="description" ></textarea>
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Price:</td>
            <td >
                <input class="border border-black" type="number" name="price">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Image Name:</td>
            <td >
                <input class="border border-black" type="number" name="imageName">
            </td>
        </tr>
        <br><br>
        <tr>
            <td>Category ID:</td>
            <td >
                <input class="border border-black" type="number" name="categoryID">
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

        if(isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $imageName = $_POST['imageName'];
            $categoryID = $_POST['categoryID'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            $sql = "INSERT INTO tbl_food SET
                title='$title',
                description='$description',
                price='$price',
                image_name='$imageName',
                category_id='$categoryID',
                featured='$featured',
                active='$active'
            ";

            $res = mysqli_query($conn, $sql);

            if($res == true) {
                $_SESSION['message'] =  "<div>Added Successfully</div>";
                header("location:".SITE_URL.'admin/manage-food.php');
            }
            
        }

?>
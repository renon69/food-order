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
    <div class="pb-4 "><h1 class="text-4xl font-bold">Manage Food</h1></div>

    <?php 
     if(isset($_SESSION['message'])) {
        echo $_SESSION['message']; // mo display sa message
        unset($_SESSION['message']); // removes the message after refreshing or going to another url
     } 
    ?>

    <div class="pb-8"><a href="add-food.php">  <button class="rounded-lg px-4 py-2 border-2 border-blue-500 text-blue-500 hover:bg-blue-600 hover:text-blue-100 duration-300">Add Food</button></a></div>
        <table class="table-auto w-[100%] p-8 justify-start">
            
            <tr class="border border-black text-left p-">
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            

           
            <tr class="border border-black text-left p-">
                <td>1.</td>
                <td>Renon Sugitarios</td>
                <td>noner</td>
                <td>
                   <a href=""><button class="rounded-lg px-4 py-2 border-2 border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-100 duration-300">Update</button></a>
                   <a href=""><button class="rounded-lg px-4 py-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-red-100 duration-300">Delete</button></a>
                </td>
            </tr>
            
        </table>
    </div>
</body>
</html>

<?php include("footer.php"); ?>
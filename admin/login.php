<?php  include('connect-database.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        
    <body class="antialiased bg-gray-200 text-gray-900 font-sans">
    <div class="flex items-center h-screen w-full">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
      <span class="block w-full text-xl uppercase font-bold mb-4">Login</span>   
      <br>
      <?php
           if(isset($_SESSION['not-logged-in'])) {
            echo $_SESSION['not-logged-in']; // mo display sa message
            unset($_SESSION['not-logged-in']); // removes the message after refreshing or going to another url
         } 

          if(isset($_SESSION['login-failed'])) {
            echo $_SESSION['login-failed']; // mo display sa message
            unset($_SESSION['login-failed']); // removes the message after refreshing or going to another url
         } 
      ?>
<br>   
        <form class="mb-4" action="" method="post">
          <!-- input username/email -->
        <div class="mb-4 md:w-full">
            <label for="email" class="block text-xs mb-1">Username </label>
            <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="username" id="username" placeholder="Username">
          </div>
          <!-- input password -->
          <div class="mb-6 md:w-full">
            <label for="password" class="block text-xs mb-1">Password</label>
            <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password" name="password" id="password" placeholder="Password">
          </div>
         <!--login button -->
          <input type="submit" name="submit" value="login" class="bg-green-500 hover:bg-green-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded">
        </form>
        <a class="text-blue-700 text-center text-sm" href="/login">Forgot password?</a>
    </div>
  </div>
</body>
    </body>
</html>

<?php 

  
    if(isset($_POST['submit'])) 
    {
        //process for log in 
        // get the data from login form

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1) {

          $_SESSION['login'] = "<div>Logged in </div>";
          $_SESSION['username'] = $username;
            header("location:" .SITE_URL . "admin/manage-admin.php");
        }
        else 
        {
          $_SESSION['login-failed'] = "<div class='text-red-500'>Username/Password did not match</div>";

          header('Location: '.$_SERVER['PHP_SELF']);
        }
    }
?>
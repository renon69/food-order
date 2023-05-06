<?php 
include('connect-database.php');
include('login-check.php');
 ?>

<html>
    <head>
        <link rel="stylesheet" href="css/input.css">
        <title>Food Order Website - Home Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <!-- menu section starts -->
            <div class="border border-b-cyan-400 p-[1%]  m-auto mb-10">
               
            <ul class="flex gap-4 text-center justify-center">
                    <li class="hover:text-cyan-400"><a href="index.php">Home</a></li>
                    <li class="hover:text-cyan-400"><a href="manage-admin.php">Admin</a></li>
                    <li class="hover:text-cyan-400"><a href="manage-category.php">Category</a></li>
                    <li class="hover:text-cyan-400"><a href="manage-food.php">Food</a></li>
                    <li class="hover:text-cyan-400"><a href="manage-order.php">Order</a></li>
                    <li class="hover:text-cyan-400"><a href="logout.php">Logout</a></li>
                </ul>
            </div

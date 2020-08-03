<?php

require_once './../partials/template.php';

function file_content() {
  ?>
   <!-- html -->

   <h1>Login Page</h1>
   <form action="./../controllers/auth.php" method="post">
     <input type="text" name="username" id="" placeholder="Enter Your Username">
     <input type="password" name="password" id="">
     <button class="btn btn-primary">Login</button>
   </form>



  <?php
}
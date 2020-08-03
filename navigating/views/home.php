<?php

require_once './../partials/template.php';

function file_content(){

  echo "<h1>Hello {$_SESSION['user']}</h1>";
}


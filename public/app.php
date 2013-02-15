<?php

print_r($_GET);
print_r($_POST);
print_r($query);

   require("../controllers/Controller.php");
   $app = new Controller();

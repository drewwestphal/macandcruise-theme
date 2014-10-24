<?php
if (isset($_REQUEST['email']) && isset($_REQUEST['name']))
  {
  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $comments = $_REQUEST['comments'] ;
  mail("michaela@kaebot.com", "Macaroni & Cruise Contact","Name: $name\n Comments: $comments\n", "From: $email");
  echo "Thank you!";
  }
?>
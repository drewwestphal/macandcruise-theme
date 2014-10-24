<?php
if (filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) && isset($_REQUEST['name'] && isset($_REQUEST['comments']))
  {
  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $comments = $_REQUEST['comments'] ;
  mail("michaela@kaebot.com", "Macaroni & Cruise Contact","Name: $name\n Comments: $comments\n", "From: $email");
  echo "Thank you!";
  }
?>
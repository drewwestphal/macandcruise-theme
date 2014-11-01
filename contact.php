<?php 
if (isset($_REQUEST['email']) && isset($_REQUEST['name']) && isset($_REQUEST['comments']) && (strlen($_REQUEST['honeypot'])==0)) {

  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $comments = $_REQUEST['comments'] ;
  $from = "sf@jonathancoulton.com";
    
  mail($from, "Website Inquiry: Macaroni and Cruise","Name: $name\n Comments: $comments\n", "From: $email\r\nCC: $email\r\n'X-Mailer: PHP/' . phpversion()");

  echo "Thank you for getting in touch!";
}
?>
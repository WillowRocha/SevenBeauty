<?php
session_start();
require_once("includes.php");

$paginaLink = basename($_SERVER['SCRIPT_NAME']);

if(!strcasecmp($paginaLink, ABOUT)){
  $page_title = ABOUT_TITLE;
} else if(!strcasecmp($paginaLink, ADMIN)){
  $page_title = ADMIN_TITLE;
} else if(!strcasecmp($paginaLink, CONTACT)){
  $page_title = CONTACT_TITLE;
} else if(!strcasecmp($paginaLink, HOME)){
  $page_title = HOME_TITLE;
} else if(!strcasecmp($paginaLink, LOGIN)){
  $page_title = LOGIN_TITLE;
} else if(!strcasecmp($paginaLink, REGISTER)){
  $page_title = REGISTER_TITLE;
} else if(!strcasecmp($paginaLink, REGISTER)){
  $page_title = REGISTER_TITLE;
} else if(!strcasecmp($paginaLink, REGISTER_CLIENT)){
  $page_title = REGISTER_CLIENT_TITLE;
} else {
  $page_title = "No Name";
} 
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> <?php echo $page_title ?> - 7 Beauty</title>
<link rel="shortcut icon" href="img/beauty/favicon.ico" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="css/style.min.css" rel="stylesheet">
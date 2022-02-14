<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
$page = $this->uri->segment(2);
$Auth = $this->session->userdata();



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="Salon description">
   <meta name="author" content="Salon">
   <meta name="keywords" content="Salon, Salon ui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard,  responsive, css, sass, html, theme, front-end, ui kit, web, Orrishhtml">
   <title>Salon</title>
   <link rel="preconnect" href="https://fonts.googleapis.com/">
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/vendors/core/core.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >

	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/css/style.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/css/jquery-confirm.css">
	<link rel="stylesheet" href="<?=base_url()?>assets-orrish/vendors/simplemde/simplemde.min.css">
	<link rel="shortcut icon" href="<?=base_url()?>assets-orrish/images/ngo-fevicon.png" />
	<script src="<?=base_url()?>assets-orrish/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url()?>assets-orrish/js/admin-js/jquery-3.3.1.min.js"></script>
</head>
<body>
   <div class="main-wrapper">

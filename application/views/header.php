<?php
if($this->session->has_userdata('signin') == false){
  redirect('auth');
}
?>
<!DOCTYPE html>
<html>
<title>CodeIgniter 3</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('asset/css/w3.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="<?php echo base_url('asset/css/open-iconic.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('asset/css/dataTables.w3.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('asset/css/select.dataTables.w3.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('asset/css/buttons.dataTables.w3.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('asset/plugins/w3te/jquery.w3te.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('asset/plugins/tagify/tagify.css') ?>">
<script src="<?php echo base_url('asset/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('asset/js/dataTables.w3.js') ?>"></script>
<script src="<?php echo base_url('asset/js/dataTables.select.js') ?>"></script>
<script src="<?php echo base_url('asset/js/dataTables.buttons.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/w3te/jquery.w3te.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/tagify/jQuery.tagify.js') ?>"></script>
<script>
	$(document).ready(function() {
    var events = $('#events');
		var table = $('#datatable').DataTable();
	});
</script>
<style>
table{font-size:13px;}
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content w3-light-grey" style="max-width:1340px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-light-grey w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide w3-center"><b><img width="80" src="<?php echo base_url('asset/images/ci-logo-big.png') ?>"/></b></h3>
  </div>
  <div class="w3-padding-16 w3-large w3-text-grey" style="font-weight:bold">
    <a onclick="myAccFunc('1')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      <span class="oi" data-glyph="pin"></span> Posts
    </a>
    <div id="demoAcc-1" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
      <a target="blank" href="<?php echo base_url('post')?>" class="w3-bar-item w3-button">All Posts</a>
      <a target="blank" href="<?php echo base_url('post/add')?>" class="w3-bar-item w3-button">Add New</a>
      <a target="blank" href="http://kautube.com/codeigniter-3/index.php/term/category" class="w3-bar-item w3-button">Categories</a>
      <a target="blank" href="http://kautube.com/codeigniter-3/index.php/term/tag" class="w3-bar-item w3-button">Tags</a>
    </div>
    <a onclick="myAccFunc('2')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
    <span class="oi" data-glyph="musical-note"></span> Media
    </a>
    <div id="demoAcc-2" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
      <a target="blank" href="http://kautube.com/codeigniter-3/index.php/media/grid" class="w3-bar-item w3-button">Library</a>
      <a target="blank" href="http://kautube.com/codeigniter-3/index.php/media/upload" class="w3-bar-item w3-button">Add New</a>
    </div>
    <a onclick="myAccFunc('3')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
    <span class="oi" data-glyph="people"></span> Users
    </a>
    <div id="demoAcc-3" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
      <a href="<?php echo site_url('user') ?>" class="w3-bar-item w3-button">All Users</a>
      <a href="<?php echo site_url('user/adduser') ?>" class="w3-bar-item w3-button">Add New</a>
      <a href="<?php echo site_url('user/profile') ?>" class="w3-bar-item w3-button">Your Profile</a>
    </div>
    <a href="<?php echo site_url('auth/logout') ?>" class="w3-bar-item w3-button"><span class="oi" data-glyph="eject"></span> Logout</a>
    <!--<a href="#" class="w3-bar-item w3-button"><span class="oi" data-glyph="tags"></span> Tags</a>-->
  </div>
  <a target="_blank" href="//kautube.com/ask-question/" class="w3-bar-item w3-button w3-padding">Contact</a>  
  <a target="_blank" href="//kautube.com"  class="w3-bar-item w3-button w3-padding">&copy; Tedir Ghazali</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">Crud Blog</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><span class="oi" data-glyph="menu"></span></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge w3-white">
    <p class="w3-left"><?php echo $title ?></p>
    <p class="w3-right">
      <span onclick="location.href='<?php echo site_url() ?>'" class="oi w3-margin-right" data-glyph="dashboard"></span>
      <span onclick="location.href='//kautube.com/ask-question/'" class="oi" data-glyph="chat"></span>
    </p>
  </header>

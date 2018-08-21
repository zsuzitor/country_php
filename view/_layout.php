
<?php
function LayoutRenderStart($title){
	echo "<html lang='ru'>
<head>
<title>$title</title>";
?>
<meta charset="utf-8" />

<link href='/content/site.css' rel='stylesheet'>

<script src='/scripts/scripts.js'></script>

<script src='scripts/jquery-3.3.1.js'></script>
</head>
<body>
<div class='main_header'>
<div id="Main_preloader_id" class="Main_preloader"></div>
<h2 class='header_hello'>HELLO WORLD</h2>
</div>

<?php	
}

function LayoutRenderEnd(){
	echo "<div class='main_footer'></div></body></html>";
}
?>
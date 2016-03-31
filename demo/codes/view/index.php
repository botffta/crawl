<?php require_once "../head.php"; ?>


<body>
<!--menu-->
<div id="header">
	<div class="menu">
	</div>
	<div class="menu">
	</div>
</div>

<div id="body">
	<div class="view">
<?php	//list content
require_once "../ConHead.php";
require_once "Text.php";
$con = new ConHead("regexps.ini");
$text = new Text($con);
$text->listAll();
?>
	</div>
</div>


</body>

<?php 
include_once("../tail.php");
?>

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
	<div class="listname">
	<center>
<?php	//list content
require_once "../ConHead.php";
require_once "Listname.php"; 
$con = new ConHead("regexps.ini");	//get exps from ini document
$listname = new ListName($con);
$listname->listAll();	//list
?>
	</center>
	</div>
	<div class="page">
	<center>
<?php	//list page
require_once "Page.php"; 
$page = new Page($con);	
$page->listAll();	//list
?>	
	</center>
	</div>
</div>


</body>

<?php 
include_once("../tail.php");
?>

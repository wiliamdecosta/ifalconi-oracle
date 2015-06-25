<?php
define("RelativePath", "..");
include(RelativePath . "/Common.php");

  $param_string = CCGetQueryString("QueryString",Array("NAMAPHP","ccsForm"));
  $nama_php = CCGetFromGet("NAMAPHP", "-") ;
  $myCRUD = "0";
  
  if ($nama_php=="" || $nama_php=="-") {
  	 $file_name = "blank.html";
  } else {
    $file_name = "../".$nama_php . "?" . $param_string;
	
  }

  CCSetSession("CRUD", $myCRUD);

  header("Location: " . $file_name);
  exit;

?>

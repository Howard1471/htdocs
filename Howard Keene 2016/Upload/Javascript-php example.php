<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../Archive/Stylesheets/Style1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

 <script language="javascript" type="text/javascript">
 function _add_more() {
  var txt = "<br><input type=\"file\" name=\"item_file[]\">";
  document.getElementById("dvFile").innerHTML += txt;
 }
</script>

<body>
</body>
</html>

<?php
if($_POST['pgaction']=="upload")
 upload();
else
 uploadForm();
?>
 <tr class="txt">
   <td valign="top">
    <div id="dvFile">
     <input type="file" name="item_file[]">
    </div>
   </td>
   <td valign="top">
    <a href="javascript:_add_more();" title="Add more">
     <img src="../Archive/Upload/plus_icon.gif" border="0">
    </a>
   </td>
  </tr>
<?
 if(count($_FILES["item_file"]['name'])>0) { //check if any file uploaded
  $GLOBALS['msg'] = ""; //initiate the global message
  for($j=0; $j < count($_FILES["item_file"]['name']); $j++) { 
  //loop the uploaded file array
   $filen = $_FILES["item_file"]['name']["$j"]; //file name
   $path = 'uploads/'.$filen; //generate the destination path
   if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) {
   //upload the file
    $GLOBALS['msg'] .= "File# ".($j+1)." ($filen) uploaded successfully<br>";
    //Success message
   }
  }
 }
 else {
  $GLOBALS['msg'] = "No files found to upload"; //No file upload message 
 }
?>
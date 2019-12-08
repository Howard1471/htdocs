<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>All-in-one Upload</title>
<link href="Stylesheets/Style1.css" rel="stylesheet" type="text/css">
</head>
<body >

<h1>Upload Form</h1>
<h2>Complete the fields below, using the browse buttons to find the files</h2>
<form action="Gallery_upload.php" method="POST" enctype="multipart/form-data">
<!--<input type="hidden" name="MAX_FILE_SIZE" value="2097152" >--> <!-- 2097152 - 2Mb 6291456 - 6Mb -->
<!--<input type="hidden" name="POST_MAX_SIZE" value="10485760">--> <!-- 10485760 - 10M -->
<table>
<tr><td><p>Album Name:</p></td><td>  <Input type=text  name="Albumname" size="80"></td></tr>
<tr><td><p>Photo filename 1:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 2:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 3:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 4:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 5:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 6:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 7:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 8:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 9:</td><td>  <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td><p>Photo filename 10:</td><td> <Input type="file" name="imagefile[]" size="80"></td></tr>
<tr><td>&nbsp;</td><td align="right"><input type="submit" value = "Upload Files" ></td></tr>
</table>
<br><br>
</form>


</body>
 
</html>
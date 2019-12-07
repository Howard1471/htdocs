<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../../Archive/Stylesheets/Style1.css" rel="stylesheet" type="text/css" media="screen" />
<script src=""

<script language="javascript" type="text/javascript">

jQuery(document).ready(function($){
var max = 2;
var replaceMe = function(){
	var obj = $(this);
	if($("input[type='file']").length > max)
	{
		alert('fail');
		obj.val("");
		return false;
	}
	$(obj).css({'position':'absolute','left':'-9999px','display':'none'}).parent().prepend('<input type="file" name="'+obj.attr('name')+'"/>')
	$('#upload_list').append('<div>'+obj.val()+'<input type="button" value="cancel"/><div>');
	$("input[type='file']").change(replaceMe);
	$("input[type='button']").click(function(){
		$(this).parent().remove();
		$(obj).remove();
		return false; //safari fixes
	});
}
$("input[type='file']").change(replaceMe);
});
</script>
</head>


<body>


<div>
	<input type="file" name="files[]">
	<div id="upload_list"></div>
</div>


</body>
</html>
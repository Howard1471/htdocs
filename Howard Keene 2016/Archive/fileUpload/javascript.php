<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <html> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Javascript Test</title>
</head>

<php?

//"C:\\audiograbber\\disc.txt"
?>


    <script language="JScript">
    <!--
    function getparent() // foldername of given file.
    {
        var myObject, foldername, name, filesCol, filecount, x, e;
        myObject = new ActiveXObject("Scripting.FileSystemObject");
        foldername = myObject.GetParentFolderName("C:\\audiograbber\\disc.txt");
        name = myObject.GetFolder(foldername);
        alert("The parent folder name is: " + foldername);
		filesCol = name.Files;
		filecount = filesCol.Count;
		alert("There are " +filecount+ " files in " + name);
		for(var objEnum = new Enumerator(filesCol); !objEnum.atEnd(); objEnum.moveNext()) 
		{
	   	strFileName = objEnum.item();
	   	alert("File name :" +strFileName + "<BR>");
		}
		// Destroy and de-reference enumerator object
			delete objEnum;
			objEnum = null;

		// De-reference FileCollection and Folder object
			filesCol = null;
			name = null;
			foldername = null;
			
		// Destroy and de-reference FileSystemObject
			delete myObject;
			myObject = null;
	
    }
	/* -----------------------------------------------------------------------------*/
	function GetFilesParent( InitialFile )
	{
        var myObject, foldername, name, filesCol, filecount, x, e;
        myObject = new ActiveXObject("Scripting.FileSystemObject");
        foldername = myObject.GetParentFolderName(InitialFile);
        name = myObject.GetFolder(foldername);
		return name;
	}
	
	function GetFilesCollection( FolderObject )
	{
		var FileColl;
		
		
		FileCol = FolderObject.Files;
		return FileCol;
	}
	function GetFileCount( InitialFile )
	{
        var myObject, foldername, name, filesCol, filecount, x, e;
        myObject = new ActiveXObject("Scripting.FileSystemObject");
        foldername = myObject.GetParentFolderName(InitialFile);
        name = myObject.GetFolder(foldername);
		filesCol = name.Files;
		filecount = filesCol.Count;		
		
		filesCol = null;
		name = null;
		foldername = null;
		delete myObject;
		myObject = null;
				
		return filecount;
	}
	function GetCollectionFileName ( InitialFile, FileNumber )
	{
		var StrFileName;
        var myObject, foldername, name, filesCol, filecount, x, e;
        myObject = new ActiveXObject("Scripting.FileSystemObject");
        foldername = myObject.GetParentFolderName(InitialFile);
        name = myObject.GetFolder(foldername);
		filesCol = name.Files;
		filecount = filesCol.Count;			
		var objEnum = new Enumerator( FileColl);
		StrFileName = objEnum.item( FileNumber );
		
		delete objEnum;
		objEnum = null;	
		filesCol = null;
		name = null;
		foldername = null;
		delete myObject;
		myObject = null;
		
		return StrFileName;
	}
    -->
    </script>

    Get the parent folder name and the number of files for folder (Enum).

 <?
 $FilesInUse;
 $BaseFile = "C:\\audiograbber\\disc.txt";


     <form name="myForm">
    <input type="Button" value="Get Parent Folder" onClick='getparent()'>
    </form>
<div>  
<input type="file" name="files[]">  
<div id="upload_list"></div>  
</div> 
 


</body>
</html>

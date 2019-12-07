<?php


function rtf2txt( $rtf_filename )
{
$text = file_get_contents($rtf_filename);
if (!strlen($text)) {
 	echo "bad file";
 	exit();
	}
	
// we'll try to fix up the parts of the rtf as best we can
// clean up the file a little to simplify parsing
$text=str_replace("\r",' ',$text); // returns
$text=str_replace("\n",' ',$text); // new lines
$text=str_replace('  ',' ',$text); // double spaces
$text=str_replace('  ',' ',$text); // double spaces
$text=str_replace('  ',' ',$text); // double spaces
$text=str_replace('  ',' ',$text); // double spaces
$text=str_replace('} {','}{',$text); // embedded spaces
// skip over the heading stuff
$j=strpos($text,'{',1); // skip ahead to the first part of the header

$loc=1;
$t="";

$ansa="";
$len=strlen($text);
rtfgetpgraph(); // skip by the first paragrap

while($j<$len) {
 $c=substr($text,$j,1);
 if ($c=="\\") {
 // have a tag
 $tag=rtfgettag();
 if (strlen($tag)>0) {
 // process known tags
 switch ($tag) {
 case 'par':
 $ansa.="\r\n";
 break;
 // ad a list of common tags
 // parameter tags
 case 'spriority1':
 case 'fprq2':
 case 'author':
 case 'operator':
 case 'sqformat':
 case 'company':
 case 'xmlns1':
 case 'wgrffmtfilter':
 case 'pnhang':
 case 'themedata':
 case 'colorschememapping':
 $tt=rtfgettag();
 break;
 case '*':
 case 'info':
 case 'stylesheet':
 // gets to end of paragraph
 $j--;
 rtfgetpgraph();
 default:
 // ignore the tag
 }
 }
 } else {
 $ansa.=$c;
 }
 $j++;
}
$ansa=str_replace('{','',$ansa);
$ansa=str_replace('}','',$ansa);
return $ansa;
}

function rtfgetpgraph() {
 // if the first char after a tag is { then throw out the entire paragraph
 // this has to be nested
 global $text;
 global $j;
 global $len;
 $nest=0;
 while(true) {
 $j++;
 if ($j>=$len) break;
 if (substr($text,$j,1)=='}') {
 if ($nest==0) return;
 $nest--;
 }
 if (substr($text,$j,1)=='{') {
 $nest++;
 }
 }
 return;
}

function rtfgettag() {
 // gets the text following the / character or gets the param if it there
 global $text;
 global $j;
 global $len;
 $tag='';
 while(true) {
 $j++;
 if ($j>=$len) break;
 $c=substr($text,$j,1);
 if ($c==' ') break;
 if ($c==';') break;
 if ($c=='}') break;
 if ($c=="\\") {
 $j--;
 break;
 }
 if ($c=="{") {
 //rtfgetpgraph();
 break;
 }
 if ((($c>='0')&&($c<='9'))||(($c>='a')&&($c<='z'))||(($c>='A')&&($c<='Z'))||$c=="'"||$c=="-"||$c=="*" ){
 $tag=$tag.$c;
 } else {
 // end of tag
 $j--;
 break;
 }
 }
 return $tag;

}



<?php

$greeting = "Hello";
$fname = "Josh";
$space = " ";
$newline = "<br></br>";
//concatenation uses dots
//echo ($greeting.$space.$fname);

//embedd html tags
//echo "<h> BIG HEADING </h>";
//print($greeting + $fname);

$year = date("Y");
$yearextend = date("Y")+5;
$today = date("l jS F Y");
echo ("Copyright".$year."-".$yearextend." "."GOOGLE");

echo ($newline.$today);

$uniday = "Wednesday";

echo $newline;
echo ("Is today uni day?");
if(date("l") == $uniday || date("l") == "Thursday")
{
    echo (" Yes");
}
else{
    echo (" No");
}


echo $newline;
$email = $_POST["email"];
$password = $_POST["password"];
echo $email.$newline.$password;
//phpinfo();
//php  typeless
?>

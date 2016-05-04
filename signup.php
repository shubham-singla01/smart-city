<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="smartcity"; // Database name 

// Connection to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$php_name=$_POST['name']; 
$php_u_name=$_POST['login_username']; 
$php_u_pass=$_POST['login_password']; 

$sql="SELECT * FROM login WHERE Username='$php_u_name' ";
$result=mysql_query($sql);
if ($result==false)
{
	die(mysql_error());
}
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If email exists count==1 , count =0 if not
if($count==0)
{
	$add="INSERT INTO `login` (`Name`, `Username`, `Password`) VALUES ('$php_name', '$php_u_name', '$php_u_pass');"
	header("location:registred.html");
}
elseif($count==1)
{
	header("location:inuse.html");
}
else
{
	header("location:wrong.html");
}
?>
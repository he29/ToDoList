<style> table, td, caption { border: 2px solid blue ; padding: 6px; } </style>
<style> td { border: 1px solid green ; } </style>
<style> caption { color: red ; } </style>


<?php

include ("account.php");
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or die ( "Unable to connect to MySQL database" );
			
print "Connected to MySQL<br>";

mysql_select_db( $project );

$email	=	$_GET	[	"email"	] ;
$password =	$_GET	[	"password"	] ;
$fname	=	$_GET	[	"fname" ] ;
$lname	=	$_GET	[	"lname" ] ;
$bday	=	$_GET	[	"bday" ] ;
$gender	=	$_GET	[	"gender" ] ;
$number	=	$_GET	[	"number" ] ;
$password2 = $_GET ["password2"];
$password= $_REQUEST["password"];



if ($password==$password2)
{
print  "<h1> Username:	$email	</h1>";
print  "<h1> First Name:	$fname	</h1>";
print  "<h1> Last Name:	$lname	</h1>";
print  "<h1> Birthday:	$bday	</h1>";
print  "<h1> Gender:		$gender	</h1>";
print  "<h1> Phone Number:	$number	</h1>";

$sql = "insert into register values( '$gender', '$password', '$fname', '$lname', '$email', '$number', '$bday', '') " ;
header('Refresh: 5; URL=Home.html');

}
else
{
     print 'your password did not match, please try again';
}



print "<h1> Now enter your to do list item!</h1>" ;



$result = mysql_query ($sql ) or die( mysql_error() );

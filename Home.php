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
$todo =		$_GET	[	"todo"	] ;
$duedate=	$_GET	[	"duedate" ] ;
$duetime=	$_GET	[	"duetime" ] ;
$email2= $_REQUEST  ["email"];

print  "<h1> Username:	$email	</h1>";
print  "<h1> Item:		$todo	</h1>";
print  "<h1> Due Date:	$duedate	</h1>";
print  "<h1> Due Time:	$duetime	</h1>";
print "<h1> Your item has been added successfully! </h1>" ;


$sql = "insert into grades values( '$email', '$todo','$duedate' , '$duetime', '', '', '', '', '', '') " ;


$result = mysql_query ($sql ) or die( mysql_error() );
?>
<li> <span style="font-size: large"><a href="Home.html">Add Another Item</a></span>
<li> <span style="font-size: large"><a href="Todo.html">Check The DoList</a></span>

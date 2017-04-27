
<style> table, td, caption { border: 2px solid blue ; padding: 6px; } </style>
<style> td { border: 1px solid green ; } </style>
<style> caption { color: red ; } </style>


<?php

include ("account.php");
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or die ( "Unable to connect to MySQL database" );
			
print "Connected to MySQL<br>";

mysql_select_db( $project );


$email =  $_GET	[ "email" ];
$password =  $_GET [ "password"] ;
$password= $_REQUEST["password"];
$check = "select password from register where email = '$email'";
if ($password==$check) 
{

print "Sent email to: '$email'<br>";
//$name=mysql_real_escape_string($name);
print "Retrieving grades for: '$name'<br>";
$em = "select * from register where email = '$email'"; print "<br>$e<br><br>";
$send = mysql_query ( $e );

print "Number of rows is  "  .  mysql_num_rows ($send) ;

$s="select * from grades where username='$name' ";  print "<br>$s<br><br>";

//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

//2. Get rows $r

//Note the styles at top of the file here.
print "<table>"; 

print "<caption>"; 
print "Number of rows is  "  .  mysql_num_rows ($t) ;
print "</caption>";

print "<tr> <td>Name</td> <td>course</td> <td>a1</td> <td>A1s</td> <td>a2</td> <td>A2s</td> <td>a3</td> <td>A3s</td> <td>Participation</td> <td>Total</td> <td>Percentage</td></tr>"; 
while ( $r = mysql_fetch_array($t) )
{
     print "<tr style='background-color: $color; color: #000000;'>";
     print "<td>";
     print $r[username] ;
	 print "</td>";
	 print "<td>";
	 print $r[course];
	 print "</td>";
	 print "<td>";
	 print $r["a1"];
	 print "</td>";
	 print "<td>";
	 print $r["A1s"];
     print "</td>";
     print "<td>";	 
	 print $r["a2"];
	 print "</td>";
	 print "<td>";
	 print $r["A2s"];
	 print "</td>";
	 print "<td>";
	 print $r["a3"];
     print "</td>";
	  print "<td>";
     print $r[A3s] ;
	 print "</td>";
	  print "<td>";
     print $r["partic"] ;
	 print "</td>";
	  print "<td>";
     print $r["total"] ;
	 print "</td>";
	  print "<td>";
     print $r["percent"] ;
	 print "</td>";
     print "</tr>";
}
print "</table>";
if ($choice == "yes"){
 $emailLimit = "SELECT * from user where user='$email' and maximum > sofar";
 $numberLimit = mysql_query($emailLimit);
  $totalLimit = mysql_num_rows($numberLimit);
   $day = date("m/d/y"); 
   $time=date("H:i:s"); 
   $answer="yes"; 

   $response = "Dear: $email";
   $response .= "<br/> Your grades: $email reported  , is as follows: ";
  $response .= "<br/> Grades: ";
   print $response;
  
   
   $to = $email;
   $subject = "The grades for all the students ".$email;
   $from ="aee7@njit.edu";
   $headers = "From: $from";
   
    $message = "\nDear $user,";
		 $message .="\nThe summary of your grade report today is: ";
		 $message .="\n Username: " .$r[username] ;
	   $message .="\n Course:" .$r[course];
       $message .="\n a1: " .$r["a1"]; ;
	   $message .="\n A1s: ".$r["A1s"] ;
	     $message .="\n a2: " .$r["a2"]; ;
	   $message .="\n A2s: ".$r["A2s"] ;
	     $message .="\n a3: " .$r["a3"]; ;
	   $message .="\n A3s: ".$r["A3s"] ;
	   $message .="\n partic: ".$r["partic"];
	   $message .="\n total: ".$r["total"];
	   $message .="\n percent: ".$r["percent"];
   

		mail($to, $subject, $message, $headers) or (print "There was an error sending your message");
		{ 				
		 print "<br/>Per your request, an email copy was mailed to:  $email";
		mysql_query("UPDATE Authorization SET sofar = sofar +1 WHERE email='$email'") or die ("  Update error!!");
		 		}				
   
}
else{
print " <br> Per your request, no email copy was mailed to you.";
}

print "<br><br>Thank you!";
}
else{
print " <br> Wrong password please try again!";
header('Refresh: 5; URL=Todo.html');
}
?>

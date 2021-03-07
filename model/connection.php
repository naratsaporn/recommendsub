<?php
$mysqli = new mysqli();
@$mysqli->connect(
        'localhost', // host
        'root', //username
        '', // password // 123456
        'data_associate_sub' //database name 
);
      if(@$mysqli->connect_error){
      	echo @$mysqli->connect_error ;
		  exit(0);
      }
$mysqli->set_charset('utf8');
 	 //      'localhost', // host
   //      'id13640545_root', //username
   //      'er69nr18X_a+|^Ei', // password // 123456
   //      'id13640545_apartmentery' //database name 
?>
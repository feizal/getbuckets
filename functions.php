<?php

function checkuser($fuid,$ffname,$femail,$connection){
    		
    		$sql = "select * from Users where Fuid='".$fuid."'";
			$check = $connection->query($sql);
			$check = $check->num_rows;
			if ($check==0) { // if new user . Insert a new record		
			$query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('".$fuid."','".$ffname."','".$femail."')";
			$connection->query($query);	
			} else {   // If Returned user . update the user record		
			$query = "UPDATE Users SET Ffname='".$ffname."', Femail='".$femail."' where Fuid='".$fuid."'";
			$connection->query($query);	
			}

}?>

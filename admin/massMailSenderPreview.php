<?php

$NUM_OF_COL = 3;

function isValidEmail($email){
	if(isset($email)){
		$email = htmlspecialchars(stripslashes(strip_tags($email))); 
		if(eregi('[a-z||0-9]@[a-z||0-9].[a-z]', $email)) { 
			$domain = explode( "@", $email );
			if (@fsockopen ($domain[1],80,$errno,$errstr,3)) { 
				return true;
			} else { 
				return false; 
			} 
		} else { 
			return false; 
		} 
		if(isset($email) && (preg_match("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email) > 0)){
			return true;
		}
	}
	return false;
}

if ($_FILES["file"]["size"] < 200000){
	if ($_FILES["file"]["error"] > 0){
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	}else{
		if ($_FILES['file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'])) { //checks that file is uploaded
			$row = 0;
			if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$row++;
					if($row > 1) echo "<br>Data line: " . ($row - 1). " - " . $data[0] . " " . $data[1] . " " . $data[2] . "<br>";
					if($row > 1 && count($data) == $NUM_OF_COL){	
						echo 'Merchant:' . $data[0] . ' - ' . (count($data[0]) > 0? 'valid':'invalid') . '<br>';
						echo 'Contact Person:' . $data[1] . ' - ' . (count($data[1]) > 0? 'valid':'invalid') . '<br>';
						echo 'Email:' . $data[2] . ' - ' . (isValidEmail($data[2])? 'valid':'invalid') . '<br>';
					}else{
						if($row > 1) echo ' - invalid<br>';
					}
				}
				fclose($handle);
			
			}else{
				echo 'File read write error.';				
			}
		}else{
			echo 'File upload error.';
		}
	}
}else{
	echo "Invalid file";
}

?>
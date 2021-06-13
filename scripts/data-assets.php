<?php 
$folder_path = "../scripts"; 
$files = glob($folder_path.'/*');  
	foreach($files as $file) { 
	    if(is_file($file))  
	    unlink($file);  
	} 
?> 
<?php

	//GET Star-Night
	function log_text($param) { // ERROR-WRITE
		$file = "log.txt";
		$current = $file_get_contents($file);
		$current .= "\n Failed : $param";
		file_put_contents($file, $current);
	}
	function get_saveFile($url) {
	    $imgName_arry = explode("/", $url);
	    $imgName = $imgName_arry[sizeof($imgName_arry) - 1]; 
	    $cachePath = "f:/starnight/"; 

	    shell_exec("wget $url");
        $size = $size / 1024;
	  	return $Path . "," . $size;
	}
	
	date_default_timezone_set("Asia/Seoul");

	while (strtotime($date) <= strtotime($end_date)) {
		$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
		$rep = str_replace("-", "", $date);
		echo "Getting Data starnight_$rep from Server\n";
		$result = get_saveFile("potcast url");
		if (isset($result)) {
			$exp = explode(",", $result);
			echo "status : Success, " . $exp[1]. "mb\n";
		} else {
			echo "status : failed\n";
			log_text($result);
		}
		
	}
?>

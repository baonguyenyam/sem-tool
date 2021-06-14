<?php 
function pingURL($url=NULL)  
{  
    if($url == NULL) return false;  
    $ch = curl_init($url);  
    $agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.141 Safari/537.36';
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    // ADD 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    // ADD 
    $data = curl_exec($ch);  
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    curl_close($ch);  
    if($httpcode>=200 && $httpcode<300){  
        return true;  
    } else {  
		return false;  
    }  
}  
if(pingURL($_GET["data"])){
	file_get_contents($_GET["data"]);
	echo '<tr>
	<td>'.$_GET["number"].'</td>
	<td><a href="'.$_GET["data"].'" target="_blank">'.$_GET["data"].'</a></td>
	<td class="text-center text-success">
	<i class="fa fa-check"></i>
	</td>
	</tr>';
} else {
  echo '<tr>
	<td>'.$_GET["number"].'</td>
	<td><a href="'.$_GET["data"].'" target="_blank">'.$_GET["data"].'</a></td>
	<td class="text-center text-danger">
	<i class="fa fa-times"></i>
	</td>
	</tr>';
}
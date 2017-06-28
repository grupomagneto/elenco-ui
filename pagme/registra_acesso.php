<?php
require_once 'dbconnect.php';
$id_usuario = $_SESSION['user'];
$pagina = $_POST['pagina'];
$timestamp = date('Y-m-d H:i:s', time());
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function getDevice() { 
    global $user_agent;
    $device    =   "Unknown Device";
    $device_array       =   array(
                            '/windows xp/i'         =>  'Desktop',
                            '/windows nt/i'         =>  'Desktop',
                            '/windows me/i'         =>  'Desktop',
                            '/win98/i'              =>  'Desktop',
                            '/win95/i'              =>  'Desktop',
                            '/win16/i'              =>  'Desktop',
                            '/macintosh|mac os x/i' =>  'Desktop',
                            '/mac_powerpc/i'        =>  'Desktop',
                            '/linux/i'              =>  'Desktop',
                            '/ubuntu/i'             =>  'Desktop',
                            '/iphone/i'             =>  'Mobile',
                            '/ipod/i'               =>  'Mobile',
                            '/ipad/i'               =>  'Tablet',
                            '/android/i'            =>  'Mobile',
                            '/blackberry/i'         =>  'Mobile'
                        );
    foreach ($device_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $device    =   $value;
        }
    }   
    return $device;
}
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
					    	'/windows NT 10/i'   	=>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows XP',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows',
                            '/windows me/i'         =>  'Windows',
                            '/win98/i'              =>  'Windows',
                            '/win95/i'              =>  'Windows',
                            '/win16/i'              =>  'Windows',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Linux',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
$device     = getDevice();
$os 		= getOS();
$browser    = getBrowser();
$ip 		= $_SESSION['ip'];
$cidade 	= $_SESSION['cidade'];
$uf 		= $_SESSION['uf'];
$pais 		= $_SESSION['pais'];
$loc 		= $_SESSION['loc'];
$resultado = mysqli_query($link, "SELECT tipo_cadastro_vigente FROM tb_elenco WHERE id_elenco = '$id_usuario'");
$row = mysqli_fetch_array($resultado);
$cadastro = $row['tipo_cadastro_vigente'];
mysqli_query($link, "INSERT INTO acesso (id_elenco, tipo_cadastro_vigente, pagina, timestamp_acesso, dispositivo, os, browser, user_agent, ip, pais, uf, cidade, local) VALUES ('$id_usuario', '$cadastro', '$pagina', '$timestamp', '$device', '$os', '$browser', '$user_agent', '$ip', '$pais', '$uf', '$cidade', '$loc')");
mysqli_close($link);
?>

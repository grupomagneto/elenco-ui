<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style type="text/css">@-ms-viewport{width:device-width}</style>
<!-- <script type='text/javascript' src='//api.handsetdetection.com/apiv4/js/57394.js'></script> -->
<script type="text/javascript" src="viewportSize.js"></script>
<script type="text/javascript">
    var vwidth = viewportSize.getWidth();
    var vheight = viewportSize.getHeight();
</script>
</head>
<body>
<?php header('Content-Type: text/html; charset=utf-8');
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    $width = $_SESSION['screen_width'];
    $height = $_SESSION['screen_height'];
 //    if (isset($_SESSION['viewport_width']) AND isset($_SESSION['viewport_height'])) {
	//     $v_width = $_SESSION['viewport_width'];
	//     $v_height = $_SESSION['viewport_height'];
	//     $viewport = $v_width . 'x' . $v_height;
	// } else {
	//     $viewport = "Undetected";
	// }

    $viewport = "Undetected";
    $resolution = $width . 'x' . $height;
    
    $model = "Unknown";
	if ($width == 320 && $height == 480) {
		$model = "iPhone 4";
	}
	else if ($width == 375 && $height == 667) {
		$model = "iPhone 6+";
	}
	else if ($width == 414 && $height == 736) {
		$model = "iPhone 6+ Plus";
	}
	else if ($width == 320 && $height == 568) {
		$model = "iPhone 5";
	}
	else if ($height > 736) {
		$model = "Not mobile";
	}
} else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
    $_SESSION['viewport_width'] = $_REQUEST['viewportwidth'];
    $_SESSION['viewport_height'] = $_REQUEST['viewportheight'];
    header('Location: ' . $_SERVER['PHP_SELF']);
} else {
    echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
}

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getDevice() { 

    global $user_agent;

    $device    =   "Unknown Device";

    $device_array       =   array(
                            '/windows nt 6.2/i'     =>  'Desktop',
                            '/windows nt 6.1/i'     =>  'Desktop',
                            '/windows nt 6.0/i'     =>  'Desktop',
                            '/windows nt 5.2/i'     =>  'Desktop',
                            '/windows nt 5.1/i'     =>  'Desktop',
                            '/windows xp/i'         =>  'Desktop',
                            '/windows nt 5.0/i'     =>  'Desktop',
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

// $user_os        =   getOS();
// $user_browser   =   getBrowser();
// $device   		=   getDevice();

// $cep = "71503506";
// $cep_details = json_decode(file_get_contents("https://viacep.com.br/ws/{$cep}/json/"));
// $district = $cep_details->bairro;
// $uf = $cep_details->uf;

$ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$_SESSION['device']          = getDevice();
$_SESSION['os']              = getOS();
$_SESSION['browser']         = getBrowser();
$_SESSION['resolution']      = $resolution;
$_SESSION['viewport']        = $viewport;
$_SESSION['model']           = $model;
$_SESSION['user_agent']      = $user_agent;
$_SESSION['ip']              = $ip;
$_SESSION['access_city']     = utf8_decode($ip_details->city);
$_SESSION['access_uf']       = $ip_details->region;
$_SESSION['access_country']  = $ip_details->country;
$_SESSION['access_loc']      = $ip_details->loc;

// $iso88591 = $ip_details->city;
// $utf8_1 = utf8_encode($iso88591);
// $utf8_2 = iconv('ISO-8859-1', 'UTF-8', $iso88591);
// $utf8_2 = mb_convert_encoding($iso88591, 'UTF-8', 'ISO-8859-1');

// $device_details =   "<strong>Device: </strong>".$device."<br /><strong>Browser: </strong>".$user_browser."<br /><strong>OS: </strong>".$user_os."<br /><strong>Resolution: </strong>".$resolution."<br /><strong>Viewport: </strong>".$viewport."<br /><strong>Model: </strong>".$model."<br /><strong>User_agent: </strong>".$user_agent."<br /><strong>IP: </strong>".$ip."<br /><strong>Cidade do Acesso: </strong>".$access_city."<br /><strong>UF: </strong>".$uf."<br /><strong>Bairro: </strong>".$district."<br /><strong>Loc: </strong>".$access_loc."<br />";

// print_r($device_details);
?>
</body>
</html>
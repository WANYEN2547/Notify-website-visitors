<?php
error_reporting(0);
//while (true)


header("Access-Control-Allow-Origin: *");//Allow request from all domains.

//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $iper = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $iper = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $iper = $_SERVER['REMOTE_ADDR'];
  }
//echo $ip_address;



function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

//echo $user_ip; // 



    
         
         $ip = $_SERVER['REMOTE_ADDR'];
         $ip_address = gethostbyname("www.google.com");  
         $ip_address2 = gethostbyname("www.javatpoint.com");  
         $ip3 = gethostbyname("www.naelike.com"); 
        
         function get_operating_system() {
            $u_agent = $_SERVER['HTTP_USER_AGENT'];
            $operating_system = 'Unknown Operating System';
        
            //Get the operating_system name
            if (preg_match('/linux/i', $u_agent)) {
                $operating_system = 'Linux';
            } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
                $operating_system = 'Mac';
            } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
                $operating_system = 'Windows';
            } elseif (preg_match('/ubuntu/i', $u_agent)) {
                $operating_system = 'Ubuntu';
            } elseif (preg_match('/iphone/i', $u_agent)) {
                $operating_system = 'IPhone';
            } elseif (preg_match('/ipod/i', $u_agent)) {
                $operating_system = 'IPod';
            } elseif (preg_match('/ipad/i', $u_agent)) {
                $operating_system = 'IPad';
            } elseif (preg_match('/android/i', $u_agent)) {
                $operating_system = 'Android';
            } elseif (preg_match('/blackberry/i', $u_agent)) {
                $operating_system = 'Blackberry';
            } elseif (preg_match('/webos/i', $u_agent)) {
                $operating_system = 'Mobile';
            }
            
            return $operating_system;
        }
        
       //echo get_operating_system();
       $OS = get_operating_system();
         
//echo "IP Address of Google is - ".$ip_address;  
//echo "</br>";  
//$ip_address = gethostbyname("www.javatpoint.com");  
//echo "IP Address of javaTpoint is - ".$ip_address;
  
// Use JSON encoded string and converts
// it into a PHP variable
//$ipdat = @json_decode(file_get_contents(
  //  "http://www.geoplugin.net/json.gp?ip=" . $ip));
//echo 'ip:'.$ipdat->geoplugin_request."\n";
//echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
//echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
//echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
//echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
//echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
//echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
//echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
//echo 'Timezone: ' . $ipdat->geoplugin_timezone;
   

          $ipprefix="";
          $ipdata="";
          if($_SERVER["HTTP_CF_CONNECTING_IPV6"] != ""){
            $ipprefix = "IPv6";
            $ipdata = $_SERVER["HTTP_CF_CONNECTING_IPV6"];
          }else if($_SERVER["HTTP_CF_CONNECTING_IP"] != ""){
            $ipprefix = "IPv4";
            $ipdata = $_SERVER["HTTP_CF_CONNECTING_IP"];
          }else{
            $ipprefix = "IP";
            $ipdata = $_SERVER["REMOTE_ADDR"];
          }
          
     //ดึง ip จาก ipdata มาเช็คใน api แล้วดึงค่าออกมา     
          $ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ipdata));
          
         $sMessage = 
    "\n". $ipprefix." :".$ipdata.
    //ดึงค่าที่ได้ ip จาก api แล้วส่งเข้าไลน์ 
    "\n". "ประเทศ :".$ipdat->geoplugin_countryName.
    "\n". "ชื่อเมือง :".$ipdat->geoplugin_city.
    "\n"."รหัสอำเภอ :".$ipdat->geoplugin_regionCode.
    "\n"."อำเภอ :".$ipdat->geoplugin_regionName.
    "\n". "ชื่อทวีป :".$ipdat->geoplugin_continentName.
    "\n". "ละติจูด :".$ipdat->geoplugin_latitude.
    "\n". "ลองติจูด :".$ipdat->geoplugin_longitude.
    "\n"."ดีเลย์ :".$ipdat->geoplugin_delay.
    "\n". "ภูมิภาค :".$ipdat->geoplugin_region.
    "\n"."โซนเวลา :".$ipdat->geoplugin_timezone.
    "\n"."สถานะ :".$ipdat->geoplugin_status.
    //"\n"."IP JAVA :".$ip_address2.
    //"\n"."IP NL :".$ip3.
    //"\n"."IP GG :".$ip_address.
    //"\n"."IP 4 :".$ipdata.
    //"\n"."IP L :".$ipdata.
    "\n"."OS :".$OS.
    "\n";
    //token ไลน์ 
    //data ข้อมูลจาก api 
         $sToken = '';
         $data = 'ข้อมูล'.$sMessage.'';
         $url = "https://notify-api.line.me/api/notify";

//}
$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt( $chOne, CURLOPT_POST, 1); 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$data); 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 
?>

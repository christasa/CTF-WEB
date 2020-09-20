<?php
class JWT {
  public static function base64url_encode($data){
     return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }


  public static function base64url_decode($data){
     return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }	
 
  public static function sign($data) {
    $header = JWT::base64url_encode('{"alg":"HS256", "typ":"JWT"}');
    $token = "{";
    foreach($data as $key=>$value) {
      $token.= '"'.$key.'":"'.$value.'",';
    } 
    
    $token = rtrim($token,",")."}";
    $to_sign = $header.".".JWT::base64url_encode($token);
    return $to_sign.".".JWT::signature($to_sign); 
  } 


  public static function signature($data) {
    return JWT::base64url_encode(hash("sha256",$data,"@Y0u_C9n_NeVER_6UeSs"));
  }


  public static function verify($auth) {
    if(sizeof(explode(".",$auth)) == 3)
    	list($h64,$d64,$sign) = explode(".",$auth);
    else
	header("Location:/api/users/logout.php");

    if (!empty($sign) and (JWT::signature($h64.".".$d64) != $sign)) {
       header("Location:/api/users/logout.php");
    }
    $header = JWT::base64url_decode($h64);
    $data = JWT::base64url_decode($d64);
    return JWT::parse_json($data);
  }

  // json to array 
  public static function parse_json($str) {
    $data = explode(",",rtrim(ltrim($str, '{'), '}'));
    $ret = array();
    foreach($data as $entry) {
      list($key, $value) = explode(":",$entry);
      $key = rtrim(ltrim($key, '"'), '"');
      $value = rtrim(ltrim($value, '"'), '"');
      $ret[$key] = $value;
    }
    return $ret;
  }
}
?>

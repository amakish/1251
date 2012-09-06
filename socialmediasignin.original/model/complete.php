<?php
require_once "common.php";

//capture code from auth
$code = $_GET["code"];
//construct POST object for access token fetch request
$postvals = array('grant_type' => 'authorization_code',
                  'client_id' => KEY,
                  'client_secret' => SECRET,
                  'code' => $code,
                  'redirect_uri' => CALLBACK_URL);

//get JSON access token object (with refresh_token parameter)
$sReturn = run_curl(ACCESS_TOKEN_ENDPOINT, 'POST', $postvals);
$token = json_decode($sReturn);

//construct URI to fetch profile for current user
$profile_url = "https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=" . $token->access_token;

//fetch profile of current user
$oProfile = json_decode(run_curl($profile_url, 'GET'));
?>


<?php
require_once "common.php";

//construct Facebook auth URI
$auth_url = AUTHORIZATION_ENDPOINT
          . "?redirect_uri=" . CALLBACK_URL
          . "&client_id=" . KEY
          . "&scope=https://www.googleapis.com/auth/userinfo.profile"
          . "&response_type=code";

//forward user to Facebook auth page
header("Location: $auth_url");
exit();
?>

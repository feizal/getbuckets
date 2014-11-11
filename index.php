<?php
require 'fbconfig.php';   // Include fbconfig.php file
session_start();
if(isset($_SESSION['fb_token']))
{
    require 'getLogout.php';
    echo "<a href='".$logoutUrl."'>Logout</a>";
}

?>

<html>
<head>
    <title>Get Buckets</title>
</head>

<body>
	<div class="fbLoginButton"></div><a href="<?php echo $loginUrl; ?>"><img src="assets/fb-login.png" style="width: 200px; margin-top: 20px" /></a></div>
</body>
</html>

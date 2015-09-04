<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );

require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php' );

require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookSignedRequestFromInputHelper.php' ); 
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );


require_once( 'Facebook/FacebookCanvasLoginHelper.php' );
require_once( 'Facebook/FacebookPageTabHelper.php' );

require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;

use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;


use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookPageTabHelper;

FacebookSession::setDefaultApplication(
    '830317417059582',
    '5a1a837c29436420235c48f5292bd37b');
    $pageHelper = new FacebookRedirectLoginHelper(
    'http://localhost/FED14/git/socialmedia_api/index.php');
    
    $session = $pageHelper->getSessionFromRedirect ();

if ( isset($session)) {
    
    $request = new FacebookRequest ( $session, 'GET', '/me');
    $response = $request->execute();
    
    $graphObject = $response->getGraphObject() -> asArray();
    
    
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Nacka Forum Showcase</title>
		<meta charset="utf-8">
		<meta name="author" content="Henrik Nilsson">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='https://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
	    <div id='content'>
		<?php include "database/getPhotos.php"; ?>
		<?php $facebookID = $graphObject["id"]; ?>
		<input id="fb_id" type="hidden" value="<?php echo $facebookID; ?>"/>
		<!--<table id='imgTable'>-->
			<!--<tr>-->
			<?php
				foreach ($rows as $key => $value) {
					$title = $value["username"];
					$link = $value["img_link"];
					$id = $value["id"];
					echo "<div class='imgBox'>";
						echo "<h3 id='title-".$id."'>$title</h3>";
						echo "<a href='$link' class='image-link'><img class='ig_img' src='$link'/></a>";
						echo "<div class='likeBox'><img id='heart-".$id."' src='img/heart_grey.png' alt='heart'/><span id='likes-".$id."' class='like'></span></div>";

						echo "<div class='voteBox'><button class='likeButton' id='button-".$id."'>RÖSTA</button></div>";

					echo "</div>";
				}
			?>
			<!--</tr>-->
		<!--</table>-->
	    </div>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/popup.js"></script>
	<link rel="stylesheet" type="text/css" href="css/popup.css" />
	</body>
</html>
<?php
} else{
    $helper = new FacebookRedirectLoginHelper(
    'http://localhost/FED14/git/socialmedia_api/index.php');
    echo '<a href="' . $helper->getLoginUrl(array('email', 'user_friends')) . '"target="_top">Login</a>';
}

?>
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
    'http://localhost/something/socialmedia_api/facebook/index2.php');
    
    $session = $pageHelper->getSessionFromRedirect ();

if ( isset($session)) {
    
    $request = new FacebookRequest ( $session, 'GET', '/me');
    $response = $request->execute();
    
    $graphObject = $response->getGraphObject() -> asArray();
    
    //echo '<pre>' . print_r($graphObject, 1) .'</pre>';
    
    ?>
    
    <!DOCTYPE HTML>
    
<html>
    <head>
        <meta charset="utf-8">
        <title>Rösta på Bilder!</title>
    </head>
    <body>
        Rösta!
        
    </body>
</html>
<?php
} else{
    $helper = new FacebookRedirectLoginHelper(
    'http://localhost/something/socialmedia_api/facebook/index2.php');
    echo '<a href="' . $helper->getLoginUrl(array('email', 'user_friends')) . '"target="_top">Login</a>';
}

?>
<?php
// uncomment this to display internal server errors.
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

require_once (dirname(__FILE__) . '/libraries/federation/FederatedLoginManager.php');

session_start();

$token = $_POST['wresult'];
$loginManager = new FederatedLoginManager();

if (!$loginManager->isAuthenticated()) {
	if (isset ($token)) {
		try {
			$loginManager->authenticate($token);
		} catch (Exception $e) {
			print_r($e->getMessage());
		}
	} else {
		$returnUrl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

		header('Pragma: no-cache');
		header('Cache-Control: no-cache, must-revalidate');		
		header("Location: " . FederatedLoginManager :: getFederatedLoginUrl($returnUrl), true, 302);
		exit();
	}
}
?>
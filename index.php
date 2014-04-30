<?php require_once (dirname(__FILE__) . '/secureResource.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Index Page</title>
</head>
<body>
	<h2>Index Page</h2>
	<h3>Welcome <strong><?php print_r($loginManager->getPrincipal()->getName()); ?></strong>!</h3>
	
	<h4>Claim list:</h4>
	<ul>
<?php 
	foreach ($loginManager->getClaims() as $claim) {
		print_r('<li>' . $claim->toString() . '</li>');
	}
?>
	</ul>
</body>
</html>
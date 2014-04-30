<?php

class FederatedConfiguration {
	private static $instance;
	private $properties;

	public static function getInstance() {
		if (!isset (FederatedConfiguration :: $instance)) {
			FederatedConfiguration :: $instance = new FederatedConfiguration();
		}
		return FederatedConfiguration :: $instance;
	}

	private function __construct() {
		$this->properties = parse_ini_file('federation.ini');
	}

	public function getStsUrl() {
		return $this->properties['federation.trustedissuers.issuer'];
	}

	public function getStsFriendlyName() {
		return $this->properties['federation.trustedissuers.friendlyname'];
	}

	public function getThumbprint() {
		return $this->properties['federation.trustedissuers.thumbprint'];
	}

	public function getRealm() {
		return $this->properties['federation.realm'];
	}

	public function getReply() {
		return $this->properties['federation.reply'];
	}

	public function getTrustedIssuers() {	
		return explode('|', $this->properties['federation.trustedissuers']);
	}

	public function getAudienceUris() {
		return explode('|', $this->properties['federation.audienceuris']);
	}
}
?>

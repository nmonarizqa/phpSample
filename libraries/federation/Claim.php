<?php

class Claim {
	public $claimType;
	public $claimValue;

	public function __construct($type, $value) {
		$this->claimType = $type;
		$this->claimValue = $value;
	}

	public function getClaimValues() {
		return explode(',', $this->claimValue);
	}

	public function toString() {
		return 'Claim [claimType=' . $this->claimType . ', claimValue=' . $this->claimValue . ']';
	}
}
?>

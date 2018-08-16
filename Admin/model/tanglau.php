<?php
	require_once "../_l_.php";
	function laytanglau(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM tang WHERE XOA=b'0';");
	}
?>
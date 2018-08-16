<?php
	require_once "../_l_.php";
	function laydonvitinh(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM donvitinh WHERE XOA=b'0';");
	}
?>
<?php
	require_once "../_l_.php";
	function laynhommathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM nhomhang WHERE XOA=b'0';");
	}
?>
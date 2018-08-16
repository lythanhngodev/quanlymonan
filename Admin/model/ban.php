<?php
	require_once "../_l_.php";
	function layban(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT b.IDB,b.TENB,t.IDT,t.TENT FROM ban b, tang t WHERE b.IDT=t.IDT AND b.XOA=b'0';");
	}
	function laytanglau(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM tang WHERE XOA=b'0';");
	}
?>
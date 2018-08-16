<?php
	require_once "../_l_.php";
	function laymathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT mh.IDMH,mh.IDNH,mh.TENMH FROM nhomhang nh, mathang mh WHERE mh.IDNH=nh.IDNH AND mh.XOA=b'0';");
	} 
	function laynhommathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM nhomhang WHERE XOA=b'0';");
	}
 ?>
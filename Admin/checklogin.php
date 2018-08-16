<?php 
	require_once "../_l_.php";
	session_start();
	if (isset($_SESSION['tdn']) && !empty($_SESSION['tdn']) && isset($_SESSION['mk']) && !empty($_SESSION['mk'])) {
		$kn = new clsKetnoi();
		$mk = $_SESSION['mk'];
		$tdn = $_SESSION['tdn'];
		$qr = $kn->query("SELECT * FROM taikhoan WHERE (BINARY TDN='$tdn') and (BINARY MK='$mk')");
		$result = mysqli_fetch_assoc($qr);
		if($result['Q']!='admin')
			$kn->golink($qlma['HOST']."Login");
		else{
			$_SESSION['quyen']=$result['Q'];
		}
	}
	else{
		$kn = new clsKetnoi();
		$kn->golink($qlma['HOST']."Login");
	}
 ?>
<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['ban']) && !empty($_POST['ban'])) {
			$kn = new clsKetnoi();
			$tenban = mysqli_real_escape_string($kn->conn,$_POST['ban']);
			$idt = intval($_POST['idt']);
			$idb = intval($_POST['idb']);
			$kiemtra = $kn->editdata("UPDATE ban SET TENB='$tenban', IDT='$idt' WHERE IDB = '$idb'");
			if ($kiemtra>0) {
				$kq['trangthai']=1;
				echo json_encode($kq);
			}
			else
				echo json_encode($kq);
		}
		else echo json_encode($kq);
	}
	else echo json_encode($kq);
	exit();
 ?>
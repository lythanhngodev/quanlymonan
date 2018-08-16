<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['mathang']) && !empty($_POST['mathang'])) {
			$kn = new clsKetnoi();
			$tentang = mysqli_real_escape_string($kn->conn,$_POST['mathang']);
			$idt = intval($_POST['idt']);
			$kiemtra = $kn->adddata("INSERT INTO mathang (IDT,TENB) VALUES ('$idt','$tentang');");
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
<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$kn = new clsKetnoi();
			$id = intval($_POST['id']);
			$kiemtra = $kn->deletedata("UPDATE nhomhang SET XOA=b'1' WHERE IDNH = '$id'");
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
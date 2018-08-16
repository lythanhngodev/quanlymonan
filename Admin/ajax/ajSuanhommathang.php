<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['ten']) && !empty($_POST['ten'])) {
			$kn = new clsKetnoi();
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			$id = intval($_POST['id']);
			$kiemtra = $kn->editdata("UPDATE nhomhang SET TENNH='$ten' WHERE IDNH = '$id'");
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
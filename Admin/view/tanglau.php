<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
    <div class="col-md-2"></div>
		<div class="col-md-8">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <button class="btn btn-default" data-toggle="modal" data-target="#modal-them"><i class="fa fa-plus"></i> Thêm mới</button><hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên tầng</th>
                  <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row=mysqli_fetch_assoc($tanglau)) { ?>
	                <tr>
	                  <td><?php echo $row['TENT']; ?></td>
	                  <td ltn="<?php echo $row['IDT'] ?>"><button class="btn btn-primary btn-sm sua">Sửa</button>&ensp;<button class="btn btn-danger btn-sm xoa">Xoá</button></td>
	                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Tên tầng</th>
                  <th>Thao tác</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
    <div class="col-md-2"></div>
</div>
<div class="modal fade" id="modal-them">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm tầng / lầu</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Tên tầng</label>
		  <input type="text" class="form-control" id="them-tentang" placeholder="Tên tầng">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-them">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-sua">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa tầng / lầu</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Tên tầng</label>
		  <input type="text" class="form-control" id="sua-tentang" placeholder="Tên tầng">
		  <input type="text" id="sua-id" hidden="hidden">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-sua">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-xoa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Xoá tầng / lầu</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<div class="alert alert-danger alert-dismissible">
				<h4><i class="icon fa fa-ban"></i> Chú ý!</h4>
				Bạn có chắc xoá tầng / lấu này ?<br>
				Tên tầng: <span><u id="xoa-tentang"></u></span>
			</div>
		  <input type="text" id="xoa-id" hidden="hidden">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger" id="btn-xoa">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('tanglau').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Khu vực / Tầng / Lầu";
    $('#example1').DataTable({
      'paging'      : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	language: {
		"sProcessing": "Đang xử lý...",
		"sLengthMenu": "Xem _MENU_ mục",
		"sZeroRecords": "Không tìm thấy dòng nào phù hợp",
		"sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
		"sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
		"sInfoFiltered": "(được lọc từ _MAX_ mục)",
		"sInfoPostFix": "",
		"sSearch": "Tìm:",
		"sUrl": "",
		"oPaginate": {
		    "sFirst": "Đầu",
		    "sPrevious": "Trước",
		    "sNext": "Tiếp",
		    "sLast": "Cuối"
		}
	}
    });
    $(document).on('click','.sua',function(){
    	$('#sua-tentang').val($(this).parent('td').parent('tr').find('td:nth-child(1)').text().trim());
    	$('#sua-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-sua').modal('show');
    });
    $(document).on('click','.xoa',function(){
    	$('#xoa-tentang').text($(this).parent('td').parent('tr').find('td:nth-child(1)').text().trim());
    	$('#xoa-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-xoa').modal('show');
    });
    $(document).on('click','#btn-them',function(){
    	var tentang = $('#them-tentang').val();
    	if (!tentang) {
    		tbdanger('Vui lòng điền tên tầng');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajThemtang.php',
            type: 'POST',
            data: {
            	tang:tentang
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-them').modal('hide');
            		tbsuccess('Đã thêm khu vực/ tầng / lầu');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
    $(document).on('click','#btn-sua',function(){
    	var tentang = $('#sua-tentang').val();
    	if (!tentang) {
    		tbdanger('Vui lòng điền tên tầng');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajSuatang.php',
            type: 'POST',
            data: {
            	tang:tentang,
            	id:$('#sua-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-sua').modal('hide');
            		tbsuccess('Đã sửa khu vực / tầng / lầu');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
    $(document).on('click','#btn-xoa',function(){
        $.ajax({
            url: 'ajax/ajXoatang.php',
            type: 'POST',
            data: {
            	id:$('#xoa-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-xoa').modal('hide');
            		tbsuccess('Đã xoá khu vực / tầng / lầu');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
</script>
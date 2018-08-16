<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div style="margin: 0 auto;">
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
                    <th>Tên mặt hàng</th>
                    <th>Tên nhóm hàng</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($row=mysqli_fetch_assoc($mathang)) { ?>
                    <tr>
                      <td><?php echo $row['TENMH']; ?></td>
                      <td ltn="<?php echo $row['IDNH'] ?>"><?php echo $row['TENNH']; ?></td>
                      <td ltn="<?php echo $row['IDMH'] ?>"><button class="btn btn-primary btn-sm sua">Sửa</button>&ensp;<button class="btn btn-danger btn-sm xoa">Xoá</button></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tên mặt hàng</th>
                    <th>Tên nhóm hàng</th>
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
</div>
<div class="modal fade" id="modal-them">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm mặt hàng</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nhóm mặt hàng</label>
          <select class="form-control" id="them-nhommathang">
            <?php while ($row = mysqli_fetch_assoc($nhommathang)) { ?>
            <option value="<?php echo $row['IDNH'] ?>"><?php echo $row['TENNH'] ?></option>  
            <?php } ?>
          </select>
        </div>
    		<div class="form-group">
    		  <label for="exampleInputEmail1">Tên mặt hàng</label>
    		  <input type="text" class="form-control" id="them-tenmathang" placeholder="Tên mặt hàng">
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
        <h4 class="modal-title">Sửa bàn</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Khu vực</label>
          <select class="form-control" id="sua-tang">
            <?php while ($row = mysqli_fetch_assoc($tanglaus)) { ?>
            <option value="<?php echo $row['IDT'] ?>"><?php echo $row['TENT'] ?></option>  
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên bàn</label>
          <input type="text" class="form-control" id="sua-tenban" placeholder="Tên bàn">
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
	document.getElementById('mathang').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Mặt hàng";
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
    	$('#sua-tenban').val($(this).parent('td').parent('tr').find('td:nth-child(1)').text().trim());
    	$('#sua-tang').val($(this).parent('td').parent('tr').find('td:nth-child(2)').attr('ltn').trim());
      $('#sua-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-sua').modal('show');
    });
    $(document).on('click','.xoa',function(){
    	$('#xoa-tentang').text($(this).parent('td').parent('tr').find('td:nth-child(1)').text().trim());
    	$('#xoa-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-xoa').modal('show');
    });
    $(document).on('click','#btn-them',function(){
    	var ten = $('#them-tenmathang').val();
    	if (!tenban) {
    		tbdanger('Vui lòng điền tên bàn');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajThemban.php',
            type: 'POST',
            data: {
            	mathang:ten,
              idnh:$('#them-nhommathang').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-them').modal('hide');
            		tbsuccess('Đã thêm mặt hàng');
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
    	var tenban = $('#sua-tenban').val();
    	if (!tenban) {
    		tbdanger('Vui lòng điền tên bàn');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajSuaban.php',
            type: 'POST',
            data: {
            	ban:tenban,
              idt:$('#sua-tang').val(),
            	idb:$('#sua-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-sua').modal('hide');
            		tbsuccess('Đã sửa bàn');
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
            url: 'ajax/ajXoaban.php',
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
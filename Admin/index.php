<?php require_once "checklogin.php" ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý món ăn</title>
    <base href="<?php echo $qlma['HOST']."Admin/" ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <!-- jQuery 3 -->
    <script src="../public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../public/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AD</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>AD</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Sidebar toggle button-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li id="trangchinh"><a href="#"><i class="fa fa-dashboard"></i> <span>Trang chính</span></a></li>
                <hr style="border-top: 1px dotted #40494e;margin-top: 5px;margin-bottom: 5px;">
                <li id="tanglau"><a href="?p=tanglau"><i class="fa fa-align-right"></i> <span>Khu vực / Tầng / Lầu</span></a></li>
                <li id="ban"><a href="?p=ban"><i class="fa fa-wheelchair"></i> <span>Bàn</span></a></li>
                <hr style="border-top: 1px dotted #40494e;margin-top: 5px;margin-bottom: 5px;">
                <li id="nhommathang"><a href="?p=nhommathang"><i class="fa fa-th-large"></i> <span>Nhóm mặt hàng</span></a></li>
                <li id="mathang"><a href="?p=mathang"><i class="fa fa-coffee"></i> <span>Mặt hàng</span></a></li>
                <li id="donvitinh"><a href="?p=donvitinh"><i class="fa fa-balance-scale"></i> <span>Đơn vị tính</span></a></li>
                <hr style="border-top: 1px dotted #40494e;margin-top: 5px;margin-bottom: 5px;">
                <li id="nhansu"><a href="#"><i class="fa fa-users"></i> <span>Nhân sự</span></a></li>
                <hr style="border-top: 1px dotted #40494e;margin-top: 5px;margin-bottom: 5px;">
                <li id="cauhinh"><a href="#"><i class="fa fa-cog"></i> <span>Cấu hình</span></a></li>
                <li id="thongke"><a href="#"><i class="fa fa-bar-chart"></i> <span>Thống kê</span></a></li>
                <li id="thongtincanhan"><a href="?p=thongtincanhan"><i class="fa fa-user"></i> <span>Thông tin cá nhân</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center;">
            <h1 id="tieudetrang">Trang chính</h1>
        </section>

        <!-- Main content -->
        <section class="content">
        	<?php if (isset($_GET['p'])) {
        		switch ($_GET['p']) {
        			case 'tanglau':
        				require_once "control/tanglau.php";
        				break;
                    case 'ban':
                        require_once "control/ban.php";
                        break;
                    case 'nhommathang':
                        require_once "control/nhommathang.php";
                        break;
                    case 'mathang':
                        require_once "control/mathang.php";
                        break;
                    case 'donvitinh':
                        require_once "control/donvitinh.php";
                        break;
        		}
        	}
        	else
        		require_once "control/trangchinh.php";
        	 ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Phiên bản</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Mr. Ngô Thanh Lý</a>.</strong>
    </footer>
</div>
<!-- ./wrapper -->
<script src="../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../public/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../public/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
(function(){var c;c=jQuery;c.bootstrapGrowl=function(f,a){var b,e,d;a=c.extend({},c.bootstrapGrowl.default_options,a);b=c("<div>");b.attr("class","bootstrap-growl alert");a.type&&b.addClass("alert-"+a.type);a.allow_dismiss&&(b.addClass("alert-dismissible"),b.append('<button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&#215;</span><span class="sr-only">Close</span></button>'));b.append(f);a.top_offset&&(a.offset={from:"top",amount:a.top_offset});d=a.offset.amount;c(".bootstrap-growl").each(function(){return d= Math.max(d,parseInt(c(this).css(a.offset.from))+c(this).outerHeight()+a.stackup_spacing)});e={position:"body"===a.ele?"fixed":"absolute",margin:0,"z-index":"9999",display:"none"};e[a.offset.from]=d+"px";b.css(e);"auto"!==a.width&&b.css("width",a.width+"px");c(a.ele).append(b);switch(a.align){case "center":b.css({left:"50%","margin-left":"-"+b.outerWidth()/2+"px"});break;case "left":b.css("left","20px");break;default:b.css("right","20px")}b.fadeIn();0<a.delay&&b.delay(a.delay).fadeOut(function(){return c(this).alert("close")}); return b};c.bootstrapGrowl.default_options={ele:"body",type:"info",offset:{from:"top",amount:20},align:"right",width:250,delay:4E3,allow_dismiss:!0,stackup_spacing:10}}).call(this);</script>
<script type="text/javascript">
    function tbinfo(mess){
        $.bootstrapGrowl('<i class="fa fa-spinner fa-spin"></i>  '+mess, {
            type: 'info',
            delay: 2000
        });
    }
    function tbsuccess(mess){
        $.bootstrapGrowl('<i class="fa fa-check"></i>  '+mess, {
            type: 'success',
            delay: 2000
        });
    }
    function tbdanger(mess){
        $.bootstrapGrowl('<i class="fa fa-close"></i>  '+mess, {
            type: 'danger',
            delay: 2000
        });
    }
</script>
</body>
</html>

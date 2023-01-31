<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestor de anomalias - <?php echo $__env->yieldContent('titulo'); ?></title>
	<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/datepicker3.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
	<!--<link href="<?php echo e(asset('js/calendario/sample in bootstrap v3/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" media="screen">-->
    <link href="<?php echo e(asset('js/calendario/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" media="screen">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Gestor de </span>Anomalias Sercafe S.A.</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>-->
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>-->
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!--<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">-->
			</div>
			<div class="profile-usertitle">
				<?php if(Auth::guest()): ?>
				<?php else: ?>
				<div class="profile-usertitle-name"><h5><?php echo e(Auth::user()->name); ?></div>
				<?php endif; ?>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>-->
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Panel de administración</a></li>


			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Gestione <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="<?php echo e(route('rutas')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Rutas
					</a></li>
					<?php if(Auth::user()->idperfil == 1): ?>
					<li><a class="" href="<?php echo e(route('informes')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Informes
					</a></li>
					<?php endif; ?>
				</ul>
			</li>
			<?php if(Auth::user()->idperfil == 1): ?>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
			<em class="fa fa-navicon">&nbsp;</em> Tablas <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="<?php echo e(route('gruposproductos.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Grupos de productos
					</a></li>
					<li><a class="" href="<?php echo e(route('productos.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Productos
					</a></li>
					<li><a class="" href="<?php echo e(route('proveedores.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Proveedores
					</a></li>
					<li><a class="" href="<?php echo e(route('ciudades.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Ciudades
					</a></li>
					<li><a class="" href="<?php echo e(route('tiendas.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Tiendas
					</a></li>
					<li><a class="" href="<?php echo e(route('areas.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Areas
					</a></li>
					<li><a class="" href="<?php echo e(route('anomalias.index')); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Anomalias
					</a></li>
				</ul>
			</li>
			<?php else: ?>
			<?php endif; ?>
			<li>
             <a href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <em class="fa fa-power-off">&nbsp;</em>Logout
             </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

            </form>
            </li>
			<!--<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>-->
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<!--<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>-->
		</div><!--/.row-->
		
	<div class="panel panel-container">
		
		<div class="panel-heading">
			<?php echo $__env->yieldContent('contenido1'); ?>	
		</div>
	
	</div>

		<!--<div class="row">-->
			<?php echo $__env->yieldContent('contenido2'); ?>	
		<!--</div>row-->
		
		<div class="row">
		
		</div><!--/.row-->
		
		<div class="row">
		
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/chart-data.js')); ?>"></script>
	<script src="<?php echo e(asset('js/easypiechart.js')); ?>"></script>
	<script src="<?php echo e(asset('js/easypiechart-data.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
	<script src="<?php echo e(asset('js/calidad.js')); ?>"></script>
	<!--<script src="<?php echo e(asset('js/calendario/sample in bootstrap v3/jquery/jquery-1.8.3.min.js')); ?>"></script>-->
	<script src="<?php echo e(asset('js/calendario/sample in bootstrap v3/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/calendario/js/bootstrap-datetimepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('js/calendario/js/locales/bootstrap-datetimepicker.es.js')); ?>"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

	<script>
  
    $('.form_date').datetimepicker({
        language:  'es',
        startView: 2,
        minView: 2,
        format: 'yyyy-mm-dd',
        autoclose: 1,
        forceParse: 0
    });

    $('.form_date2').datetimepicker({
        language:  'es',
        startView: 3,
        minView: 3,
        format: 'yyyy-mm',
        autoclose: 1,
        forceParse: 0
    });
   
   
	</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable({
    	"order": [[ 1, "desc" ]],
        responsive: true
    });
} );
</script>
		
</body>
</html>
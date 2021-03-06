<body class="hold-transition skin-red-light sidebar-mini
	{{ (Auth::user()->profile->options['sidebar']) ? 'sidebar-collapse' : '' }}"">
<div class="wrapper" id="app">
	@include('inferno-foundation::partials.top-nav')
	<!-- Left side column. contains the logo and sidebar -->
	@include('inferno-foundation::partials.sidebar')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		@yield('breadcrumb')

		@include('inferno-foundation::partials.notifications')

		<!-- Main content -->
		<section class="content">
			@yield('content')
		</section>
		<!-- /.content -->
	</div>

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.3.7
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
		reserved.
	</footer>
</div>

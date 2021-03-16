
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>ABSENSI RS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('/backend')}}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('/backend')}}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('/backend')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('/backend')}}/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('/backend')}}/css/demo.css">
    
    {{-- css plugin --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green">
				
				<a href="#" class="logo text-white">
					<img src=""  class="navbar-brand"> <span class="">ABSENSI RS</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									@if (auth()->user()->role == 1)
									<img src="{{url('/uploads/images/default.png')}}" alt="..." class="avatar-img rounded-circle">
									@else
									<img src="{{url('/uploads/images/'.auth()->user()->pegawai->foto)}}" alt="..." class="avatar-img rounded-circle">
									@endif
								
								
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									@if (auth()->user()->role == 1)
									<li>
									
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logout">Logout</a>
									</li>
									@elseif (auth()->user()->role == 2)
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{url('/uploads/images/'.auth()->user()->pegawai->foto)}}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ auth()->user()->nama }}</h4>
												<p class="text-muted">{{ auth()->user()->email }}</p><a href="/pegawai/{{ auth()->user()->pegawai->uuid }}/show" class="btn btn-xs btn-secondary btn-sm">Liat Profile</a>
											</div>
										</div>
									</li>
									<li>
									
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/gantipassword/{{ auth()->user()->uuid }}">Ganti Password</a>
										<a class="dropdown-item" href="/logout">Logout</a>
									</li>
									@endif
								
								
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					@if (auth()->user()->role == 1)
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							
							<img src="{{url('/uploads/images/default.png')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a href="#">
								<span>
									{{-- Hizrian --}}
									<span class="user-level">ADMIN</span>
									{{-- <span class="caret"></span> --}}
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					@else
					
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							
							<img src="{{url('/uploads/images/'.auth()->user()->pegawai->foto)}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a href="/pegawai/{{ auth()->user()->pegawai->uuid }}/show">
								<span>
									{{-- Hizrian --}}
									<span class="user-level">{{ auth()->user()->nama }}</span>
									{{-- <span class="caret"></span> --}}
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					@endif



					<ul class="nav nav-success">
						@if (auth()->user()->role == 2)
							
						<li class="nav-item active">
							<a href="/dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							
							</a>
						
						</li>

						<li class="nav-item">
							<a href="/pegawai/{{ auth()->user()->pegawai->uuid }}/show">
								<i class="fas fa-user"></i>
								<p>Profile</p>
							</a>
						
						 </li> 
						<li class="nav-item">
							<a href="/gantipassword/{{ auth()->user()->uuid }}">
								<i class="fas fa-key"></i>
								<p>Ganti Password</p>
							</a>
						
						 </li> 
						 @endif
						

						@if (auth()->user()->role == 1)
						<li class="nav-item active">
							<a href="/dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							
							</a>
						
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Master</h4>
						</li>

					
							
					
						<li class="nav-item">
							<a data-toggle="collapse" href="#master">
								<i class="fas fa-layer-group"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="master">
								<ul class="nav nav-collapse">
									<li>
										<a href="/jabatan">
											<span class="sub-item">Jabatan</span>
										</a>
									</li>
									<li>
										<a href="/pegawai">
											<span class="sub-item">Data Pegawai</span>
										</a>
									</li>
									{{-- <li>
										<a href="/kelas">
											<span class="sub-item">Data Kelas</span>
										</a>
									</li> --}}
								
								
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#laporan">
								<i class="fas fa-file"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporan">
								<ul class="nav nav-collapse">
									<li>
										<a href="/laporan">
											<span class="sub-item">Laporan Absensi</span>
										</a>
									</li>
									{{-- <li>
										<a href="/pegawai">
											<span class="sub-item">Data Pegawai</span>
										</a>
									</li> --}}
									{{-- <li>
										<a href="/kelas">
											<span class="sub-item">Data Kelas</span>
										</a>
									</li> --}}
								
								
								</ul>
							</div>
						</li>
						
						@endif
						{{-- <li class="nav-item">
							<a data-toggle="collapse" href="#siswa">
								<i class="fas fa-users"></i>
								<p>Data Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="siswa">
								<ul class="nav nav-collapse">
								
									<li>
										<a href="/siswa">
											<span class="sub-item">Data Siswa</span>
										</a>
									</li>
									<li>
										<a href="/wali">
											<span class="sub-item">Data Wali Siswa</span>
										</a>
									</li>
								
								</ul>
							</div>
						</li>
					
						<li class="nav-item">
							<a href="/point">
								<i class="far fa-file-powerpoint"></i>
								<p>Data Point</p>
							</a>
						
						</li>
					
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Starter</h4>
						</li>

						<li class="nav-item">
							<a href="/pointsiswa">
								<i class="fas fa-user"></i>
								<p>Point Siswa</p>
							</a>
						
						</li>
						<li class="nav-item">
							<a href="/konsultasi">
								<i class="fas fa-file-medical-alt"></i>
								<p>Konsultasi Siswa</p>
							</a>
						
						</li>
						<li class="nav-item">
							<a href="/pelanggaran">
								<i class="fas fa-exclamation-circle"></i>
								<p>Pelanggaran</p>
							</a>
						
						</li>
						<li class="nav-item">
							<a href="/prestasi">
								<i class="fas fa-trophy"></i>
								<p>Prestasi</p>
							</a>
						
						 </li> --}}
					{{--	<li class="nav-item">
							<a href="/report">
								<i class="fas fa-file"></i>
								<p>Report</p>
							</a>
						
						</li> --}}
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">

            @yield('content')
            

			<footer class="footer">
				<div class="container-fluid">
				
					<div class="copyright ml-auto">
						20121, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">ABSENSI RS</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div> --}}
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('/backend')}}/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{asset('/backend')}}/js/core/popper.min.js"></script>
	<script src="{{asset('/backend')}}/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{asset('/backend')}}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{asset('/backend')}}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('/backend')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('/backend')}}/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	{{-- <script src="{{asset('/backend')}}/js/setting-demo.js"></script> --}}
	{{-- <script src="{{asset('/backend')}}/js/demo.js"></script> --}}
	
	
	

	<!-- DateTimePicker -->
	
	<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>

    {{-- js plugin --}}

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


	<!-- Chart JS -->
	<script src="{{asset('/backend')}}/js/plugin/chart.js/chart.min.js"></script>
	
    <script src="{{asset('/backend')}}/js/plugin/datatables/datatables.min.js"></script>

	
	<!-- Chart Circle -->
	<script src="{{asset('/backend')}}/js/plugin/chart-circle/circles.min.js"></script>

	@include('sweetalert::alert')

	<script src="{{asset('/backend')}}/js/sweetalert.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @yield('js')
</body>
</html>
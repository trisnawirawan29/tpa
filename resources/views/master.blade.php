<!DOCTYPE html>
<html lang="en">
@include('partial/head')
<body class="hold-transition sidebar-mini">
<div class="wrapper"> 
  @include('partial/navbar')
  @include('partial/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('judul')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @yield('link')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

      <!-- ALERT SUKSES -->
			@if(Session::get('status') == 'sukses')
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

				<h4><i class="icon fa fa-check"></i>Berhasil</h4>
				{{Session::get('pesan')}}
			</div>
			@endif

			<!-- ALERT SUKSES -->
			@if(Session::get('status') == 'gagal')
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

				<h4><i class="icon fa fa-warning"></i>Terjadi Kesalahan</h4>
				{{Session::get('pesan')}}
			</div>
			@endif

      <div class="container-fluid">
        @yield('konten')
      </div>
    </div>

  </div>
  <!-- /.content-wrapper -->

  <a href="https://api.whatsapp.com/send?phone=6282145966225&text=Halo%21%20Admin" class="float" target="_blank">
  <i class="fa fa-comments my-float"></i>
  </a>

  @include('partial/control')
  @include('partial/footer')
  
</div> <!-- ./wrapper -->
 @include('partial/js')

</body>
</html>

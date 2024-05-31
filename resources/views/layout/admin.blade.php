<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('img/kojuk.png')}}" rel="icon">
  <title>KopiJujuk - @yield('title')</title>
  <link href="{{asset('vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/ruang-admin.css')}}" rel="stylesheet">
</head>

<body id="page-top">
  @if (Auth::user()->role == 'admin')
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Script -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> 
  {{-- font awesome --}}
  <script src="https://kit.fontawesome.com/a284969f0d.js" crossorigin="anonymous"></script>
  <script>
    function confirmLogout(event) {
      event.preventDefault(); // Menghentikan aksi default dari link
  
      // Menampilkan dialog konfirmasi
      var confirmation = confirm("Apakah Anda yakin ingin logout?");
  
      // Jika pengguna mengonfirmasi logout, kirimkan form
      if (confirmation) {
        document.getElementById('logoutForm').submit();
      }
    }
  </script> 
  @endif
</body>

</html>
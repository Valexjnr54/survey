<!DOCTYPE HTML>
<html lang="en">

<!--=================== PAGE HEAD START ==============================-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> Admin Dashboard - Enrolment Questionnaire</title>

  <!-- page Favicon -->
  <link href="{{ asset('admin_page_assets/images/logo.png') }}" rel="shortcut icon" type="image/x-icon">

  <link href="{{ asset('admin_page_assets/css/bootstrapf9e3.css?v=1.1') }}" rel="stylesheet" type="text/css"/>

  <!-- custom style -->
  <link href="{{ asset('admin_page_assets/css/uif9e3.css?v=1.1') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('admin_page_assets/css/responsivef9e3.css?v=1.1') }}" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="{{ asset('admin_page_assets/fonts/material-icon/css/round.css') }}"/>

  <!--- Font Awesome --------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">

</head>
<!--=================== PAGE HEAD END ==================================-->

<!--======================== PAGE BODY START============================-->
<body>

<b class="screen-overlay"></b>

@include('partials.admin.sidebar')

<!--========================= MAIN-BODY STARTS ==========================-->
<main class="main-wrap">
    @include('partials.admin.navbar')

    <!--==================== MAIN-BODY CONTENT START =======================-->
    @yield('content')
    @include('sweetalert::alert')
    <!--==================== MAIN-BODY CONTENT END =========================-->
</main>
<!--========================= MAIN-BODY END ================================-->


<!--========================= PAGE SCRIPT START ============================-->

<!-- Darkmode Library JS -->
<script type="text/javascript">
	if(localStorage.getItem("darkmode")){
		var body_el = document.body;
		body_el.className += 'dark';
	}
</script>

<!-- Frameworks/Library JS -->
<script src="{{ asset('admin_page_assets/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('admin_page_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('DataTables/datatables.js') }}"></script>

@stack('scripts')

<!-- Custom JS -->
<script src="{{ asset('admin_page_assets/js/scriptc619.js?v=1.0') }}" type="text/javascript"></script>


<!--========================= PAGE SCRIPT END ============================-->

</body>

</html>
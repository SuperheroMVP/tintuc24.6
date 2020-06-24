
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	  <meta property="og:url"           content="http://localhost/tintuc2/" />
	  <meta property="og:type"          content="Tin Tuc" />
	  <meta property="og:title"         content="Tin Tuc" />
	  <meta property="og:description"   content="Cung cấp thông tin công nghệ, thời sự" />
	  <meta property="og:image"         content="http://localhost/tintuc2/" />


	<base href="{{ asset('') }}">
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
	 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	@yield('css')
	<script src="public/js/jquery.js"></script>
	<script src="public/js/tintuc.js"></script>
</head>
<body>

	@include('layout.header')
     @yield('content')
	@include('layout.footer')
	<!-- Subiz -->
	<script>
		(function(s, u, b, i, z){
			u[i]=u[i]||function(){
				u[i].t=+new Date();
				(u[i].q=u[i].q||[]).push(arguments);
			};
			z=s.createElement('script');
			var zz=s.getElementsByTagName('script')[0];
			z.async=1; z.src=b; z.id='subiz-script';
			zz.parentNode.insertBefore(z,zz);
		})(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
		subiz('setAccount', 'acqqcvysgjavssgjhsqk');
	</script>
	<!-- End Subiz -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	    <script>
    AOS.init();
  </script>

	@yield('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=213994639696264&autoLogAppEvents=1">
	
</script>
</body>
</html>
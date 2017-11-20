<?php


echo'
<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
    
	<head>
    	<!-- meta charset -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>Elegir Restaurante</title>		
		<!-- Meta Description -->
        <meta name="description" content="D-Control Colombia">
        <meta name="keywords" content="D-Control, D-Control Colombia">       
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


		
		<!-- Google Font -->
		
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">

		
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="assets/img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<!-- CSS
		================================================== -->
        <!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">		
		
		<!-- Main stylesheet-->
        <link rel="stylesheet" href="assets/css/main.css">				

   		<!-- Trajan Pro font -->
        <link rel="stylesheet" href="assets/fonts/style.css">
		 
		 <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
 
		<!-- Animate Css-->
        <link rel="stylesheet" href="assets/css/animate.css"> 
		
		<!-- Animate Css-->
        <link rel="stylesheet" href="assets/css/sweetalert.css"> 
			
			<!-- JS
		================================================== -->	

		<!-- Main jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Twitter Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
				
		<!-- Custom.js -->
        <script src="assets/js/custom.js"></script>
		
		<!-- WOW -->
        <script src="assets/js/wow.min.js"></script> 
			
		<!-- Appear.js -->
        <script src="assets/js/sweetalert-dev.js"></script> 

		<!-- Appear.js -->
        <script src="assets/js/jquery.appear.js"></script> 
		
		<!-- Parallax.js -->
        <script src="assets/js/jquery.parallax-1.1.3.js"></script> 

        <!-- Easing.js -->
        <script src="assets/js/jquery.easing.min.js"></script> 

		<!-- Modernizer Script for old Browsers -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script> 	';

?>

		<script>
		$(document).ready(function(){
		console.clear();

var el = {};

$('.placeholder').on('click', function (ev) {
  $('.placeholder').css('opacity', '0');
  $('.list__ul').toggle();
});

 $('.list__ul a').on('click', function (ev) {
   ev.preventDefault();
   var index = $(this).parent().index();

   $('.placeholder').text( $(this).text() ).css('opacity', '1');

   console.log($('.list__ul').find('li').eq(index).html());

   $('.list__ul').find('li').eq(index).prependTo('.list__ul');
   $('.list__ul').toggle();
   var idSucursal = document.getElementsByTagName("a")[0].getAttribute("id");
    <!-- document.getElementById("demo").innerHTML = idSucursal; -->
	<!-- alert("Clicqueo " + idSucursal); -->
window.location.href ="dashboard.html";

 });


$('select').on('change', function (e) {

  // Set text on placeholder hidden element
  $('.placeholder').text(this.value);

  // Animate select width as placeholder
  $(this).animate({width: $('.placeholder').width() + 'px' });

});
});


		</script>
</head>


<?php
echo'


    <body >
		<section class="log">
            <div class="container">
                <img alt="User Avatar" src="assets/img/d-control.png" class="img-preview">
                <h1 class="white wow bounce animated bounceInLeft">Bienvenido a D-Control</h1>	
                <br>
                <p><h2 class="letrarojo">Escoja el restaurante</h2></p>
                <br>
                <form role="form" action="index.php" method="post">
                    <div class="box-body">
          
                            <div class="col-md-4 col-md-offset-4">                                       
                             <select name="recogerestaurante" class="form-control" required>
                                    ';
                                    $alm = $this->model2->listarrestaurantes();
                                    while ($row = mysqli_fetch_row($alm))
                                        {
                                        echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
                                        }
                                    echo'
                                </select> 
                                <br>
                              
                                <button name="recogeboton1" type="submit"  class="btn btn-default">Seleccionar</button>                                                                                          
                            </div>
                           
                     </div>      
                </form>
            </div> 

		</section>

    </body>
</html>


';
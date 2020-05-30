<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Digital Connect - </title>

<link rel="stylesheet" href="libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />


<link href="libs/jquery/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="libs/jquery/bootstrap/dist/css/bootstrap-submenu.min.css" rel="stylesheet">
<link href="styles/CountrySelectStyle.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Russo+One' rel='stylesheet' type='text/css'>


</head>

<body>
	<div class="jumbotron">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand">
                       		<img style="max-width:40%; margin-top: -7px;"
             					src="images/2.png" alt="U. Logo">
                        </a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
                            <li><a href="https://unilever.sharepoint.com/Pages/Home.aspx">Home</a></li>
                            <li><a href="http://ecrdds1.s3.ms.unilever.com/Data/TR_InvMgmt.nsf/">Batch Cards</a></li>
                            <li><a href="#">Support</a></li>                                   
						</ul>
					</div>
				</div>  
			</nav> 
			<div class="row text-center">
                <h1>Digital Connect</h1>
                <h3>Location</h3>           
				<div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Select <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-submenu">
                        <a href="#" tabindex="0" data-toggle="dropdown">Pilot Plant</a>
                            <ul class="dropdown-menu">
                                <li><a href="CountrySelect.php?cmd=home&country=Durban, South Africa" tabindex="0">Durban, South Africa</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Kalina, Russia" tabindex="0">Kalina, Russia</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Mumbai, India" tabindex="0">Mumbai, India</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Port Sunlight, UK" tabindex="0">Port Sunlight, UK</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Shanghai, China" tabindex="0">Shanghai, China</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Trumbull, USA" tabindex="0">Trumbull, USA</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Valinhos, Brazil" tabindex="0">Valinhos, Brazil</a></li>
                                <li><a href="CountrySelect.php?cmd=home&country=Vlaardingen, Netherlands" tabindex="0">Vlaardingen, Netherlands</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                        <a href="#" tabindex="0" data-toggle="dropdown">Manufacturing</a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-submenu">
                                <a href="#" tabindex="0" data-toggle="dropdown">United States</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="CountrySelect.php?cmd=home&country=Englewood Cliffs, NJ" tabindex="0">Englewood Cliffs, NJ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
				</div>
                <p>Please note: This site is under construction. The only accessible option is Trumbull, USA.</p>
			</div> 
		</div>
	</div><!--end jumbotron-->   

<script src="libs/jquery/jquery/dist/jquery.js"></script>
<script src="libs/jquery/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="libs/jquery/bootstrap/dist/js/bootstrap-submenu.min.js"></script>


<script>
$(document).ready(function(){
	$('.dropdown-submenu > a').submenupicker();
});
</script>
</body>
</html>

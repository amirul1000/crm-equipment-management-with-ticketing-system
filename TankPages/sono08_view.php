<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Digital Connect</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="../styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../styles/font.css" type="text/css" />
  <link rel="stylesheet" href="../styles/app.css" type="text/css" />

</head>

<body>

<div class="app">
	<!--#include virtual="/includes/dataNav.html" -->
    <?php include "../includes/dataNav.php"; ?>     
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="box">
            <!-- Content Navbar -->
            <div class="navbar md-whiteframe-z1 no-radius blue">
                <!-- Open side - Naviation on mobile -->
                <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
                <!-- / -->
                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h4">Sonolator 08</div>
                <!-- / -->
                <div class="logo pull-right pull-up"><img src="../images/1.png" alt="U" style="height:60px;width: auto;"></div>
            </div>
            
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding">                             
                        <div class="row">
                        
                                <div class="col-lg-6 col-md-6">
                                  <div class="row no-gutter">
                                    <div class="col-md-12">
                                        
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Data Feed</h2>
                                                <small>Sonolator 08</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Sono08')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../home/index.php">Data Feed (all)</a></li>
                                                            <li><a href="../FilePages/s08files.php">Main Archive</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Sono08.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">          
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-tank">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Sono08" class="iframe-scale-tank" src="http://162.87.125.209/"></iframe> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.1-->
                                        
                                    </div>                       
                                </div>                        
                            </div><!--End of Column1--> 
                                       
                            <div class="col-lg-6 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                    
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Archives</h2>
                                                <small>SONO 08</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="p-md">          
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-file">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe class="iframe-scale-file" src="ftp://162.87.125.232/sono8"></iframe> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.1-->
                                        
                                    </div>
                                </div> 
                            </div><!--End of Column2-->
                                                                                                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/Content-->
</div>  

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../libs/jquery/waves/dist/waves.js"></script>

<script src="../scripts/ui-load.js"></script>
<script src="../scripts/ui-jp.config.js"></script>
<script src="../scripts/ui-jp.js"></script>
<script src="../scripts/ui-nav.js"></script>
<script src="../scripts/ui-toggle.js"></script>
<script src="../scripts/ui-form.js"></script>
<script src="../scripts/ui-waves.js"></script>
<script src="../scripts/ui-client.js"></script>
<script src="../scripts/iFrame.js"></script>

</body>

</html>
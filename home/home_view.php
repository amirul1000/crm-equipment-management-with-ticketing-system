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
	
    
    
    <?php 
	    include "../includes/nav.php"; 
	?>
    
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="box">
            <!-- Content Navbar -->
            <div class="navbar md-whiteframe-z1 no-radius blue">
                <!-- Open side - Naviation on mobile -->
                <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
                <!-- / -->
                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h4">Live Data Feed</div>
                <!-- / -->
                <div class="logo pull-right pull-up"><img src="../images/1.png" alt="U" style="height:60px;width: auto;"></div>
            </div>
            
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding">                             
                        <div class="row">
                        
                                <div class="col-lg-4 col-md-6">
                                  <div class="row no-gutter">
                                    <div class="col-md-12">
                                        
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 15</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank15')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank15.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/15files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank15.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank15" class="iframe-scale-main" src="http://162.87.125.208"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.1-->

                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 10</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank10')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="http://162.87.125.105/" class="btn btn-default" role="button" target="_blank">Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank10.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/10files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank10.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                             <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank10" class="iframe-scale-main" src="http://162.87.125.206/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.2-->
 
                                         <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 18</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                             
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank18')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank18.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/18files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank18.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                             
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">                                                    
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank18" class="iframe-scale-main" src="http://162.87.125.204/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.3-->                                       

                                         <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 16</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                             
                                           <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank16')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank16.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/16files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank16.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>  
                                             
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main"> 
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank16" class="iframe-scale-main" src="http://162.87.125.212/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.4--> 
                                        
                                         <div class="card">
                                            <div class="card-heading">
                                                <h2>Floor 2 BSM3</h2>
                                                <small>Building 10, Floor 2</small>
                                            </div>
                                             
                                           <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('b10f2')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/b10f2.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/b10f2files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>  
                                             
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main"> 
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="b10f2" class="iframe-scale-main" src="http://162.87.125.215/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.4-->                                         
                                                                                                   
                                    </div>                       
                                </div>                        
                            </div><!--End of Column1--> 
                                       
                            <div class="col-lg-4 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                        
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>SONO 05</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Sono05')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="http://162.87.125.105/" class="btn btn-default" role="button" target="_blank">Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/sono05.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/s05files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Sono05.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main"> 
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Sono05" class="iframe-scale-main" src="http://162.87.125.207/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.1-->
                                        
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>SONO 08
                                                    <button class="btn btn-xs btn-iframe" type="button" onclick="var ifr=document.getElementsByName('Sono08')[0]; ifr.src=ifr.src;">Refresh</button>
                                                </h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Sono08')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/sono08.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/s08files.php">Files</a></li>
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
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Sono08" class="iframe-scale-main" src="http://162.87.125.209/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.2-->

                                         <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 4A</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                             
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank4a')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank4a.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/4afiles.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank4A.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                                                                         
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank4A" class="iframe-scale-main" src="http://162.87.125.205/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.3-->                                       

                                         <div class="card">
                                            <div class="card-heading">
                                                <h2>Tank 13</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                             
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Tank13')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/tank13.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/13files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/Tank13.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                             
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Tank13" class="iframe-scale-main" src="http://162.87.125.203"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.4--> 
                                            
                                    </div>
                                </div> 
                            </div><!--End of Column2-->
                            
							<div class="col-lg-4 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2> Deo Lab</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Deo')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/deo.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/deofiles.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/DEO.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">          
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Deo" class="iframe-scale-main" src="http://162.87.125.202/"></iframe> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--End of Card 3.1--> 
                                         
							<div class="col-lg-4 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>S.B. 11
                                                    <button class="btn btn-xs btn-iframe" type="button" onclick="var ifr=document.getElementsByName('SB11')[0]; ifr.src=ifr.src;">Refresh</button>
                                                </h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('SB11')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/SB11.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/sb11files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/SB11.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="SB11" class="iframe-scale-main" src="http://162.87.125.210/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--End of Card 3.2-->
                            
							<div class="col-lg-4 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Defi Reactor</h2>
                                                <small>Main Pilot Plant</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('Defi')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/defi.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/defifiles.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                            <li>
                                                            	<div class="image"><img src="../images/DEFI.png" alt="timg"/></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="Defi" class="iframe-scale-main" src="http://162.87.125.211/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--End of Card 3.3 & Column 3-->  

                            <div class="col-lg-4 col-md-6">
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-heading">
                                                <h2>Floor 3 BSM3</h2>
                                                <small>Building 10, Floor 3</small>
                                            </div>
                                            
                                            <div class="card-tools">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" class="btn btn-default" onclick="var ifr=document.getElementsByName('b10f3')[0]; ifr.src=ifr.src;">Refresh</button>
                                                    <a href="#" class="btn btn-default" role="button" target="_blank">No Video Feed</a>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-scale pull-right  top text-color">
                                                            <li><a href="../TankPages/b10f3.php">Detailed View</a></li>
                                                            <li><a href="../FilePages/b10f3files.php">Files</a></li>
                                                            <li class="b-b b m-v-sm"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="card-body">
                                                <div class="p-md">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        <div class="outer-wrap-main">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe name="b10f3" class="iframe-scale-main" src="http://162.87.125.214/"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--End of Card 3.4 & Column 3-->                              
                            
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
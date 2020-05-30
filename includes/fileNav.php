<?php
  $b_name_file = basename($_SERVER['SCRIPT_FILENAME']);
  $b_name_arr  = explode(".",$b_name_file);
  $b_name      = $b_name_arr[0];
?>
<!-- aside -->
<aside id="aside" class="app-aside modal fade folded" role="menu">
	<iframe class="cover" src="about:blank"></iframe>
    <div class="left">
        <div class="box bg-white">
            <div class="navbar md-whiteframe-z1 no-radius blue">              
                <a class="navbar-brand">             
                    <span class="hidden-folded m-l inline">Trumbull, CT</span>
                </a>                   
            </div>
            
            <div class="box-row">
                <div class="box-cell scrollable hover">
                    <div class="box-inner">
                        <div class="p hidden-folded blue-50" style="background-image:url(../images/Ubg.png); min-height: 150px; background-size:cover"></div>
                        <div id="nav">
                            <nav ui-nav>
                                <ul class="nav">
                                <iframe class="cover" src="about:blank"></iframe>
                                    <li class="nav-header m-v-sm hidden-folded"> MAIN MENU</li>
                                    <li   <?php if($b_name=="b10f3" ||
															$b_name=="b10f2" ||  
															$b_name=="tank4a" ||
															$b_name=="tank10" ||
															$b_name=="tank13" ||
															$b_name=="tank15" ||
															$b_name=="tank16" ||
															$b_name=="tank18" ||
															$b_name=="SB11"   ||
															$b_name=="SB11"   ||
															$b_name=="sono05" ||
															$b_name=="sono08"  
														   ){ ?> class="active" <?php } ?>>
                                        <a md-ink-ripple href>
                                            <span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                            <i class="icon mdi-action-trending-up i-20"></i>
                                            <span>Batch Testing</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li><a md-ink-ripple href="../home/index.php">View All</a></li>
                                            <li  <?php if($b_name=="b10f3" ||
															$b_name=="b10f2" ||  
															$b_name=="tank4a" ||
															$b_name=="tank10" ||
															$b_name=="tank13" ||
															$b_name=="tank15" ||
															$b_name=="tank16" ||
															$b_name=="tank18" ||
															$b_name=="SB11"   ||
															$b_name=="SB11"   ||
															$b_name=="sono05" ||
															$b_name=="sono08"  
														   ){ ?> class="active" <?php } ?>>
                                                <a md-ink-ripple href>
                                                    <span class="pull-right text-muted">
                                                        <i class="fa fa-caret-down"></i>
                                                    </span>
                                                    <span class="font-normal">Department</span>
                                                </a>
                                                <ul class="nav nav-sub">                       
                                                <li <?php if($b_name=="b10f3" ||
															$b_name=="b10f2" ||  
															$b_name=="tank4a" ||
															$b_name=="tank10" ||
															$b_name=="tank13" ||
															$b_name=="tank15" ||
															$b_name=="tank16" ||
															$b_name=="tank18" ||
															$b_name=="SB11"   ||
															$b_name=="SB11"   ||
															$b_name=="sono05" ||
															$b_name=="sono08"  
														   ){ ?> class="active" <?php } ?>>
                                                    <a md-ink-ripple href>
                                                        <span class="pull-right text-muted">
                                                            <i class="fa fa-caret-down"></i>
                                                        </span>
                                                        <span class="font-normal">Main Plant</span>
                                                    </a>
                                                    <ul class="nav nav-sub">
                                                        <li  <?php if($b_name=="b10f3"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/b10f3.php">BSM3</a>
                                                        </li>
                                                        <li  <?php if($b_name=="b10f2"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/b10f2.php">BSM5</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank4a"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank4a.php">Tank 4A</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank10"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank10.php">Tank 10</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank13"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank13.php">Tank 13</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank15"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank15.php">Tank 15</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank16"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank16.php">Tank 16</a>
                                                        </li>
                                                        <li  <?php if($b_name=="tank18"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/tank18.php">Tank 18</a>
                                                        </li>
                                                        <li  <?php if($b_name=="SB11"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/SB11.php">SB 11</a>
                                                        </li>
                                                        <li  <?php if($b_name=="sono05"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/sono05.php">SONO 05</a>
                                                        </li>
                                                        <li  <?php if($b_name=="sono08"){ ?> class="active" <?php } ?>>
                                                            <a md-ink-ripple href="../TankPages/sono08.php">SONO 08</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li   <?php if($b_name=="deo"){ ?> class="active" <?php } ?>>
                                                    <a md-ink-ripple href="../TankPages/deo.php">Deo Lab</a>
                                                </li>
                                                <li  <?php if($b_name=="defi"){ ?> class="active" <?php } ?>>
                                                    <a md-ink-ripple href="../TankPages/defi.php">DEFI</a>
                                                </li>
                                                    
                                                </ul>          
                                                </li>        
                                            </ul>
                                    </li>
                                    <li>
                                        <a md-ink-ripple href="http://162.87.125.101" target="_blank">
                                            <i class="icon mdi-hardware-phonelink i-20"></i>
                                            <span class="font-normal">View NVR</span>
                                        </a>
                                    </li>
                                    <li  <?php if($b_name=="4afiles" ||
													$b_name=="10files" ||  
													$b_name=="13files" ||
													$b_name=="15files" ||
													$b_name=="16files" ||
													$b_name=="18files" ||
													$b_name=="deofiles" ||
													$b_name=="defifiles" ||
													$b_name=="sb11files" ||
													$b_name=="s05files" ||
													$b_name=="s08files" ||
													$b_name=="co-op352" ||
													$b_name=="lab120" || 
													$b_name=="lab164a" || 
													$b_name=="skincareGD" 
												   ){ ?> class="active" <?php } ?>>
                                        <a md-ink-ripple href="#">
                                            <span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                            <i class="icon mdi-file-cloud-queue i-20"></i>
                                            <span>File Sharing</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <li <?php if($b_name=="4afiles" ||
															$b_name=="10files" ||  
															$b_name=="13files" ||
															$b_name=="15files" ||
															$b_name=="16files" ||
															$b_name=="18files" ||
															$b_name=="deofiles" ||
															$b_name=="defifiles" ||
															$b_name=="sb11files" 
														   ){ ?> class="active" <?php } ?>>
                                                <a md-ink-ripple href>
                                                    <span class="pull-right text-muted">
                                                        <i class="fa fa-caret-down"></i>
                                                    </span>
                                                    <span class="font-normal">Tank</span>
                                                </a>
                                                <ul class="nav nav-sub">
                                                    <li  <?php if($b_name=="4afiles"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/4afiles.php">Tank 4A</a>
                                                    </li>
                                                    <li  <?php if($b_name=="10files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/10files.php">Tank 10</a>
                                                    </li>
                                                    <li  <?php if($b_name=="13files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/13files.php">Tank 13</a>
                                                    </li>
                                                    <li  <?php if($b_name=="15files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/15files.php">Tank 15</a>
                                                    </li>
                                                    <li  <?php if($b_name=="16files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/16files.php">Tank 16</a>
                                                    </li>
                                                    <li  <?php if($b_name=="18files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/18files.php">Tank 18</a>
                                                    </li>
                                                    <li  <?php if($b_name=="deofiles"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/deofiles.php">DEO Tanks</a>
                                                    </li>    
                                                    <li  <?php if($b_name=="defifiles"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/defifiles.php">DEFI Reactor</a>
                                                    </li>                         
                                                    <li  <?php if($b_name=="sb11files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/sb11files.php">SB 11</a>
                                                    </li>
                                                </ul>          
                                            </li>  
                                            <li  <?php if($b_name=="s05files" ||
															$b_name=="s08files" 
														   ){ ?> class="active" <?php } ?>>                      
                                                <a md-ink-ripple href>
                                                    <span class="pull-right text-muted">
                                                        <i class="fa fa-caret-down"></i>
                                                    </span>
                                                    <span class="font-normal">Sonolator</span>
                                                </a>
                                                <ul class="nav nav-sub">
                                                    <li  <?php if($b_name=="s05files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/s05files.php">Sono 05</a>
                                                    </li>
                                                    <li  <?php if($b_name=="s08files"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../FilePages/s08files.php">Sono 08</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li <?php if($b_name=="CO-OP352" ||
															$b_name=="Lab120" || 
															$b_name=="Lab164a" || 
															$b_name=="skincareGD"
														   ){ ?> class="active" <?php } ?>>
                                                <a md-ink-ripple href>
                                                     <span class="pull-right text-muted">
                                                        <i class="fa fa-caret-down"></i>
                                                    </span>
                                                    <span class="font-normal">Rheometer Data</span>
                                                </a>
                                                 <ul class="nav nav-sub">
                                                    <li  <?php if($b_name=="CO-OP352"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../Rheometer/CO-OP352.php">CO-OP 352</a>
                                                    </li>
                                                    <li  <?php if($b_name=="Lab120"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../Rheometer/Lab120.php">Lab 120</a>
                                                    </li>
                                                    <li  <?php if($b_name=="Lab164a"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../Rheometer/Lab164a.php">Lab 164a</a>
                                                    </li>
                                                    <li  <?php if($b_name=="skincareGD"){ ?> class="active" <?php } ?>>
                                                        <a md-ink-ripple href="../Rheometer/skincareGD.php">Skincare G.D.</a>
                                                    </li>
                                                </ul>            
                                            </li>             
                                        </ul>
                                    </li>
                                    <li>
                                        <a md-ink-ripple href="http://162.85.29.231/Data/TR_InvMgmt.nsf/">
                                            <i class="icon mdi-content-content-paste i-20"></i>
                                            <span class="font-normal">Batch Cards</span>
                                        </a>
                                    </li>  
                                    <li class="b-b b m-v-sm"></li>
                                    <li>
                                        <a md-ink-ripple href="../CountrySelect.php">
                                            <span>Change Location</span>
                                        </a>
                                    </li>                                                        
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="nav b-t b">
                <iframe class="cover" src="about:blank"></iframe>
                    <li>
                        <a href="#" target="_blank" md-ink-ripple>
                            <i class="icon mdi-action-help i-20"></i>
                            <span>Help &amp; Feedback</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
<!-- / aside -->                       
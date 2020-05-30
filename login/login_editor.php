
<?php
  include("../includes/login_header.php");
?>
  
<?php
    
   if(isset($_REQUEST['email']))
   {
	  $email = $_REQUEST['email'];  
   }
   else if(isset($_COOKIE['email']))
   {
	  $email = $_COOKIE['email'];  
   } 
   
   if(isset($_REQUEST['password']))
   {
	  $password = $_REQUEST['password'];  
   }
   else if(isset($_COOKIE['password']))
   {
	  $password = $_COOKIE['password'];  
   }
?>

  

  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
        <!--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                width: 24px; height: 24px;">
          <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
          <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
          <path d="M 8 80 L 50 0 L 50 100 Z" fill="#fff"></path>
          <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(255, 255, 255, 0.6)"></path>
        </svg>-->
        <!--<span class="m-l inline">Materil</span>-->
        <img src="../images/logo.png" style="width:75px;">
      </div>
    </div>

    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <div class="m-b text-sm">
        Sign in with your Unilever Account
        <?php
		  if(isset($message))
		  {
			echo '<br><span style="color:green;">';
			echo $message;  
			echo '</span>';
		  }
		?>
      </div>
      <form name="form" method="post">
        <div class="md-form-group float-label">
          <input type="email" name="email" value="<?=$email?>" class="md-input" ng-model="user.email" required>
          <label>Email</label>
        </div>
        <div class="md-form-group float-label">
          <input type="password" name="password" value="<?=$password?>" class="md-input" ng-model="user.password" required>
          <label>Password</label>
        </div>      
        <div class="m-b-md">        
          <label class="md-check">
            <input type="checkbox"  name="cookie_signin" ><i class="indigo"></i> Keep me signed in
          </label>
        </div>
        <input type="hidden" name="cmd" value="login">
        <button md-ink-ripple type="submit" class="md-btn md-raised pink btn-block p-h-md">Sign in</button>
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div class="m-b"><button ui-sref="access.forgot-password" class="md-btn" onClick="window.location.href='index.php?cmd=forget_editor';">Forgot password?</button></div>
      <div>Do not have an account? <button ui-sref="access.signup" class="md-btn" onClick="window.location.href='index.php?cmd=register_view';">Create an account</button></div>
    </div>
  </div>

<?php
  include("../includes/login_footer.php");
?>


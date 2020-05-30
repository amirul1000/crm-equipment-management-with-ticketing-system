
<?php
  include("../includes/login_header.php");
?>
  
  

  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                width: 24px; height: 24px;">
          <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
          <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
          <path d="M 8 80 L 50 0 L 50 100 Z" fill="#fff"></path>
          <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(255, 255, 255, 0.6)"></path>
        </svg>
        <span class="m-l inline">Materil</span>
      </div>
    </div>

    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <div class="m-b text-sm">
        Sign up to your Materil Account
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
        <div class="md-form-group">
          <input type="text"  name="first_name" value="<?=$_REQUEST['first_name']?>" class="md-input" ng-model="user.first_name" required>
          <label>First Name</label>
        </div>
        <div class="md-form-group">
          <input type="text" name="last_name" value="<?=$_REQUEST['last_name']?>" class="md-input" ng-model="user.last_name" required>
          <label>Last Name</label>
        </div>
        <div class="md-form-group">
          <input type="email" name="email" value="<?=$_REQUEST['email']?>" class="md-input" ng-model="user.email" required>
          <label>Email</label>
        </div>
        <div class="md-form-group">
          <input type="password" name="password" value="<?=$_REQUEST['password']?>" class="md-input" ng-model="user.password" required>
          <label>Password</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input type="checkbox" ng-model="agree" required><i class="indigo"></i> Agree the <a href>terms and policy</a>
          </label>
        </div>
        <input type="hidden" name="cmd" value="register">
        <button md-ink-ripple type="submit" class="md-btn md-raised pink btn-block p-h-md">Sign up</button>
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div>Already have an account? <button ui-sref="access.signin" class="md-btn"  onClick="window.location.href='index.php';">Sign in</button></div>
    </div>
  </div>

<?php
  include("../includes/login_footer.php");
?>




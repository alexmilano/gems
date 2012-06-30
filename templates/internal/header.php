<div class="topbar-wrapper" style="z-index: 5;">
	<div class="topbar" data-dropdown="dropdown">
	  <div class="topbar-inner">
	    <div class="container">
	      <h3><a href="#">Canis example</a></h3>
	      <ul class="nav secondary-nav">
	        <li class="active"><a href="<?php echo $GLOBALS["baseURL"]; ?>">Home</a></li>
	        <li><a href="#">Sign In</a></li>
	        <?php if($_SESSION['user']->roleName=='invalid') { ?>
	        <li><a href="<?php echo $GLOBALS["baseURL"]; ?>login">Log In</a></li>
	        <?php }else{ ?>
	        <li><a href="<?php echo $GLOBALS["baseURL"]; ?>crud.php?close_session">Log Out</a></li>
	        <?php } ?>
	      </ul>
	    </div>
	  </div><!-- /topbar-inner -->
	</div>
</div>
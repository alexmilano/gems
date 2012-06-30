
<!--
Below goes all the head import definitions before
start rendering de content view.
-->
<?php if(isset($_REQUEST['view'])) { ?>

  <title>GEMS</title>

  <?php if($_REQUEST['view']==$GLOBALS["LOGIN_VIEW"] || $_REQUEST['view']==$GLOBALS["SIGNUP_VIEW"] || $_REQUEST['view']==$GLOBALS["CHANGE_PASSWORD_VIEW"]){ ?>
  	<script type="text/javascript" src="js/sha1.js"></script>
  <?php } ?>
<?php } ?>
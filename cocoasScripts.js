<script type="text/javascript" src="<?php echo $GLOBALS["baseURL"]; ?>js/form.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS["baseURL"]; ?>js/canis.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS["baseURL"]; ?>js/bootstrap-dropdown.js"></script>
<?php
  if(isset($_REQUEST['view'])){
          if(isset($scripts[$_REQUEST['view']]))
          echo '<script type="text/javascript" src="'.$GLOBALS["baseURL"].'js/'.$scripts[$_REQUEST['view']].'"></script>';
  }else if(isset($_REQUEST['panel'])){
          if(isset($scripts[$_REQUEST['panel']]))
          echo '<script type="text/javascript" src="'.$GLOBALS["baseURL"].'js/'.$scripts[$_REQUEST['panel']].'"></script>';
  }
?>

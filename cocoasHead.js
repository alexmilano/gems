<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS["baseURL"];?>css/bootstrap/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS["baseURL"];?>css/default.css">
<script type="text/javascript" src="<?php echo $GLOBALS["baseURL"]; ?>js/jquery.js"></script>
<?php
  if(isset($_REQUEST['view'])){
          if(isset($styles[$_REQUEST['view']]))
          echo '<link href="'.$GLOBALS["baseURL"].'css/'.$styles[$_REQUEST['view']].'" rel="stylesheet/less" type="text/css" media="screen" />';
  }else if(isset($_REQUEST['panel'])){
          if(isset($styles[$_REQUEST['panel']]))
          echo '<link href="'.$GLOBALS["baseURL"].'css/'.$styles[$_REQUEST['panel']].'" rel="stylesheet/less" type="text/css" media="screen" />';
  }
?>
<link rel="shortcut icon" href="http://www.canis-framework.com/favicon.ico">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="<?php echo $GLOBALS["keywords"]; ?>" >
<meta name="Language" content="<?php echo $GLOBALS["language"]; ?>" >

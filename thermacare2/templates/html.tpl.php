<!DOCTYPE html>
<head>
<?php
//    $themepath = 'https://thermacare4.pfizer.edrupalgardens.com/sites/g/files/g10021546/themes/site/thermacare/';
    $themepath = '/'.$directory.'/';
?>

<?php $ver='?a79'; ?>

<?php print $head; ?>
<?php
//    render($page['content']['metatags']); 
?>

<meta name="viewport" content="width=360, initial-scale=1.0, user-scalable=yes">
<link href="<?=$themepath?>css/style.css<?=$ver?>" rel="stylesheet" type="text/css"/>
<link href="<?=$themepath?>css/jquery.mCustomScrollbar.css<?=$ver?>" rel="stylesheet" type="text/css"/>


 <!--A79-->
<script type="text/javascript" src="<?=$themepath?>js/jquery-1.11.2.min.js<?=$ver?>"></script>
<script type="text/javascript" src="<?=$themepath?>js/jquery.mCustomScrollbar.concat.min.js<?=$ver?>"></script>
<script src="<?=$themepath?>js/jquery.tools.min.js<?=$ver?>"></script>
<script src="<?=$themepath?>js/main.js<?=$ver?>"></script>

<title><?php print $is_front ? 'ТермаКэр | Аппликаторы разогревающие для спины, для шеи, плеча и запястья' : $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

</body>
</html>
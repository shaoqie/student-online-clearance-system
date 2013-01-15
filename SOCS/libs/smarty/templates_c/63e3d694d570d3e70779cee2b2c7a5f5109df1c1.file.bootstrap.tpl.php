<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:20
         compiled from "C:\wamp\www\SOCS\views\templates\bootstrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1392550f38c53773de3-38570273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63e3d694d570d3e70779cee2b2c7a5f5109df1c1' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\templates\\bootstrap.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1392550f38c53773de3-38570273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38c538a76e9_30978171',
  'variables' => 
  array (
    'page_name' => 0,
    'host' => 0,
    'username' => 0,
    'surname' => 0,
    'firstname' => 0,
    'middlename' => 0,
    'account_type' => 0,
    'assign_sign' => 0,
    'alert' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38c538a76e9_30978171')) {function content_50f38c538a76e9_30978171($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $_smarty_tpl->tpl_vars['page_name']->value;?>
 - Student Online Clearance System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/css/bootstrap.min.css">
        
            <style>
                body {
                    padding-top: 60px;
                    padding-bottom: 40px;
                }
            </style>
        
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/css/main.css">

        <script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/logo.png"> Student Online Clearance System</a>
                    <div class="nav-collapse collapse">

                        <?php if (isset($_smarty_tpl->tpl_vars['username']->value)){?>
                            <div class="btn-group pull-right">
                                <button class="btn " onclick="window.location.href='index.php'"><i class="icon-user"></i> <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</button>
                                <button class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/settings.php"><i class="icon-wrench"></i> My Account</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/index.php?action=logout"><i class="icon-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        <?php }elseif(!isset($_GET['action'])&&!isset($_smarty_tpl->tpl_vars['username']->value)){?>
                            <form class="navbar-form pull-right" action="index.php?action=login" method="post">
                                <input class="span2" type="text" placeholder="Username" name="username">
                                <input class="span2" type="password" placeholder="Password" name="password">
                                <button type="submit" class="btn"><i class="icon-check"></i> Sign in</button>
                            </form>
                        <?php }?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">

            <?php if (isset($_smarty_tpl->tpl_vars['username']->value)){?>
                <div class="row">
                    <div class="span1"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/default.png" class="img-polaroid" /></div>
                    <div class="span5">
                        <h4><?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['middlename']->value;?>
</h4>
                        <h5>- <?php echo $_smarty_tpl->tpl_vars['account_type']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['assign_sign']->value;?>
</h5>
                    </div>
                </div>
                <hr>
            <?php }?>

            <?php echo $_smarty_tpl->tpl_vars['alert']->value;?>


            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <hr>

            <footer>
                <p class="pull-right">&copy; Student Online Clearance System 2012</p>
            </footer>

        </div> <!-- /container -->

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>-->

        <script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/js/vendor/jquery-1.8.3.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/js/main.js"></script>

        
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
        
    </body>
</html>
<?php }} ?>
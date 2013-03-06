<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{$page_name} - Student Online Clearance System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{$host}/public/css/bootstrap.css">
        <link rel="stylesheet" href="{$host}/public/css/font-awesome.css">
        <link rel="stylesheet" href="{$host}/public/css/font-awesome-ext.css">
        <link rel="stylesheet" href="{$host}/public/css/bootstrap-fileupload.css">
        <link rel="stylesheet" href="{$host}/public/select2/select2.css">
        <link rel="stylesheet" href="{$host}/public/socs-icons/socs-icons.css">

        {literal}
            <style>
                body {{/literal}
                    padding-top: 45px;
                    padding-bottom: 40px;                    
                    background-image: url('{$host}/public/img/background.png');
                    background-attachment: fixed;
                    background-position: top;
                    background-repeat: repeat-x;
                }{literal}

                #header{{/literal}
                    background-image: url('{$host}/public/img/header.png');
                    background-position: right;
                    background-repeat: no-repeat;
                }{literal}

                #welcome{{/literal}
                    background: url('{$host}/public/img/title.png');
                    background-position: bottom right;
                    background-repeat: no-repeat;
                }{literal}

                /*
                div{
                border: 1px #000 solid;
                }*/
            </style>
        {/literal}
        <link rel="stylesheet" href="{$host}/public/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="{$host}/public/css/main.css">

        <script src="{$host}/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="{$host}/public/js/calendarview.js"></script>
        <script src="{$host}/public/js/prototype.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        {include file='UIsections.tpl'}

        <div class="navbar navbar-inverse navbar-fixed-top" id="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php"><img src="{$host}/public/img/logo.png"> SOCS</a>
                    <div class="nav-collapse collapse">

                        {if isset($username)}
                            <div class="btn-group pull-right">
                                <button class="btn btn-inverse" onclick="window.location.href = 'index.php';">
                                    <i class="icon-user icon-white"></i> {$username}
                                </button>
                                <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{$host}/settings.php"><i class="icon-wrench"></i> My Account</a>
                                    </li>
                                    <li>
                                        <a href="{$host}/index.php?action=logout"><i class="icon-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>

                        {elseif isset($smarty.get.action) && !isset($username)}

                            {call name=welcome_navigations}

                            {if $smarty.get.action == "student_registrationForm"}
                                <form class="navbar-form pull-right" action="index.php?action=login" method="post">
                                    <input class="span2" type="text" placeholder="Username" name="username" required>
                                    <input class="span2" type="password" placeholder="Password" name="password" required>
                                    <button type="submit" class="btn"><i class="icon-check"></i> Sign in</button>
                                </form>
                            {/if}

                        {else}
                            {call name=welcome_navigations}

                            <form class="navbar-form pull-right" action="index.php?action=login" method="post">
                                <input class="span2" type="text" placeholder="Username" name="username" required>
                                <input class="span2" type="password" placeholder="Password" name="password" required>
                                <button type="submit" class="btn"><i class="icon-check"></i> Sign in</button>
                            </form>
                        {/if}

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        {if isset($username)}
            <div id="header" class="container socs-content">
                <div class="row">
                    <div class="span1">

                        {if isset($photo)}
                            <img src="{$photo}" class="img-polaroid"/>
                        {else}
                            <img src="{$host}/photos/default.png" class="img-polaroid"/>
                        {/if}

                    </div>
                    <div class="span5">
                        <h4>{$surname}, {$firstname} {$middlename}.</h4>
                        <h5>- {$account_type} {$assign_sign}</h5>
                    </div>
                </div>
            </div>
        {/if}

        <div class="container socs-content">

            {$alert}

            {include file=$content}

            <hr>

            <footer>
                <p>&copy; Student Online Clearance System 2012</p>
            </footer>

        </div>

        {call name=upload_excel}
        {call name="replace_dept_signatory"}
        {call name="add_dept_signatory"}

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="{$host}/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>-->

        <script src="{$host}/public/js/vendor/jquery-1.8.3.min.js"></script>
        <script src="{$host}/public/js/vendor/bootstrap.min.js"></script>
        <script src="{$host}/public/js/vendor/bootbox.min.js"></script>
        <script src="{$host}/public/js/vendor/bootstrap-fileupload.js"></script>
        <script src="{$host}/public/js/vendor/bootstrap-progressbar.js"></script>
        <script src="{$host}/public/select2/select2.js"></script>
        <script src="{$host}/public/js/main.js"></script>

        {literal}
            <script type="text/javascript">
                
                function set_input(id){
                    $("#hidden_input").html("<input type='hidden' name='oldSign_ID' value='" + id + "'>");
                }
                
                $(document).ready(function() {
                    
                    $('.tips').tooltip();

                    $('#clearance_status').progressbar({
                        display_text: 1
                    });

                    $('.select2').select2();
                        
                });
            </script>
        {/literal}

        {*
        {literal}
        <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        {/literal}
        *}

    </body>
</html>

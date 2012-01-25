<?php
$host_name = end(explode("/", $_SERVER['PHP_SELF']));
$configs   = array(
    "index.php"     => "home",
    "config.php"    => "downloads",
    "generate.php"  => "news");
$body = $configs[$host_name];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="shortcut icon" href="http://static.codeigniter.com/design/favicon.ico" type="image/x-icon" />
        <link rel="home" href="http://codeigniter.com/" title="Home" />
        <meta name="MSSmartTagsPreventParsing" content="true" />
        <meta http-equiv='expires' content='-1' />
        <meta http-equiv='pragma' content='no-cache' />
        <meta name='robots' content='all' />

        <meta name='description' content='CodeIgniter: an open source Web Application Framework that helps you write PHP programs' />
        <meta name="keywords" content="EllisLab CodeIgniter PHP CMS Content Management System software framework " />

        <link rel="stylesheet" href="http://codeigniter.com/?css=global/styles.css.v.1321051301" type="text/css" media="screen, projection" charset="utf-8" />
        <link rel="stylesheet" href="http://codeigniter.com/?css=global/sIFR-screen.css.v.1316241003" type="text/css" media="screen, projection" charset="utf-8" />
        <link rel="stylesheet" href="http://codeigniter.com/?css=global/sIFR-print.css.v.1316241003" type="text/css" media="print" charset="utf-8" />

        <link rel="alternate" type="application/atom+xml" title="Master Atom feed" href="http://codeigniter.com/feeds/atom/full/" />
        <link rel="alternate" type="application/rss+xml" title="Master RSS feed" href="http://codeigniter.com/feeds/rss/full/" />

        <title>CodeIgniter - Open source PHP web application framework</title>

        <!-- Reverse Links from EllisLab network sites -->		
        <link rev="expressionengine" href="http://expressionengine.com/"
              title="The most flexible publishing system you'll ever meet" />

        <link rev="pmachinepro" href="http://pmachinepro.com/"
              title="Flexible and free blogging system that supports advanced features like multiple blogs, moblogging, and much more" />

        <link rev="ellislab" href="http://ellislab.com/"
              title="Where ideas hatch!" />

        <link rev="enginehosting" href="http://enginehosting.com/"
              title="High performance web hosting" />

        <link rel="shortcut icon" href="/images/design/favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
        <!-- PNG FIX for IE6 -->
        <!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
        <!--[if lte IE 6]>
            <script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-darkness/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="css/css.css" type="text/css" media="print" charset="utf-8" />        
    </head>

    <body id="<?=$body?>" style="margin: 0px; padding: 0px; width: 100%">

        <!-- Panel -->
        <div id="toppanel">
            <div id="panel">
                <div class="content clearfix">

                    <div class="left">
                        <!-- Login Form -->
                        <form class="clearfix" action="#" method="post">
                            <h1>Member Login</h1>
                            <label class="grey" for="log">Username:</label>
                            <input class="field" type="text" name="log" id="log" value="" size="23" />
                            <label class="grey" for="pwd">Password:</label>
                            <input class="field" type="password" name="pwd" id="pwd" size="23" />
                            <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
                            <div class="clear"></div>
                            <input type="submit" name="submit" value="Login" class="bt_login" />
                            <a class="lost-pwd" href="#">Lost your password?</a>
                        </form>
                    </div>
                    <div class="left">
                        <!-- Login Form -->
                    </div>
                    <div class="left right">			
                        <!-- Register Form -->
                    </div>
                </div>
        </div> <!-- /login -->	

        <!-- The tab on top -->	
        <div class="tab">
            <ul class="login">
                <li class="left">&nbsp;</li>
                <li>Generator</li>
                <li class="sep">|</li>
                <li id="toggle">
                    <a id="open" class="open" href="#">Menu</a>
                    <a id="close" style="display: none;" class="close" href="#">Fechar</a>
                </li>
                <li class="right">&nbsp;</li>
            </ul> 
        </div> <!-- / top -->
    </div> <!--panel -->
    
        <div style="width: 925px; margin: auto; padding-top: 15px">
        
        <div id="header" style="width: 500px">
            <h1><a href="/" title="CodeIgniter"><img src="http://static.codeigniter.com/design/ci_logo2.gif" alt="CodeIgniter" width="170" height="73" /></a></h1>
        </div>


        <div id="siteNav">
            <ul>
                <li id="homenav"><a href="index.php">Home</a></li>
                <li id="downloadsnav"><a href="config.php">Configuracoes</a></li>
                <li id="newsnav"><a href="generate.php">Gerar Codigo</a></li>
            </ul>
            <div class="clear"></div>
        </div>

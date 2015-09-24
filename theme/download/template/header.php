<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title><?=$config->dbconfig->title;?></title>
    <link href="<?=$config->theme->url;?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="<?=$config->theme->url;?>/js/jquery-1.11.1.min.js"></script>
    <!-- Custom Theme files -->
    <link href="<?=$config->theme->url;?>/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <!-- start menu -->
    <link href="<?=$config->theme->url;?>/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?=$config->theme->url;?>/js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="<?=$config->theme->url;?>/js/menu_jquery.js"></script>
    <script src="<?=$config->theme->url;?>/js/simpleCart.min.js"> </script>
</head>
<body>
<!-- header_top -->
<div class="top_bg">
    <div class="container">
        <div class="header_top">
            <div class="top_right">
                <ul>
                    <li><a href="#"><?=lang('header.help')?></a></li>|
                    <li><a href="contact.html"><?=lang('header.contact')?></a></li>|
                    <li><a href="#"><?=lang('header.deliveryinfo')?></a></li>|
                    <li><a href="&lang=en"><img src="<?=$config->theme->url;?>/images/language/us.png" /></a></li>
                    <li><a href="&lang=nl"><img src="<?=$config->theme->url;?>/images/language/nl.png" /></a></li>
                </ul>
            </div>
            <div class="top_left">
                <h2><span></span><?=lang('header.callus', array('phonenumber' => $config->dbconfig->phone))?></h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- header -->
<div class="header_bg">
    <div class="container">
        <div class="header">
            <div class="head-t">
                <div class="logo">
                    <a href="<?=$config->path->basepath;?>/home/"><img src="<?=$config->theme->url;?>/images/pc4u.png" class="img-responsive" alt=""/> </a>
                </div>
                <!-- start header_right -->
                <div class="header_right">
                    <div class="rgt-bottom">
                        <div class="log">
                            <div class="login" >
                                        <?php
                                        if($_SESSION['login_status'] != 1)
                                        {

                                        if(isset($_POST['lb_login'])) {


                                            $lb_result = $account->loginUser($_POST['lb_email'], $_POST['lb_password']);

                                            // Result
                                            if($lb_result == 0){
                                                // Send to error page
                                                header('location: '.$config->path->basepath.'/account/register/&error=1');
                                            } else if($lb_result == 1){
                                                // Send to home page
                                                header('location: '.$config->path->basepath.'/home/');
                                            }

                                        } else {
                                            // Set post
                                            $_POST['lb_email'] = '';
                                            $_POST['lb_password'] = '';
                                        }

                                        ?>
                                            <div id="loginContainer"><a href="#" id="loginButton"><span><?= lang('login.login') ?></span></a>

                                                <div id="loginBox">
                                                    <form id="loginForm" method="post">
                                                        <fieldset id="body">
                                                            <fieldset>
                                                                <label for="email"><?=lang('login.email')?></label>
                                                                <input type="text" name="lb_email" id="email" value="<?=$_POST['lb_email'];?>" required>
                                                            </fieldset>
                                                            <fieldset>
                                                                <label for="password"><?=lang('login.password')?></label>
                                                                <input type="password" name="lb_password" id="password" value="<?=$_POST['lb_password'];?>" required>
                                                            </fieldset>
                                                            <input type="submit" name="lb_login" id="login" value="<?=lang('login.signin')?>">
                                                            <label for="checkbox"><input type="checkbox" id="checkbox"> <i><?=lang('login.remember')?></i></label>
                                                        </fieldset>
                                                        <span><a href="#"><?=lang('login.forgot')?></a></span>
                                                    </form>
                                                </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div id="accountContainer"><a href="#" ><span><?= lang('account.button') ?></span></a>
                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                            <div class="reg">
                            <?php
                            if($_SESSION['login_status'] != 1)
                            {
                            ?>
                            <a href="<?=$config->path->basepath;?>/account/register/"><?=lang('header.register')?></a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="cart box_1">
                            <a href="<?=$config->path->basepath;?>/cart/">
                                <h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> <?=lang('cart.items')?>)<img src="<?=$config->theme->url;?>/images/bag.png" alt=""></h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty"><?=lang('cart.empty')?></a></p>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="create_btn">
                            <a href="<?=$config->path->basepath;?>/cart/"><?=lang('cart.checkout')?></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="search">
                        <form>
                            <input type="text" value="" placeholder="<?=lang('header.search');?>">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <li class="active grid"><a class="color1" href="<?=$config->path->basepath;?>/home/">Home</a></li>
                <li class="grid"><a class="color2" href="#"><?=$categories->getOne('1')->name?></a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4><?=$categories->getOneSub('1')->name;?></h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4><?=$categories->getOneSub('2')->name;?></h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color4" href="#"><?=$categories->getOne('2')->name?></a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">Pools&Tees</a></li>
                                        <li><a href="women.html">shirts</a></li>
                                        <li><a href="women.html">shorts</a></li>
                                        <li><a href="women.html">twinsets</a></li>
                                        <li><a href="women.html">kurts</a></li>
                                        <li><a href="women.html">jackets</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">Handbag</a></li>
                                        <li><a href="women.html">Slingbags</a></li>
                                        <li><a href="women.html">Clutches</a></li>
                                        <li><a href="women.html">Totes</a></li>
                                        <li><a href="women.html">Wallets</a></li>
                                        <li><a href="women.html">Laptopbags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">Belts</a></li>
                                        <li><a href="women.html">Pens</a></li>
                                        <li><a href="women.html">Eyeglasses</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">Watches</a></li>
                                        <li><a href="women.html">Jewellery</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color5" href="#">SWEATER</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">Pools&Tees</a></li>
                                        <li><a href="women.html">shirts</a></li>
                                        <li><a href="women.html">shorts</a></li>
                                        <li><a href="women.html">twinsets</a></li>
                                        <li><a href="women.html">kurts</a></li>
                                        <li><a href="women.html">jackets</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">Handbag</a></li>
                                        <li><a href="women.html">Slingbags</a></li>
                                        <li><a href="women.html">Clutches</a></li>
                                        <li><a href="women.html">Totes</a></li>
                                        <li><a href="women.html">Wallets</a></li>
                                        <li><a href="women.html">Laptopbags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">Belts</a></li>
                                        <li><a href="women.html">Pens</a></li>
                                        <li><a href="women.html">Eyeglasses</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">Watches</a></li>
                                        <li><a href="women.html">Jewellery</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color6" href="#">SHOES</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">Pools&Tees</a></li>
                                        <li><a href="women.html">shirts</a></li>
                                        <li><a href="women.html">shorts</a></li>
                                        <li><a href="women.html">twinsets</a></li>
                                        <li><a href="women.html">kurts</a></li>
                                        <li><a href="women.html">jackets</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">Handbag</a></li>
                                        <li><a href="women.html">Slingbags</a></li>
                                        <li><a href="women.html">Clutches</a></li>
                                        <li><a href="women.html">Totes</a></li>
                                        <li><a href="women.html">Wallets</a></li>
                                        <li><a href="women.html">Laptopbags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">Belts</a></li>
                                        <li><a href="women.html">Pens</a></li>
                                        <li><a href="women.html">Eyeglasses</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">Watches</a></li>
                                        <li><a href="women.html">Jewellery</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>

                <li><a class="color7" href="#">GLASSES</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">Pools&Tees</a></li>
                                        <li><a href="women.html">shirts</a></li>
                                        <li><a href="women.html">shorts</a></li>
                                        <li><a href="women.html">twinsets</a></li>
                                        <li><a href="women.html">kurts</a></li>
                                        <li><a href="women.html">jackets</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">Handbag</a></li>
                                        <li><a href="women.html">Slingbags</a></li>
                                        <li><a href="women.html">Clutches</a></li>
                                        <li><a href="women.html">Totes</a></li>
                                        <li><a href="women.html">Wallets</a></li>
                                        <li><a href="women.html">Laptopbags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">Belts</a></li>
                                        <li><a href="women.html">Pens</a></li>
                                        <li><a href="women.html">Eyeglasses</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">Watches</a></li>
                                        <li><a href="women.html">Jewellery</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>

                <li><a class="color8" href="#">T-SHIRT</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color9" href="#">WATCHES</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Clothing</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>kids</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Bags</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">login</a></li>
                                        <li><a href="register.html">create an account</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                        <li><a href="women.html">my shopping bag</a></li>
                                        <li><a href="women.html">brands</a></li>
                                        <li><a href="women.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Accessories</h4>
                                    <ul>
                                        <li><a href="women.html">trends</a></li>
                                        <li><a href="women.html">sale</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Footwear</h4>
                                    <ul>
                                        <li><a href="women.html">new arrivals</a></li>
                                        <li><a href="women.html">men</a></li>
                                        <li><a href="women.html">women</a></li>
                                        <li><a href="women.html">accessories</a></li>
                                        <li><a href="women.html">kids</a></li>
                                        <li><a href="women.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
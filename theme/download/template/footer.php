<div class="foot-top">
    <div class="container">
        <div class="col-md-6 s-c">
            <li>
                <div class="fooll">
                    <h5>follow us on</h5>
                </div>
            </li>
            <li>
                <div class="social-ic">
                    <ul>
                        <li><a href="https://www.facebook.com/PC4U-893757924006949/timeline/" target="_blank"><i class="facebok"></i></a></li>
                        <li><a href="https://twitter.com/WebShopPC4U" target="_blank"><i class="twiter"></i></a></li>
                        <li><a href="https://plus.google.com/u/1/117899834677889755759/about" target="_blank"><i class="goog"></i></a></li>
                        <li><a href="#" target="_blank"><i class="be"> </i></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </li>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 s-c">
            <div class="stay">
                <div class="stay-left">
                    <form>
                        <input type="text" placeholder="<?=lang('footer.newsletter.placeholder');?>" required="">
                    </form>
                </div>
                <div class="btn-1">
                    <form>
                        <input type="submit" value="<?=lang('footer.newsletter.join');?>">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="col-md-3 cust">
            <h4><?=lang('footer.care.title');?></h4>
            <li><a href="#"><?=lang('footer.care.help');?></a></li>
            <li><a href="#"><?=lang('footer.care.FAQ');?></a></li>
            <li><a href="buy.html"><?=lang('footer.care.payment');?></a></li>
            <li><a href="#"><?=lang('footer.care.delivery');?></a></li>
        </div>
        <div class="col-md-2 abt">
            <h4><?=lang('footer.about.title');?></h4>
            <li><a href="#"><?=lang('footer.about.history');?></a></li>
            <li><a href="#"><?=lang('footer.about.career');?></a></li>
        </div>
        <div class="col-md-2 myac">
            <h4><?=lang('footer.account.title');?></h4>
            <?php if(isset($_SESSION['login.id'])){?>
                <li><a href="#"><?=lang('footer.account.history');?></a></li>
            <?php } else { ?>
                <li><a href="<?=$config->path->basepath;?>/account/register/"><?=lang('footer.account.register');?></a></li>
                <li><a href="<?=$config->path->basepath;?>/account/register/"><?=lang('footer.account.login');?></a></li>
            <?php } ?>
            <li><a href="#"><?=lang('footer.account.cart');?></a></li>


        </div>
        <div class="col-md-5 our-st">
            <div class="our-left">
                <h4><?=lang('footer.info');?></h4>
            </div>
            <div class="clearfix"> </div>
            <li><i class="add"> </i><?=$config->dbconfig->adress.' '.$config->dbconfig->adress_number.' '.$config->dbconfig->zipcode.' '.$config->dbconfig->city;?></li>
            <li><i class="phone"> </i><?=$config->dbconfig->phone;?></li>
            <li><a href="mailto:info@example.com"><i class="mail"> </i><?=$config->dbconfig->email;?> </a></li>

        </div>
        <div class="clearfix"> </div>
        <p>Copyright &copy; 2015 <?=$config->dbconfig->title;?> - <?=lang('footer.template');?></p>
    </div>
</div>
</body>
</html>
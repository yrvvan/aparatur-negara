<div class="header-navigation pull-right font-transform-inherit">
    <ul>
        <?php foreach ($menu as $mn) { ?>
            <li><a href="<?php echo base_url() . 'c_admin/' . $mn->url_menu; ?>"><?php echo $mn->nm_menu; ?></a></li>
        <?php }; ?>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Lain-lain 

            </a>

            <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                <li><a href="page-services.html">Services</a></li>
                <li><a href="page-prices.html">Prices</a></li>
                <li><a href="page-faq.html">FAQ</a></li>
                <li><a href="page-gallery.html">Gallery</a></li>
                <li><a href="page-search-result.html">Search Result</a></li>
                <li><a href="page-404.html">404</a></li>
                <li><a href="page-500.html">500</a></li>
                <li><a href="page-login.html">Login Page</a></li>
                <li><a href="page-forgotton-password.html">Forget Password</a></li>
                <li><a href="page-reg-page.html">Signup Page</a></li>
                <li><a href="page-careers.html">Careers</a></li>
                <li><a href="page-site-map.html">Site Map</a></li>
                <li><a href="page-contacts.html">Contact</a></li>                
            </ul>
        </li>

        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
            <span class="sep"></span>
            <i class="fa fa-search search-btn"></i>
            <div class="search-box">
                <form action="#">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> 
        </li>
        <!-- END TOP SEARCH -->
    </ul>
</div>
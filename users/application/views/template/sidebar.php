
<!--Main Navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav  fixed mdb-sidenav" style="left: auto; right: 0px;display: none; background-color:rgb(10, 164, 43);">
        <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;" id="slidenav">
            <!-- Logo -->
            <div class="toppadding">
            </div>
            <!--Search Form-->
            <li>
                <form class="form-inline" role="search" style="border-top: none; margin: 0px;">
                    <div class="" style="margin: 0px; padding: 0px;">
                        <input class="form-control mr-sm-2" type="text" placeholder="جست و جو" aria-label="search" style=";" id="search-sidenav">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion" >
                    <?php foreach ($menus as $menu) : ?>
                        <li class="nav-item-cool" style="">
                            <?php if ($menu['url'] != "") : ?>
                                <a class="<?php echo $menu['classes']?>" style="text-align: right;" href="<?php echo $menu['url'];?>">
                            <?php else:?>
                                <a class="<?php echo $menu['classes']?>" style="text-align: right;">
                            <?php endif; ?>
                            <?php if ($menu['classes'] == "collapsible-header waves-effect arrow-r"):?>
                                 <i class="fa fa-plus"></i>
                            <?php endif; ?>
                                <?php echo $menu['title']; ?>
                                </a>
                            <div class="collapsible-body" >
                                <ul style="width: 100%; text-align: right; !important;">
                                     <?php foreach ($submenus as $submenu) : ?>
                                         <?php if($submenu['parent_id'] == $menu['id']):?>
                                             <li>
                                                 <a href="<?php echo $submenu['url']?>" class="waves-effect">
                                                     <?php echo $submenu['title']; ?>
                                                 </a>
                                             </li>
                                         <?php endif;?>
                                     <?PHP endforeach; ?>
                                </ul>
                            </div>
                        </li>
                    <?PHP endforeach; ?>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav " style="z-index: 2000; border-radius: 0px; background-color: #206d81;">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse" style="color: white;"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto" style="margin-top: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>" >
                    <i class="fa fa-home"></i>
                    <span class="clearfix d-none d-sm-inline-block">صفحه اصلی</span>
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">ارتباط با ما</span></a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-user"></i>
                    <span class="clearfix d-none d-sm-inline-block">
                        <?php echo $fname_lname;?>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>users/login/logout"><i class="fa fa-sign-out"></i>
                    <span class="clearfix d-none d-sm-inline-block">خروج</span>
                </a>
            </li>

        </ul>
        <div class="breadcrumb-dn mr-auto">
            <p>سامانه تنقیح قوانین</p>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>
<!--/.Double navigation-->
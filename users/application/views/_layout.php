<?php

        $this->load->view('template/header');
        $temp_menu = array(
            'menus' => "",
            'submenus' => "",
            'fname_lname' => ""
        );
        if(isset($menus))
        {
            $temp_menu['menus'] = $menus;
        }
        if(isset($submenus))
        {
            $temp_menu['submenus'] = $submenus;
        }
        if(isset($fname_lname))
        {
            $temp_menu['fname_lname'] = $fname_lname;
        }
        $this->load->view('template/sidebar',$temp_menu);
    ?>
    <!----------- container ------------>

    <!--Main Layout-->
<main  dir="ltr" id="main-content">
    <div class="container-fluid mt-5" >
        <div style="margin:auto;" id="main2" class="box">

            <?php echo $contents;?>
        </div>
    </div>
</main>
<!-- /container -->
<?php
    $this->load->view('template/footer');
?>

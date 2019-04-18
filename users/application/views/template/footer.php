
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/holder.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Holder.js for placeholder images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="<?php echo base_url();?>includes/uikit/js/uikit.min.js"></script>
<script src="<?php echo base_url();?>includes/uikit/js/uikit-icons.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>includes/MDB/js/mdb.min.js"></script>

<script src="<?php echo base_url();?>includes/material-uikit/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/material.min.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/material-kit.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/nouislider.min.js"></script>
<!--<script src="<?php /*echo base_url();*/?>includes/datepicker/datepicker.js"></script>-->


<script src="<?php echo base_url();?>includes/custom/js/NOSlideShow.js"></script>

<script type="text/javascript">

    var uploadURL =  "<?php echo base_url();?>users/upload/do_upload2";
    var addLawURL = "<?php echo base_url();?>users/employee/add_law_validate";
    var pageLoadURL = "<?php echo base_url();?>users/general/pageload/ajaxtest";
    var addUserURL ="<?php echo base_url();?>users/Admin/add_user_validate";
    var datefooter = '<?php echo date("Y-m-d", time());?>';
    var dateJS = '<?php echo date("Y-m-d", time());?>';
    var dateConvertURL = "<?php echo base_url(); ?>users/general/convert_to_jalali/";
    var showAllLawURL = '<?=base_url()?>users/general/show_law/';
    var showOneLawURL = '<?=base_url()?>users/general/show_one_law/';
    var showOneLawDetailURL = '<?=base_url()?>users/general/one_law_detail/';
    var showOnePartURL = '<?=base_url()?>users/general/show_one_part/';
    var showOneArticleURL = '<?=base_url()?>users/general/show_one_article/';
    var editOneLawURL = '<?=base_url()?>users/general/edit_one_law/';
    var deleteOneLawURL = '<?=base_url()?>users/general/delete_one_law/';
    var searchNavURL = '<?=base_url()?>users/general/search_nav/';
    var selectType = "<?php if(isset($typelaw)){echo $typelaw;}else{echo "";}?>";
</script>
<script  type="text/javascript" src="<?php echo base_url();?>includes/custom/js/my.js"></script>

<!--
@media (max-width: 575px) /*xs*/
@media (min-width: 576px) and (max-width: 767px) /*sm*/
@media (min-width: 768px) and (max-width: 991px) /*md*/
@media (min-width: 992px) and (max-width: 1199px) /*lg*/
@media (min-width: 1200px) /*xl*/
-->
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>
<script type="text/javascript">


</script>
</html>
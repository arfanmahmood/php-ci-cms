	  <?php if($page_name!='Sign In' && $page_name!='Forgot Password'){  ?>

      <hr>

      <div class="footer">
        <p>&copy; Company <?php echo date('Y'); ?></p>
      </div>
      
      <?php } ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>resources/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-typeahead.js"></script>
    <?php if($base_js!=''){ ?>
    <script src="<?php echo base_url(); ?>resources/js/<?php echo $base_js; ?>"></script>
	<?php } ?>

</body></html>
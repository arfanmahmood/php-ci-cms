{page_header}

<form class="form-signin" action="" method="post" id="frmForgotPassword">

  <h2 class="form-signin-heading">Forgot password</h2>
  
  {msg}
  
  <div class="control-group" id="userEmailAddressDiv">
    <input name="userEmail" id="userEmail" value="<?php echo $this->input->post('userEmail'); ?>" class="input-block-level" placeholder="User Email Address" type="text">
    <span class="help-inline">Please enter your email address.</span>
  </div>  
  <input name="hdnSubmit" value="1" type="hidden" />
  <button class="btn btn-large btn-primary" type="submit">Send</button>
  <a href="<?php echo base_url(); ?>" class="btn btn-large">Back</a>
</form>

{page_footer}
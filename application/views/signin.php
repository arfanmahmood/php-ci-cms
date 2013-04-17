{page_header}

<form class="form-signin" action="" method="post" id="frmSignIn">

  <h2 class="form-signin-heading">Sign in</h2>
  
  {msg}
  
  <div class="control-group" id="userNameDiv">
    <input name="userName" id="userName" value="<?php echo $this->input->post('userName'); ?>" class="input-block-level" placeholder="User Name" type="text" />
    <span class="help-inline">Please enter user name.</span>
  </div>
  <div class="control-group" id="userPassDiv">
    <input name="userPass" id="userPass" value="<?php echo $this->input->post('userPass'); ?>" class="input-block-level" placeholder="Password" type="password">
    <span class="help-inline">Please enter password.</span>
  </div>  
  <input name="hdnSubmit" value="1" type="hidden" />
  <button class="btn btn-large btn-primary" type="submit">Sign in</button>
  
</form>

<br /><center><a href="<?php echo base_url(); ?>forgot-password">Can't access your acocunt?</a></center>

{page_footer}
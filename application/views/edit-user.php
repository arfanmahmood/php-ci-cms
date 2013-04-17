{page_header}


      <h2 class="muted">Update User</h2>
      
      <ul class="breadcrumb">
        <li><a href="{base_url}dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="{base_url}users">Users</a> <span class="divider">/</span></li>
        <li class="active">Update User</li>
      </ul><br />
        
      {page_msg}
        
      <div class="row-fluid marketing controls-row">
      
        
      <form class="form-horizontal" method="post" id="frmUser" action="">
      
        <div class="control-group" id="userNameDiv">
          <label class="control-label" for="inputUserName">User Name</label>
          <div class="controls">
            <input type="text" id="inputUserName" name="inputUserName" placeholder="User Name" class="input-xxlarge" value="<?php echo $user_name; ?>" readonly="readonly" >
          </div>
        </div>
        
        <div class="control-group" id="userPassDiv">
          <label class="control-label" for="inputUserPassword">Password</label>
          <div class="controls">
            <input type="password" id="inputUserPassword" name="inputUserPassword" placeholder="Password" class="input-xxlarge"  value="<?php echo $user_pass; ?>">
            <span class="help-inline">Please enter password for this user.</span>
          </div>
        </div>
        
        <div class="control-group" id="userEmailDiv">
          <label class="control-label" for="inputUserEmail">User Email</label>
          <div class="controls">
            <input type="text" id="inputUserEmail" name="inputUserEmail" placeholder="User Email" class="input-xxlarge" value="<?php echo $user_email; ?>" readonly="readonly">
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="inputActive">Active</label>
          
          <div class="controls">
            <input <?php if($user_status=='1'){ ?>checked="checked"<?php } ?> value="1" type="checkbox" id="inputActive" name="inputActive" />
          </div>  
          
        </div>  

        <div class="control-group">
          <div class="controls">
            <input type="hidden" name="hdnSubmit" value="1" />
            <button type="submit" class="btn btn-primary">Update User Info</button> <a href="{base_url}users" class="btn">Back</a>
          </div>
        </div>
      </form>

      </div>

{page_footer}
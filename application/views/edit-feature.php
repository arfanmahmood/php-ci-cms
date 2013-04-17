{page_header}

      <h2 class="muted">Update Fabrics Feature</h2>
      
      <ul class="breadcrumb">
        <li><a href="{base_url}dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="{base_url}features">Fabrics Features</a> <span class="divider">/</span></li>
        <li class="active">Update Febrics Feature</li>
      </ul><br />
        
      {page_msg}  
        
      <div class="row-fluid marketing controls-row">
        
        <form class="form-horizontal" method="post" id="frmFeature" action="">
          <div class="control-group" id="featureDiv">
            <label class="control-label" for="inputFeature">Feature</label>
            <div class="controls">
              <input type="text" id="inputFeature" name="inputFeature" placeholder="Feature" class="input-xxlarge" value="<?php echo $feature_name; ?>">
              <span class="help-inline">Please enter fabric feature.</span>
            </div>
          </div>
  
          <div class="control-group">
            <div class="controls">
              <input type="hidden" id="hdnSubmit" name="hdnSubmit" value="1" >
              <button type="submit" class="btn btn-primary">Update Feature</button> <a href="{base_url}features" class="btn">Back</a>
            </div>
          </div>
        </form>

      </div>

{page_footer}
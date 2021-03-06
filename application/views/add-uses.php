{page_header}

      <h2 class="muted">Add Fabrics Uses</h2>
      
      <ul class="breadcrumb">
        <li><a href="{base_url}dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="{base_url}uses">Fabrics Uses</a> <span class="divider">/</span></li>
        <li class="active">Add Febrics Uses</li>
      </ul><br />
        
      {page_msg}  
        
      <div class="row-fluid marketing controls-row">
        
        <form class="form-horizontal" method="post" id="frmUses" action="">
        
          <div class="control-group" id="usesDiv">
            <label class="control-label" for="inputUses">Uses</label>
            <div class="controls">
              <input type="text" id="inputUses" name="inputUses" placeholder="Uses" class="input-xxlarge" value="" >
              <span class="help-inline">Please enter uses name.</span>
            </div>
          </div>
  
          <div class="control-group">
            <div class="controls">
              <input type="hidden" id="hdnSubmit" name="hdnSubmit" value="1" >
              <button type="submit" class="btn btn-primary">Add New Uses</button> <a href="{base_url}uses" class="btn">Back</a>
            </div>
          </div>
          
        </form>

      </div>

{page_footer}
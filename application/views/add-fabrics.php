{page_header}

      <h2 class="muted">Add New Fabrics</h2>
      
      <ul class="breadcrumb">
        <li><a href="{base_url}dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="{base_url}fabrics">Fabrics</a> <span class="divider">/</span></li>
        <li class="active">Add New Febrics</li>
      </ul><br />
        
      {page_msg}   
        
      <div class="row-fluid marketing controls-row">
      
        
      <form class="form-horizontal" method="post" enctype="multipart/form-data" id="frmFabric" action="">
      
        <div class="control-group" id="referenceDiv">
          <label class="control-label" for="inputRefrence">Refrence</label>
          <div class="controls">
            <input type="text" id="inputRefrence" name="inputRefrence" placeholder="Refrence" class="input-xxlarge" value="">
            <span class="help-inline">Please enter fabric refrence.</span>
          </div>
        </div>

        <div class="control-group" id="articleDiv">
          <label class="control-label" for="inputArticle">Article</label>
          <div class="controls">
            <input type="text" id="inputArticle" name="inputArticle" placeholder="Article" class="input-xxlarge" value="">
            <span class="help-inline">Please enter fabric article.</span>
          </div>
        </div>

        <div class="control-group" id="weaveDiv">
          <label class="control-label" for="inputWeave">Weave</label>
          <div class="controls">
            <input type="text" id="inputWeave" name="inputWeave" placeholder="Weave" class="input-xxlarge" value="">
            <span class="help-inline">Please enter fabric weave.</span>
          </div>
        </div>

        <div class="control-group" id="gsmDiv">
          <label class="control-label" for="inputGSM">GSM</label>
          <div class="controls">
            <input type="text" id="inputGSM" name="inputGSM" placeholder="GSM" class="input-xxlarge" value="">
            <span class="help-inline">Please enter fabric gsm.</span>
          </div>
        </div>

        <div class="control-group" id="blendDiv">
          <label class="control-label" for="inputBlend">Blend</label>
          <div class="controls">
            <input type="text" id="inputBlend" name="inputBlend" placeholder="Blend" class="input-xxlarge" value="">
            <span class="help-inline">Please enter fabric blend.</span>
          </div>
        </div>

        <div class="control-group" id="tensileStrengthDiv">
          <label class="control-label" for="inputTensileStrength">Tensile Strength</label>
          <div class="controls">
            <input type="text" id="inputTensileStrength" name="inputTensileStrength" placeholder="Tensile Strength" class="input-xxlarge" value="">
          </div>
        </div>

        <div class="control-group" id="tearStrengthDiv">
          <label class="control-label" for="inputTearStrength">Tear Strength</label>
          <div class="controls">
            <input type="text" id="inputTearStrength" name="inputTearStrength" placeholder="Tear Strength" class="input-xxlarge" value="">
          </div>
        </div>
        
        <hr>

        <div class="control-group" id="typeDiv">
          <label class="control-label" for="inputType">Type</label>
          <div class="controls">
            <select id="inputType" name="inputType" class="input-xxlarge muted">
              <option value="Institutional">Institutional</option>
              <option value="Industrial">Industrial</option>
            </select>
          </div>
        </div>

        <div class="control-group" id="categoryDiv">
          <label class="control-label" for="inputCategory">Category</label>
          <div class="controls">
            <select id="inputCategory" name="inputCategory" class="input-xxlarge muted">
              <option value="ToughCrusher">ToughCrusher</option>
              <option value="Frontline">Frontline</option>
              <option value="SmartGarment">SmartGarment</option>
            </select>
          </div>
        </div>
        
        <hr>
        
        <div class="control-group" id="featureDiv">
         <label class="control-label" for="inputFeatures">Features</label>
         <div class="controls">
         
          {features_check_box}
          
          <br clear="all" /><span class="help-inline">Please select atleast one feature of this fabric.</span>
          
         </div>
        </div>

        <div class="control-group" id="usesDiv">
         <label class="control-label" for="inputUses">Uses</label>
         <div class="controls">
         
          {uses_check_box}
          
          <br clear="all" /><span class="help-inline">Please select atleast one uses of this fabric.</span>
          
          </div>
        </div>
        
        <hr>

        <div class="control-group" id="smallPictureDiv">
          <label class="control-label" for="inputSmallPicture">Upload Small Picture</label>
          <div class="controls">
            <input type="file" name="inputSmallPicture" id="inputSmallPicture" placeholder="Upload Small Picture" class="input-xxlarge" />
            <input type="hidden" name="isSmallPicture" value="" />
            <span class="help-inline">Please select small picture for fabric.</span>
          </div>
        </div>
        
        <div class="control-group" id="largePictureDiv">
          <label class="control-label" for="inputLargePicture">Upload Large Picture</label>
          <div class="controls">
            <input type="file" name="inputLargePicture" id="inputLargePicture" placeholder="Upload Large Picture" class="input-xxlarge" />
            <input type="hidden" name="isLargePicture" value="" />
            <span class="help-inline">Please select large picture for fabric.</span>
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <input type="hidden" name="hdnSubmit" value="1" />
            <button type="submit" class="btn btn-primary">Add New Fabrics</button>  <a href="{base_url}fabrics" class="btn">Back</a>
          </div>
        </div>
      </form>

      </div>

{page_footer}
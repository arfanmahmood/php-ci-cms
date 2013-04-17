        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <td width="7%"><strong>Sr. No.</strong></td>
              <td width="8%"><strong>Refrence</strong></td>
              <td width="38%"><strong>Article</strong></td>
              <td width="15%"><strong>Type</strong></td>
              <td width="18%"><strong>Category</strong></td>
              <td width="14%"><strong>Actions</strong></td>
            </tr>
          </thead>
          <tbody>
          {fabric_entries}
            <tr>
              <td>{fabric_id}</td>
              <td>{fabric_ref}</td>
              <td>{fabric_article}</td>
              <td>{fabric_type}</td>
              <td>{fabric_category}</td>
              <td class="muted"><a href="{base_url}fabrics/edit/{fabric_id}" class="btn-link"><i class="icon-pencil"></i> Edit</a> | <a href="{base_url}fabrics/delete/{fabric_id}" class="btn-link"><i class="icon-trash"></i> Delete</a></td>
            </tr>
          {/fabric_entries}  
          </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <td width="8%"><strong>Sr. No.</strong></td>
              <td width="77%"><strong>Feature</strong></td>
              <td width="15%"><strong>Actions</strong></td>
            </tr>
          </thead>
          <tbody>
            {feature_entries}
            <tr>
              <td>{feature_id}</td>
              <td>{feature_name}</td>
              <td class="muted"><a href="{base_url}features/edit/{feature_id}" class="btn-link"><i class="icon-pencil"></i> Edit</a> | <a href="{base_url}features/delete/{feature_id}" class="btn-link"><i class="icon-trash"></i> Delete</a></td>
            </tr>
            {/feature_entries}
          </tbody>
        </table>

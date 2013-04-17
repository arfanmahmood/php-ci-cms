        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <td width="8%"><strong>Sr. No.</strong></td>
              <td width="77%"><strong>Uses</strong></td>
              <td width="15%"><strong>Actions</strong></td>
            </tr>
          </thead>
          <tbody>
            {uses_entries}
            <tr>
              <td>{uses_id}</td>
              <td>{uses_name}</td>
              <td class="muted"><a href="{base_url}uses/edit/{uses_id}" class="btn-link"><i class="icon-pencil"></i> Edit</a> | <a href="{base_url}uses/delete/{uses_id}" class="btn-link"><i class="icon-trash"></i> Delete</a></td>
            </tr>
            {/uses_entries}
          </tbody>
        </table>

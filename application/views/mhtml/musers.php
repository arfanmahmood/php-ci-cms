        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <td width="8%"><strong>Sr. No.</strong></td>
              <td width="20%"><strong>Users</strong></td>
              <td width="40%"><strong>User Email</strong></td>
              <td width="17%"><strong>User Status</strong></td>
              <td width="15%"><strong>Actions</strong></td>
            </tr>
          </thead>
          <tbody>
            {user_entries}
            <tr>
              <td>{user_id}</td>
              <td>{user_name}</td>
              <td>{user_email}</td>
              <td>{user_status}</td>
              <td class="muted"><a href="{base_url}users/edit/{user_id}" class="btn-link"><i class="icon-pencil"></i> Edit</a> | <a href="{base_url}users/delete/{user_id}" class="btn-link"><i class="icon-trash"></i> Delete</a></td>
            </tr>
            {/user_entries}
          </tbody>
        </table>

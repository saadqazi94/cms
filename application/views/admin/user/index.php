<section>
	<h2>Users</h2>
	<?php echo anchor('admin/user/edit','<i class="fa fa-plus-square"></i> Add a new user'); ?>
	<table class="table">
		<thead>
			<tr>
				<th>Name:</th>
				<th>Email:</th>
				<th>Edit:</th>
				<th>Delete:</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($users)): foreach ($users as $user):?>
			
				
				<tr>
					<td><?php echo anchor('admin/user/edit/' . $user->id, $user->name); ?></td>
					<td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
					<td><?php echo btn_edit('admin/user/edit/' . $user->id); ?></td>
					<td><?php echo btn_delete('admin/user/delete/' . $user->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">Sorry, No Users were found</td>
				</tr>

			<?php endif ?>
		</tbody>
	</table>
	
</section>
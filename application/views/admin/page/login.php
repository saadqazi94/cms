		
		<div class="modal-header">
          <h4 class="modal-title">Log in</h4>
          <p>Please fill in your details to Log in</p>
        </div>

        <div class="modal-body">
        	<?php echo validation_errors(); ?>
	          <?php echo form_open(); ?>
	          <table class="table">
	          	<tr>
	          		<td>Email:</td>
	          		<td><?php echo form_input('email'); ?></td>
	          	</tr>

	          	<tr>
	          		<td>Password:</td>
	          		<td><?php echo form_input('password'); ?></td>
	          	</tr>
				
				<tr>
	          		<td></td>
	          		<td><?php echo form_submit('submit','Log in', 'class="btn btn-primary"'); ?></td>
	          	</tr>          	

          	  </table>
          <?php echo form_close(); ?>
        </div>
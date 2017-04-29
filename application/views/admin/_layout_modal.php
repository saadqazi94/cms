<?php $this->load->view('admin/components/page_head'); ?>

<body style="background-color: #555;">

	 <!-- Modal -->
  <div class="modal show" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <?php $this->load->view($subview); //Subview Set in controller ?> 

        <div class="modal-footer">
          &copy <?php echo date('Y'); ?> <?php echo $meta_title; ?>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<?php $this->load->view('admin/components/page_footer'); ?>

		
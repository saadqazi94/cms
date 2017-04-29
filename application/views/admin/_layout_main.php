<?php $this->load->view('admin/components/page_head'); ?>
<body>
     
 <div class="container">
  <!-- Navigation -->
  <div class="row">
    <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">

          <ul class="nav navbar-nav js-nav-add-active-class header custom-header">
            <li class="logo"><a href="<?php echo base_url();?>index.php/admin/user"><?php echo $meta_title; ?></a></li>
            <li class="active"><?php echo anchor('admin/page', 'Pages'); ?></li>
            <li class="active"><?php echo anchor('admin/user', 'Users'); ?></li>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section>
          <?php $this->load->view($subview); ?>
      </section>
    </div>

    <div class="col-md-3">
      <section>
        <?php echo mailto('saad.qazi94@yahoo.com','<i class="fa fa-envelope"></i> saad.qazi94@yahoo.com'); ?><br>
        <?php echo anchor('admin/user/logout','<i class="fa fa-envelope"></i> Logout'); ?>
      </section>
    </div>
  </div>
</div>
 
<?php $this->load->view('admin/components/page_footer'); ?>
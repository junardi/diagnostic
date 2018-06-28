<?php $this->load->view('template/header'); ?>

<section id="content">

    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col-md-6 nobottommargin">  
    

                <h2 style="margin-top:0px">Prices <?php echo $button ?></h2>
                <form action="<?php echo $action; ?>" method="post">
            	    <div class="form-group">
                        <label for="varchar">Examination Category <?php echo form_error('examination_category') ?></label>
                        <input type="text" class="form-control" name="examination_category" id="examination_category" value="<?php echo $examination_category; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Examination <?php echo form_error('examination') ?></label>
                        <input type="text" class="form-control" name="examination" id="examination" value="<?php echo $examination; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="int">Price <?php echo form_error('price') ?></label>
                        <input type="number" class="form-control" name="price" id="price"  value="<?php echo $price; ?>" />
                    </div>
            	    <input type="hidden" name="price_id" value="<?php echo $price_id; ?>" /> 
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            	    <a href="<?php echo site_url('prices') ?>" class="btn btn-default">Cancel</a>
	           </form>  

            </div>
        </div>
    </div>
</section><!-- #content end -->

<?php $this->load->view('template/footer'); ?>


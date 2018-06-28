<?php $this->load->view('template/header'); ?>

<section id="content">

    <div class="content-wrap">
        <div class="container clearfix">
            <div class="nobottommargin">  

                <h2 style="margin-top:0px">Prices Read</h2>
                <table class="table">
                    <tr><td>Examination Category</td><td><?php echo $examination_category; ?></td></tr>
                    <tr><td>Examination</td><td><?php echo $examination; ?></td></tr>
                    <tr><td>Price</td><td><?php echo $price; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('prices') ?>" class="btn btn-default">Cancel</a></td></tr>
                </table>

            </div>
        </div>
    </div>
</section><!-- #content end -->

<?php $this->load->view('template/footer'); ?>
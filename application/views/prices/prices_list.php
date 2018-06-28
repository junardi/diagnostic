<?php $this->load->view('template/header'); ?>

<section id="content">

    <div class="content-wrap">
        <div class="container clearfix">
            <div class="nobottommargin">  

                <h2 style="margin-top:0px">Prices List</h2>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('prices/create'),'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('prices/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php 
                                        if ($q <> '')
                                        {
                                            ?>
                                            <a href="<?php echo site_url('prices'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                        }
                                    ?>
                                  <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <tr>
                        <th>No</th>
        		<th>Examination Category</th>
        		<th>Examination</th>
        		<th>Price</th>
        		<th>Action</th>
                    </tr><?php
                    foreach ($prices_data as $prices)
                    {
                        ?>
                        <tr>
        			<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $prices->examination_category ?></td>
        			<td><?php echo $prices->examination ?></td>
        			<td><?php echo $prices->price ?></td>
        			<td style="text-align:center" width="200px">
        				<?php 
        				echo anchor(site_url('prices/read/'.$prices->price_id),'Read'); 
        				echo ' | '; 
        				echo anchor(site_url('prices/update/'.$prices->price_id),'Update'); 
        				echo ' | '; 
        				echo anchor(site_url('prices/delete/'.$prices->price_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        				?>
        			</td>
        		</tr>
                        <?php
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        	    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>      


            </div>                
        </div>
    </div>
</section><!-- #content end -->

<?php $this->load->view('template/footer'); ?>

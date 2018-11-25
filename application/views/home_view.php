

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">
				<div class="container clearfix">
					<div class="nobottommargin">
						
						<h4 class="sectionHeading">Laboratory Tests</h4>
						<!-- Large modal -->
						<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add</button>
						<?php echo $this->session->flashdata('message'); ?>    
						<div class="line custom-line"></div>   

						<div class="table-responsive">
							<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Laboratory Test</th>
										<th>Price</th>
										<th>Category</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Laboratory Test</th>
										<th>Price</th>
										<th>Category</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</tfoot>
								<tbody>
								<?php foreach($tests_data as $row): ?>
									<tr>
										<td><?php echo $row->test; ?></td>
										<td><?php echo $row->price; ?></td>
										<td><?php echo ucfirst($row->category); ?></td>
										<td><a href="<?php echo base_url() . 'index.php/home?test_id_on_edit=' . $row->test_id; ?>">Edit</a></td>
										<td><a href="<?php echo base_url() . 'index.php/process/delete_data?test_id=' . $row->test_id; ?>">Delete</a></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
  

					</div> <!-- end no bottom margin -->  
				</div>
			</div>

		</section><!-- #content end -->

	
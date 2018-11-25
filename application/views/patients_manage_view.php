

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="container clearfix">
			<div class="nobottommargin">
				
				<?php foreach($patient_data as $row): ?>
				<h4 class="patient_name sectionHeading"><em><a href="<?php echo base_url(); ?>index.php/patients">Patients</a></em> / <?php echo $row->first_name . " " . $row->last_name; ?></h4>       
				<p class="patient_details"><strong>Gender:</strong> <em><?php echo ucfirst($row->gender); ?></em>,  <strong>Address:</strong> <em><?php echo ucfirst($row->address); ?></em>, <strong>Contact Number:</strong> <em><?php echo $row->contact_number; ?></em></p> 
				<?php endforeach; ?>  

				<!-- Large modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#patient_create_test_modal">Set Laboratory Test</button>
				<?php echo $this->session->flashdata('message'); ?>    
				<div class="line custom-line"></div>      

				<div class="table-responsive">
					<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Laboratory Tests</th>
								<th>Categories</th>
								<th>Total Price</th>
								<th>Date Created</th>
								<th>Date Updated</th>
								<th>Delete</th>
								<th>Paid</th>
								<th>Released</th>
								<th>View</th>  
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Laboratory Tests</th>
								<th>Categories</th>
								<th>Total Price</th>
								<th>Date Created</th>
								<th>Date Updated</th>
								<th>Delete</th>
								<th>Paid</th>
								<th>Released</th>
								<th>View</th>
							</tr>
						</tfoot>
						<tbody>
						<?php foreach($get_patient_laboratory_tests as $row): ?>
							<tr>
								
								<td><?php echo $row->laboratory_test; ?></td>
								<td><?php echo ucwords($row->categories); ?></td>
								<td><?php echo $row->total_price; ?></td>    
								<td><?php if(($row->group_created != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->group_created); } ?></td>
								<td><?php if(($row->group_updated != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->group_updated); } ?></td>
								<td><a href="<?php echo base_url() . 'index.php/process/delete_data?group_test_id=' . $row->group_test_id . '&current_patient_id=' . $current_patient_id; ?>">Delete</a></td>
								<td>Paid</td>
								<td>Released</td>
								<td><a href="<?php echo base_url() . 'index.php/patients/manage?group_test_id=' . $row->group_test_id; ?>">View</a></td>	
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>  


			</div> <!-- end no bottom margin -->  
		</div>
	</div>

</section><!-- #content end -->

	















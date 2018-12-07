

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="container clearfix">
			<div class="nobottommargin">
				
				<?php foreach($patient_data as $row): ?>
				<h4 class="patient_name sectionHeading">
					<span class="nocolor left"><em><a href="<?php echo base_url(); ?>index.php/patients">Patients</a></em> / <a href="<?php echo base_url() . 'index.php/patients/manage?patient_id=' . $current_patient_id; ?>">Sets of Tests</a> / <?php echo $row->first_name . " " . $row->last_name; ?></span>
					<span class="nocolor right">Date Requested (<span class="current_menu"><?php echo mdate('%M %d, %Y %h:%i %a', $group_test_requested); ?></span>)</span>
					<div class="clear"></div>
				</h4>       
				<p class="patient_details"><strong>Gender:</strong> <em><?php echo ucfirst($row->gender); ?></em>,  <strong>Address:</strong> <em><?php echo ucfirst($row->address); ?></em>, <strong>Contact Number:</strong> <em><?php echo $row->contact_number; ?></em></p> 
				<?php endforeach; ?>  

				<!-- Large modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#patient_add_test_modal">Add Laboratory Test</button>
				<?php echo $this->session->flashdata('message'); ?>    
				<div class="line custom-line"></div>      

				<div class="table-responsive">
					<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Laboratory Test</th>
								<th>Category</th>
								<th>Price</th>
								<th>Date Created</th>
								<th>Result Updated</th>  
								<th>Result</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Laboratory Test</th>
								<th>Category</th>
								<th>Price</th>
								<th>Date Created</th>
								<th>Result Updated</th>  
								<th>Result</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
						<?php foreach($individual_tests_data as $row): ?>
							<tr>
								<td><?php echo $row->test; ?></td>
								<td><?php echo ucwords($row->category); ?></td>
								<td><?php echo $row->price; ?></td>    
								<td><?php if(($row->test_created != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->test_created); } ?></td>
								<td><?php if(($row->test_updated != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->test_updated); } ?></td>
								<td><a href="<?php echo current_url() . '?group_test_id=' . $current_group_test_id . '&patient_test_id=' . $row->patient_test_id . '&category=' . $row->category; ?>"> <?php if(isset($row->current_result_id)) {echo "Update Result";}else{echo 'Set Result';}   ?>  </a></td>
								<td><a href="<?php echo base_url() . 'index.php/process/delete_data?patient_test_id=' . $row->patient_test_id . '&group_test_id=' . $current_group_test_id; ?>">Delete</a></td>	
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>  


			</div> <!-- end no bottom margin -->  
		</div>
	</div>

</section><!-- #content end -->

	
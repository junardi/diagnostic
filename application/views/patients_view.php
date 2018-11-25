

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
		<div class="container clearfix">
			<div class="nobottommargin">
				
				<h4 class="sectionHeading">Patients</h4>
				<!-- Large modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#patients_modal">Add</button>
				<?php echo $this->session->flashdata('message'); ?>    
				<div class="line custom-line"></div>     

				<div class="table-responsive">
					<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Civil Status</th>  
								<th>Birthday</th>
								<th>Occupation</th>  
								<th>Address</th>
								<th>Contact Number</th>  
								<th>Edit</th>
								<th>Delete</th>
								<th>Laboratory Tests</th>  
								<th>Date Created</th>
								<th>Date Updated</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Civil Status</th>  
								<th>Birthday</th>
								<th>Occupation</th>  
								<th>Address</th>
								<th>Contact Number</th>  
								<th>Edit</th>
								<th>Delete</th>
								<th>Laboratory Tests</th>  
								<th>Date Created</th>
								<th>Date Updated</th>
							</tr>
						</tfoot>
						<tbody>
						<?php foreach($patients_data as $row): ?>
							<tr>
								<td><?php echo $row->first_name; ?></td>
								<td><?php echo $row->last_name; ?></td>
								<td><?php echo ucfirst($row->gender); ?></td>  
								<td><?php echo ucfirst($row->civil_status); ?></td>   
								<td><?php echo date("F j, Y", strtotime($row->birth_date)); ?></td>
								<td><?php echo $row->occupation; ?></td>  
								<td><?php echo $row->address; ?></td> 
								<td><?php echo $row->contact_number; ?></td>
								<td><a href="<?php echo base_url() . 'index.php/patients?patient_id_on_edit=' . $row->patient_id; ?>">Edit</a></td>
								<td><a href="<?php echo base_url() . 'index.php/process/delete_data?patient_id=' . $row->patient_id; ?>">Delete</a></td>
								<td><a href="<?php echo base_url() . 'index.php/patients/manage?patient_id=' . $row->patient_id; ?>">Manage Laboratory Tests</a></td>  
								<td><?php if(($row->date_created != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->date_created); } ?></td>
								<td><?php if(($row->date_updated != "" ? true : false)) { echo mdate('%M %d, %Y %h:%i %a', $row->date_updated); }  ?></td>                                                  
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>

			
			</div> <!-- end no bottom margin -->  
		</div>
	</div>

</section><!-- #content end -->

	
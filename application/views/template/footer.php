<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

		

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; <?php echo date('Y'); ?> All Rights Reserved by Infotech IV-C<br>
					</div>

					
				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>   


	<!-- Below for Laboratory Tests Modal -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Laboratory Test</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="add-test-form" name="add-laboratory-test-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/add_laboratory_test" ?>" method="post">                                      
							<div class="col_half">
								<label for="laboratory_test">Laboratory Test:</label>
								<input type="text" id="laboratory_test" name="laboratory_test" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="price">Price:</label>
								<input type="number" id="price" name="price" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="category">Category:</label>
								<select name="category" class="selectpicker form-control">
									<option value=""></option>
									<option value="chemistry">Chemistry</option>
									<option value="hemotology">Hemotology</option>
									<option value="urinalysis">Urinalysis</option>  
									<option value="fecalysis">Fecalysis</option>  
									<option value="serology">Serology</option>  
									<option value="special_test">Special Test</option>  
									<option value="histopathology">Histopathology</option>
								</select>
							</div>

							<div class="clear"></div>
							<div class="col_full nobottommargin">
								<button class="button button-3d nomargin" id="add-laboratory-form-submit" name="add-laboratory-form-submit" value="Add">Add</button>
							</div>
						</form>   
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> <!-- Add test modal -->     

	<?php 
		if(isset($test_id_on_edit) && $test_edit_data != null):   
			foreach($test_edit_data as $row):	
	?>	
	<div class="modal fade" id="edit_test" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Edit Laboratory Test</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="update-test-form" name="update-laboratory-test-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/update_laboratory_test" ?>" method="post">                                      
							<div class="col_half">
								<label for="laboratory_test">Laboratory Test:</label>
								<input type="text" id="laboratory_test" name="laboratory_test" value="<?php echo $row->test; ?>" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="price">Price:</label>
								<input type="number" id="price" name="price" value="<?php echo $row->price; ?>" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="category">Category:</label>
								<select name="category" class="selectpicker form-control">
								<option value="<?php echo $row->category; ?>"><?php echo ucfirst($row->category); ?></option>
								<?php if($row->category != "chemistry"): ?><option value="chemistry">Chemistry</option><?php endif; ?>
								<?php if($row->category != "hemotology"): ?><option value="hemotology">Hemotology</option><?php endif; ?>
								<?php if($row->category != "urinalysis"): ?><option value="urinalysis">Urinalysis</option><?php endif; ?>  
								<?php if($row->category != "fecalysis"): ?><option value="fecalysis">Fecalysis</option><?php endif; ?>  
								<?php if($row->category != "serology"): ?><option value="serology">Serology</option><?php endif; ?>  
								<?php if($row->category != "special_test"): ?><option value="special_test">Special Test</option><?php endif; ?>  
								<?php if($row->category != "histopathology"): ?><option value="histopathology">Histopathology</option><?php endif; ?>
								</select>
							</div>  

							<input type="hidden" name="test_id" value="<?php echo $row->test_id; ?>">

							<div class="clear"></div>
							<div class="col_full nobottommargin">
								<button class="button button-3d nomargin" id="update-laboratory-form-submit" name="update-laboratory-form-submit" value="Update">Update</button>  
								<button type="reset" class="button button-3d nomargin">Reset</button>
							</div>
						</form>   
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> <!-- Edit test modal -->   
	<?php   
			endforeach;
		endif; 
	?>     

	<!-- Below for Patients Modal -->  
	<div id="patients_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Patient</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="add-patient-form" name="add-patient-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/add_patient" ?>" method="post">                                      
							<div class="col_half">
								<label for="first_name">First Name:</label>
								<input type="text" id="first_name" name="first_name" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="last_name">Last Name:</label>
								<input type="text" id="last_name" name="last_name" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="gender">Gender:</label>
								<select name="gender" class="selectpicker form-control">
									<option value=""></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>     

							<div class="col_half col_last">
								<label for="civil_status">Civil Status:</label>
								<select name="civil_status" class="selectpicker form-control">
									<option value=""></option>
									<option value="single">Single</option>
									<option value="married">Married</option>  
									<option value="widowed">Widowed</option>
								</select>
							</div>

							<div class="clear"></div>
							
							<div class="col_half">
								<label for="birth_date">Birthday:</label>
								<input type="text" id="birth_date" name="birth_date" value="" class="tleft form-control birth_date" placeholder="YYYY-MM-DD" />                              
							</div>  

							<div class="col_half col_last">
								<label for="occupation">Occupation:</label>
								<input type="text" id="occupation" name="occupation" value="" class="form-control" />
							</div>   

							<div class="clear"></div>  

							<div class="col_half">
								<label for="contact_number">Contact Number:</label>
								<input type="number" id="contact_number" name="contact_number" value="" class="form-control" />
							</div>       

							<div class="col_half col_last">
								<label for="address">Address:</label>
								<input type="text" id="address" name="address" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d nomargin" id="add-patient-form-submit" name="add-patient-form-submit" value="Add">Add</button>
							</div>
						</form>   
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> <!-- Add Patient modal -->        

	<!-- Below for Patients Create Set Of Tests Modal --> 
	<div id="patient_create_test_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Select Laboratory Test</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="create-patient-test-form" name="create-patient-test-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/add_patient_test" ?>" method="post">                                      
							
							<?php 
								if(isset($select_tests_data)): 
									foreach($select_tests_data as $row): 
							?>	
								<div class="col_full">
									<h5 class="text-left"><?php echo ucfirst($row['category']); ?></h5>	 
								</div>
								
								<?php foreach($row['tests'] as $row_b): ?>	
								<div class="col_half">
									<div class="checkbox">
										<label>
											<input class="test_checkbox" type="checkbox" name="test_id[]" value="<?php echo $row_b['test_id'] ?>">
											<?php echo $row_b['test'] . " (<span class='price_value'>" . $row_b['price'] . "</span>)"; ?>
										</label>  
									</div>							
								</div>    
								<?php endforeach; ?>  
							
							<?php 
									endforeach;
								endif;
							?> 

							<?php if(isset($current_patient_id)) { ?>  
								<input type="hidden" name="patient_id" value="<?php echo $current_patient_id; ?>">
							<?php } ?>
							<div class="clear"></div>
								
							<div class="col_full nobottommargin">
								<p>
									<button class="button button-3d nomargin add_patient_test_button" id="create-patient-test-form-submit" name="create-patient-test-form-submit" value="Add">Add</button>
									<strong class="bold_price">Total Price <span class="total_price"></span></strong>
								</p>
							</div>
						</form>   
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> 

	
	<?php 
		if(isset($patient_id_on_edit) && $patient_edit_data != null):   
			foreach($patient_edit_data as $row):	
	?>
	<div id="edit_patient_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Edit Patient</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="add-patient-form" name="add-patient-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/update_patient" ?>" method="post">                                      
							<div class="col_half">
								<label for="first_name">First Name:</label>
								<input type="text" id="first_name" name="first_name" value="<?php echo $row->first_name; ?>" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="last_name">Last Name:</label>
								<input type="text" id="last_name" name="last_name" value="<?php echo $row->last_name; ?>" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="gender">Gender:</label>
								<select name="gender" class="selectpicker form-control">
									<option value="<?php echo $row->gender; ?>"><?php echo ucfirst($row->gender); ?></option>
									<?php if($row->gender != "male"): ?><option value="male">Male</option><?php endif; ?>
									<?php if($row->gender != "female"): ?><option value="female">Female</option><?php endif; ?>
								</select>
							</div>     

							<div class="col_half col_last">
								<label for="civil_status">Civil Status:</label>
								<select name="civil_status" class="selectpicker form-control">
									<option value="<?php echo $row->civil_status; ?>"><?php echo ucfirst($row->civil_status); ?></option>
									<?php if($row->civil_status != "single"): ?><option value="single">Single</option><?php endif; ?>
									<?php if($row->civil_status != "married"): ?><option value="married">Married</option><?php endif; ?>  
									<?php if($row->civil_status != "widowed"): ?><option value="widowed">Widowed</option><?php endif; ?>
								</select>
							</div>

							<div class="clear"></div>
							
							<div class="col_half">
								<label for="birth_date">Birthday:</label>
								<input type="text" id="birth_date" name="birth_date" value="<?php echo $row->birth_date; ?>" class="tleft form-control birth_date" placeholder="YYYY-MM-DD" />                              
							</div>    

							<div class="col_half col_last">
								<label for="occupation">Occupation:</label>
								<input type="text" id="occupation" name="occupation" value="<?php echo $row->occupation; ?>" class="form-control" />
							</div>   

							<div class="clear"></div>  

							<div class="col_half">
								<label for="contact_number">Contact Number:</label>
								<input type="number" id="contact_number" name="contact_number" value="<?php echo $row->contact_number; ?>" class="form-control" />
							</div>           

							<div class="col_half col_last">
								<label for="address">Address:</label>
								<input type="text" id="address" name="address" value="<?php echo $row->address; ?>" class="form-control" />
							</div>

							<input type="hidden" name="patient_id" value="<?php echo $row->patient_id; ?>">

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d nomargin" id="edit-patient-form-submit" name="edit-patient-form-submit" value="Update">Update</button>
								<button type="reset" class="button button-3d nomargin">Reset</button>
							</div>
						</form>   
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> <!-- Edit Patient modal -->     
	<?php   
			endforeach;
		endif; 
	?>  	        


	<!-- Below for Patients Add Set Of Tests Modal in the current group --> 
	<div id="patient_add_test_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Another Laboratory Test</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">  

						<form id="add-available-patient-test-form" name="add-available-patient-test-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/add_patient_test_to_selected_group" ?>" method="post">                                      
							
							<?php 
								if(isset($not_added_tests_data)): 
									foreach($not_added_tests_data as $row): 
							?>	
								<div class="col_full">
									<h5 class="text-left"><?php echo ucfirst($row['category']); ?></h5>	 
								</div>
								
								<?php foreach($row['tests'] as $row_b): ?>	
								<div class="col_half">
									<div class="checkbox">
										<label>
											<input class="test_checkbox" type="checkbox" name="test_id[]" value="<?php echo $row_b['test_id'] ?>">
											<?php echo $row_b['test'] . " (<span class='price_value'>" . $row_b['price'] . "</span>)"; ?>
										</label>  
									</div>							
								</div>    
								<?php endforeach; ?>  
							
							<?php 
									endforeach;
								endif;
							?> 

							<?php if(isset($current_group_test_id)) { ?>  
								<input type="hidden" name="group_test_id" value="<?php echo $current_group_test_id; ?>">
							<?php } ?>   

							<?php if(isset($current_patient_id)) { ?>  
								<input type="hidden" name="patient_id" value="<?php echo $current_patient_id; ?>">
							<?php } ?>
							<div class="clear"></div>
								
							<div class="col_full nobottommargin">
								<p>
									<button class="button button-3d nomargin add_patient_test_button" id="add-available-patient-test-form-submit" name="add-available-patient-test-form-submit" value="Add">Add</button>
									<!-- <strong class="bold_price">Total Price <span class="total_price"></span></strong> -->
								</p>
							</div>
						</form> 
						
					</div> <!-- end modal body -->
				</div>
			</div>
		</div>
	</div> 



	<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins.js"></script>   
	<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>  
	<script src="<?php echo base_url(); ?>js/components/bs-datatable.js"></script>  

	<!-- Below for Date and Time Picker 
	============================================= -->   
	<script src="<?php echo base_url(); ?>js/components/moment.js"></script>  
	<script src="<?php echo base_url(); ?>js/components/datepicker.js"></script>  
	<script src="<?php echo base_url(); ?>js/components/timepicker.js"></script>  
	<script src="<?php echo base_url(); ?>js/components/daterangepicker.js"></script>


	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url(); ?>js/functions.js"></script>   
	<script src="<?php echo base_url(); ?>js/custom.js"></script>  

	<!-- Edit modal scripts -->   
	<script type="text/javascript">  
		// below for edit laboratory 
		<?php if(isset($test_id_on_edit) && $test_edit_data != null): ?>
			$('#edit_test').modal('show');  
		<?php endif; ?>   

		// below for edit patient 
		<?php if(isset($patient_id_on_edit) && $patient_edit_data != null): ?>
			$('#edit_patient_modal').modal('show');  
		<?php endif; ?>   
	</script>  
	

</body>
</html>
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
	<div class="modal fade bs-example-modal-lg has-required" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	<div class="modal fade has-required" id="edit_test" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	<div id="patients_modal" class="modal fade has-required" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	<div id="patient_create_test_modal" class="modal fade has-required" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	<div id="edit_patient_modal" class="modal fade has-required" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	<div id="patient_add_test_modal" class="modal fade has-required" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

	<!-- Below for category modal to set result for chemistry -->  
	<?php 
		if(isset($current_patient_test_id) && $current_category != null && $current_category === "urinalysis"):   
	?>    
		<div id="urinalysis_result_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-body">
					
					<?php 
						if(isset($test_details)): 	
					?>

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel"><?php echo $test_details->test . " - " . ucfirst($test_details->category); ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">  

							<form id="set-test-result-form" name="set-test-result-form" class="nobottommargin" action="<?php echo base_url() . "index.php/process/update_test_result" ?>" method="post">                                      
								
								<div class="row test-result-columns">  
									<div class="col-md-4">  
										<div class="row">  
											<div class="col-md-4">  
												<p>Name:</p>  
											</div>
											<div class="col-md-8"> 
												<p><?php echo $test_details->first_name . " " . $test_details->last_name;?></p>  
											</div>  
											<div class="col-md-4">  
												<p>Address:</p>  
											</div>
											<div class="col-md-8">  
												<p><?php echo $test_details->address; ?></p>  
											</div>  
											<div class="col-md-4">  
												<p>Physician:</p>  
											</div>
											<div class="col-md-8"> 
												<p><input type="text" name="physician" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->physician; endif; ?>" required class="form-control" id="physician"></p>
											</div>  
											<div class="col-md-4">  
												<p>Diagnosis</p>
											</div>
											<div class="col-md-8">  
												<p><input type="text" name="diagnosis" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->diagnosis; endif; ?>" required class="form-control" id="diagnosis"></p>	
											</div> 
										</div>  
									</div>
									<div class="col-md-3">   
										<div class="row">
											<div class="col-md-4">
												<p>Age:</p>
											</div>
											<div class="col-md-8">
												
											</div>	  
											<div class="col-md-4">
												<p>Sex:</p>
											</div>
											<div class="col-md-8">
												<p><?php echo ucfirst($test_details->gender); ?></p>
											</div>  
											<div class="col-md-4">
												<p>C.S.:</p>
											</div>
											<div class="col-md-8">
												<p><?php echo ucfirst($test_details->civil_status); ?></p>
											</div>  
										</div>
									</div>
									
									<div class="col-md-5"> 
										<div class="row">
											  
											<div class="col-md-4">
												<p>Lab. No.:</p>
											</div>
											<div class="col-md-8">
												<p><input type="text" name="lab_no" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->lab_no; endif; ?>" class="form-control" id="lab_no"></p>
											</div>  
											<div class="col-md-4">
												<p>Examination Desired:</p>
											</div>
											<div class="col-md-8">
												<p><?php echo $test_details->test; ?></p>
											</div>  
										</div>
									</div>	
								</div>  

								<div class="row test-result-columns">  
									<div class="col-md-6">
										<div class="row">  
											<div class="col-md-12">
												<p class="bold">PHYSICAL PROPERTIES:</p>   
											</div>     
											<div class="col-md-3">  
												<p>Color</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="color" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->color; endif; ?>" class="form-control" id="color"></p>  
											</div>     

											<div class="col-md-3">  
												<p>Transparency</p>
											</div>  
											<div class="col-md-9">  
												<p><input type="text" name="transparency" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->transparency; endif; ?>" class="form-control" id="transparency"></p>
											</div>  

											<div class="col-md-3">  
												<p>Reaction</p>
											</div>  
											<div class="col-md-9">    
												<p><input type="text" name="reaction" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->reaction; endif; ?>" class="form-control" id="reaction"></p>
											</div>  

											<div class="col-md-3">  
												<p>Specific Gravity</p>
											</div>  
											<div class="col-md-9">    
												<p><input type="text" name="specific_gravity" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->specific_gravity; endif; ?>" class="form-control" id="specific_gravity"></p>
											</div>  

											<div class="col-md-12">
												<p class="bold">CHEMICAL PROPERTIES:</p>   
											</div>    

											<div class="col-md-3">  
												<p>Protein</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="protein" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->protein; endif; ?>" class="form-control" id="protein"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Sugar</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="sugar" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->sugar; endif; ?>" class="form-control" id="sugar"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Bile Pigment</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="bile_pigment" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->bile_pigment; endif; ?>" class="form-control" id="bile_pigment"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Diacetic Acid</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="diacetic_acid" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->diacetic_acid; endif; ?>" class="form-control" id="diacetic_acid"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Ketone</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="ketone" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->ketone; endif; ?>" class="form-control" id="ketone"></p>  
											</div>   

											<div class="col-md-3">  
												<p>Nitrite</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="nitrite" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->nitrite; endif; ?>" class="form-control" id="nitrite"></p>  
											</div>   

											<div class="col-md-3">  
												<p>Urobilinogen</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="urobilinogen" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->urobilinogen; endif; ?>" class="form-control" id="urobilinogen"></p>  
											</div>     

											<div class="col-md-12">
												<p class="bold">MICROSCOPIC EXAMINATION:</p>   
											</div>    

											<div class="col-md-3">  
												<p>RBC</p>
											</div>  
											<div class="col-md-9 input-group"> 
												<p><input type="text" name="rbc" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->rbc; endif; ?>" class="form-control" id="rbc"></p>  
												<div class="input-group-addon"><p>/hpf</p></div>  
											</div>  

											<div class="col-md-3">  
												<p>Pus cells</p>
											</div>  
											<div class="col-md-9 input-group"> 
												<p><input type="text" name="pus_cells" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->pus_cells; endif; ?>" class="form-control" id="pus_cells"></p>  
												<div class="input-group-addon"><p>/hpf</p></div> 
											</div>  

											<div class="col-md-3">  
												<p>CASTS:</p>
											</div>  
											<div class="col-md-9"> 
												<div class="row">  
													<div class="col-md-3">  
														<p>Waxy cast</p>
													</div>    
													<div class="col-md-9 input-group">
														<p><input type="text" name="waxy_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->waxy_cast; endif; ?>" class="form-control" id="waxy_cast"></p> 
														<div class="input-group-addon"><p>/hpf</p></div> 		
													</div>  

													<div class="col-md-3">  
														<p>Fine granular cast</p>
													</div>  
													<div class="col-md-9 input-group"> 
														<p><input type="text" name="fine_granular_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->fine_granular_cast; endif; ?>" class="form-control" id="fine_granular_cast"></p>  
														<div class="input-group-addon"><p>/hpf</p></div>
													</div>      

													<div class="col-md-3">  
														<p>Coarse granular cast</p>
													</div>  
													<div class="col-md-9 input-group"> 
														<p><input type="text" name="coarse_granular_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->coarse_granular_cast; endif; ?>" class="form-control" id="coarse_granular_cast"></p>  
														<div class="input-group-addon"><p>/hpf</p></div>
													</div>     

													<div class="col-md-3">  
														<p>RBC cast</p>
													</div>  
													<div class="col-md-9 input-group"> 
														<p><input type="text" name="rbc_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->rbc_cast; endif; ?>" class="form-control" id="rbc_cast"></p>  
														<div class="input-group-addon"><p>/hpf</p></div>
													</div>   

													<div class="col-md-3">  
														<p>WBC cast</p>
													</div>  
													<div class="col-md-9 input-group"> 
														<p><input type="text" name="wbc_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->wbc_cast; endif; ?>" class="form-control" id="wbc_cast"></p>  
														<div class="input-group-addon"><p>/hpf</p></div>
													</div>     

													<div class="col-md-3">  
														<p>Hyaline cast</p>
													</div>  
													<div class="col-md-9 input-group"> 
														<p><input type="text" name="hyaline_cast" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->hyaline_cast; endif; ?>" class="form-control" id="hyaline_cast"></p>  
														<div class="input-group-addon"><p>/hpf</p></div>
													</div>
												</div> 
											</div>

										</div>	
									</div>  

									<div class="col-md-6">  
										<div class="row">
											
											<div class="col-md-3">  
												<p>Squamous epithelial cells</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="squamous_epithelial_cells" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->squamous_epithelial_cells; endif; ?>" class="form-control" id="squamous_epithelial_cells"></p>  
											</div>    

											<div class="col-md-3">  
												<p>Round epithelial cells</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="round_epithelial_cells" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->round_epithelial_cells; endif; ?>" class="form-control" id="round_epithelial_cells"></p>  
											</div>    

											<div class="col-md-3">  
												<p class="bold">ABNORMAL CRYSTALS:</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="abnormal_crystals" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->abnormal_crystals; endif; ?>" class="form-control" id="abnormal_crystals"></p>  
											</div>    

											<div class="col-md-12">
												<p class="bold">NORMAL CRYSTALS:</p>
											</div>    

											<div class="col-md-3">  
												<p>Amorphous urates</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="amorphous_urates" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->amorphous_urates; endif; ?>" class="form-control" id="amorphous_urates"></p>  
											</div>    

											<div class="col-md-3">  
												<p>Amorphous phosphates</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="amorphous_phosphates" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->amorphous_phosphates; endif; ?>" class="form-control" id="amorphous_phosphates"></p>  
											</div>    

											<div class="col-md-3">  
												<p>Calcium Carbonate</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="calcium_carbonate" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->calcium_carbonate; endif; ?>" class="form-control" id="calcium_carbonate"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Calcium oxalate</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="calcium_oxalate" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->calcium_oxalate; endif; ?>" class="form-control" id="calcium_oxalate"></p>  
											</div>    

											<div class="col-md-3">  
												<p>Triple phosphates</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="triple_phosphates" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->triple_phosphates; endif; ?>" class="form-control" id="triple_phosphates"></p>  
											</div>  


											<div class="col-md-3">  
												<p>Uric acid</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="uric_acid" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->uric_acid; endif; ?>" class="form-control" id="uric_acid"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Others</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="normal_crystals_others" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->normal_crystals_others; endif; ?>" class="form-control" id="normal_crystals_others"></p>  
											</div>    

											<div class="col-md-3">  
												<p>Mucous threads</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="mucous_threads" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->mucous_threads; endif; ?>" class="form-control" id="mucous_threads"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Yeast cells</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="yeast_cells" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->yeast_cells; endif; ?>" class="form-control" id="yeast_cells"></p>  
											</div>  

											<div class="col-md-3">  
												<p>Bacteria</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="bacteria" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->bacteria; endif; ?>" class="form-control" id="bacteria"></p>  
											</div>    

											<div class="col-md-12">  
												<p class="bold">PARASITE:</p>
											</div>
				
											<div class="col-md-3">  
												<p>Trichomonas vaginalis</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="trichomonas_vaginalis" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->trichomonas_vaginalis; endif; ?>" class="form-control" id="trichomonas_vaginalis"></p>  
											</div>  

											<div class="col-md-3">  
												<p class="bold">OTHERS:</p>
											</div>  
											<div class="col-md-9"> 
												<p><input type="text" name="others" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->others; endif; ?>" class="form-control" id="others"></p>  
											</div>

										</div>
									</div>
								</div>  

								<div class="row test-result-columns">
									<div class="col-md-7"></div>
									<div class="col-md-5"> 
										<input type="text" name="medical_technologist" value="<?php if(isset($test_details->urinalysis_result_id)): echo $test_details->medical_technologist; endif; ?>" required class="form-control" id="medical_technologist">	
										<p class="text-center">Registered Medical Technologist:</p>
									</div>  

									<input type="hidden" name="patient_test_id" value="<?php echo $test_details->patient_test_id; ?>">    
									<input type="hidden" name="group_test_id" value="<?php echo $test_details->group_test_id; ?>">    
									<input type="hidden" name="patient_id" value="<?php echo $test_details->patient_id; ?>">   
									<input type="hidden" name="test_id" value="<?php echo $test_details->test_id; ?>">   
									<input type="hidden" name="category" value="<?php echo $test_details->category; ?>">    
									<input type="hidden" name="test" value="<?php echo $test_details->test; ?>">  

									<?php 
										if(isset($test_details->urinalysis_result_id)) 
										{
											echo '<input type="hidden" name="urinalysis_result_id" value="'. $test_details->urinalysis_result_id .'">';
										}
									?>


								</div>

								<div class="col_full nobottommargin">
									<p>
										<?php 
											if(isset($test_details->urinalysis_result_id)) 
											{
												echo '<button class="button button-3d nomargin" id="set-test-result-form-submit" name="set-test-result-form-submit" value="update">Update Result</button>';
												echo '&nbsp;&nbsp;';
												echo '<button class="button button-3d nomargin" type="reset">Reset</button>';
											} 
											else 
											{
												echo '<button class="button button-3d nomargin" id="set-test-result-form-submit" name="set-test-result-form-submit" value="set">Set Result</button>';
											}
																						
										?>

									</p>
								</div>   

							</form>
							
						</div> <!-- end modal body -->
					</div> <!-- end modal content -->      


					<?php 
						endif;
					?>

				</div>
			</div>
		</div>    
	<?php   
		endif; 
	?>  


	

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

		//below for chemistry result modal   
		<?php if(isset($current_patient_test_id) && $current_category != null && $current_category === "urinalysis"): ?>
			$('#urinalysis_result_modal').modal('show');  
		<?php endif; ?>      

	</script>  
	
</body>
</html>
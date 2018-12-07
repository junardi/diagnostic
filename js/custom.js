$( function() {  

	$('#datatable1').dataTable();   

	$(".has-required form input").prop('required',true);  
	$(".has-required form select").prop('required',true);  
	$(".has-required form input[type='checkbox']").removeAttr('required');  
	$("#create-patient-test-form .col_half:nth-child(even)").addClass('col_last');

	// below for calculating price in checkbox       
	jQuery.fn.extend({
		check: function() {
			return this.each(function() { this.checked = true; });
		},
		uncheck: function() {
			return this.each(function() { this.checked = false; });
		}
	});

	
	// set number of checks and disable add patient test button
	var numberOfChecks = 0;    
	$('.add_patient_test_button').attr("disabled", "disabled").addClass('disabled');


	// disable current price value 
	var current_price_value = 0;  

	$('.test_checkbox').on('click', function(){
		var test_value = parseInt($(this).next('.price_value').text());   
		if($(this).is(":checked"))
		{
			current_price_value += test_value;      
			if(current_price_value > 0) 
			{
				$('.bold_price').fadeIn('fast');     
				$('.bold_price .total_price').text(current_price_value);
			}  

			// below determine if add will be disabled or enabled   
			numberOfChecks++; 
			if(numberOfChecks != 0) 
			{
				$('.add_patient_test_button').removeAttr("disabled").removeClass("disabled");
			}
		} 
		else 
		{
			current_price_value -= test_value;    
			if(current_price_value <= 0) 
			{
				$('.bold_price').fadeOut('fast');	  
				$('.bold_price .total_price').text("");
			}
			else 
			{
				$('.bold_price').fadeIn('fast');     
				$('.bold_price .total_price').text(current_price_value);
			}   

			// below determine if add will be disabled or enabled  
			numberOfChecks--; 
			if(numberOfChecks == 0) 
			{
				$('.add_patient_test_button').attr("disabled", "disabled").addClass('disabled');
			}
			

		}

	});   


	// on hidden patient create test modal
	$('#patient_create_test_modal').on('hidden.bs.modal', function (e) {
		$('.test_checkbox').uncheck();  
		current_price_value = 0;  
	});       


	// below for datepicker    
	$('.birth_date').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
	});


} );  
























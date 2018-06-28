$( function() {  

	var names = [ "Chemistry", "Hemotology", "Urinalysis/Fecalysis", "Serology", "Special Test", "Histopathology" ];

	var accentMap = {
		"á": "a",
		"ö": "o"
	};
	var normalize = function( term ) {
		var ret = "";
		for ( var i = 0; i < term.length; i++ ) {
			ret += accentMap[ term.charAt(i) ] || term.charAt(i);
		}
		return ret;
	};

	$( "#examination_category" ).autocomplete({
		source: function( request, response ) {
			var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
			response( $.grep( names, function( value ) {
				value = value.label || value.value || value;
				return matcher.test( value ) || matcher.test( normalize( value ) );
			}) );
		}
	});  


} );
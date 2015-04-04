jQuery(document).ready(function($) {
	jQuery(".vp-js-select2").select2({
			placeholder: "Select a State",
			allowClear: true,
		});
	function format(icon) {
			var originalOption = icon.element;
			return '<span class="fontawesome"><i class="fa ' + icon.id + '"></i> ' + icon.text + '</span>';
		}	
    	jQuery(".vp-js-fontawesome").select2({
		placeholder: "Select a State",
		allowClear: true,
		formatResult: format,
    	formatSelection: format,
		escapeMarkup: function(m) { return m; }
	});
});
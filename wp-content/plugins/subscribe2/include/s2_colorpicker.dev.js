// version 1.0 - original inline version
// version 1.1 - Split into separate js file and amended
// version 1.2 - Improvements to the code for the colorpicker
// version 1.3 - Got colorpicker working without a page reload using .live event
jQuery(document).ready(function () {
	var id;
	jQuery('.colorpickerField')
	// show the colorpicker when the class is focused
	.live('focusin', function () {
		id = this;
		jQuery(this).ColorPicker({
			// define some ColorPicker events
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			},
			onShow: function (el) {
				jQuery(el).fadeIn(500);
				return false;
			},
			onHide: function (el) {
				jQuery(el).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				a = hex.toUpperCase();
				id.value = a;
			},
			onSubmit: function (hsb, hex, rgb, el) {
				a = hex.toUpperCase();
				id.value = a;
				jQuery('.colorpicker').fadeOut(500);
				return false;
			}
		});
		// bind the colorpicker to keyboard input
		jQuery(this).keyup(function () {
			if (this.value.length === 6) {
				id.value = this.value.toUpperCase();
				jQuery(this).ColorPickerSetColor(id.value);
			}
		});
	});
});
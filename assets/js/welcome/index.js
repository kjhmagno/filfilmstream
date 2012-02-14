;(function($) {
	$.ffs_welcome_index = {
		init : function() {
			$.ffs_base.startLoading();

			$.ffs_base.setupLayout();

			$.ffs_base.endLoading();
		}
	}
})(jQuery);
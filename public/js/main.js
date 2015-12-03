$(function() {
	$('.btn-active').click(function(e) {
		e.preventDefault();
		var _this = $(this);
		$.ajax({
			url: _this.attr('href'),
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				if(data.code == 1) {
					if(data.status == 1) {
						_this.html('<i class="fa fa-check-square"></i>');
					}else {
						_this.html('<i class="fa fa-square"></i>');
					}
				} else {
					alert(data.messages);
				}
			}
		});
	});
});
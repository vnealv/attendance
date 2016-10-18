			$(function () {
				$('#datetimepicker6').datetimepicker({
					pickTime: false
				});
			});
		
$("div.radio>input").keyup(function() {
	console.log('<keyup> ', $(this).val());
	$(this).parent().children('label').children('input').attr('value', $(this).val());
});

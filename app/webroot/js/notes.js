$(function() {
	$(".index-block").mouseover(function(){
		$(this).find(".edit-delete-anchor").fadeIn();
	}, function(){
		$(this).find(".edit-delete-anchor").fadeOut();
	});
});

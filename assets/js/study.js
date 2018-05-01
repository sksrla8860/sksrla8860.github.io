$(function(){
	$(".tab_content").hide();
	$(".tab_content:first").show();

	$(".tab_silde li").click(function () {
		$(".tab_silde li").removeClass("on");
		$(this).addClass("on");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel");
		activeTab = new String(activeTab);
		var regex = /[^0-9]/g;
    var monthCode = activeTab.replace(regex, '');
		$.ajax({
		type: 'post',
		url: "monthSemesterCourseAjax.asp",
		dataType: "html",
		data: { month : monthCode},
		success: function(responseData){
			$("#" + activeTab).html(responseData);
		}
	});
		$("#" + activeTab).fadeIn();
	});
});
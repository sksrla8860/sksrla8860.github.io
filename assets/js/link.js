$(function () {
	$(".pLine3").on("click", function(){
			location.href = 'http://wwww.greenart.co.kr/community/licenseInfo.asp';
	});
		$(window).bind("pageshow", function (event) {
			if (event.originalEvent.persisted) {
				console.log('BFCahe로부터 복원됨');
			}
			else {
				console.log('새로 열린 페이지');
			};
		});
	var o = $('.tab_silde').find('.on');
	var i = $('.tab_silde .on').index();
	
	$('.tab_content').hide();
	$('.tab_content').eq(i).show();
});
<link rel="stylesheet" type="text/css" href="/assets/css/green/greenHistoryContents.css"/>
			<div id="test" -ms-overflow-style: none;>
			<?php echo($list); ?>
			</div>
		</div><!-- contents 끝 -->
    </div>
	<script>
$(document).ready(function(){
		if($(window).width() <=1079){
			swiper_1.unlockSwipes();
		}
		if($(window).width() >=1080){
			swiper_1.lockSwipes();
		}
});
$(window).resize(function(){
	/*캠퍼스 리스트 변환*/
	var w=$(window).width();
	if(w <=1079){
		//$('.join').parent().addClass("displayNone");
		swiper_1.unlockSwipes(); //swiper 잠긴거 풀기
	}else if($(window).width() >=1080){
		//$('.join').parent().removeClass("displayNone");
		swiper_1.lockSwipes(); //swiper 잠기기
	}
});
var swiper_1 = new Swiper('.swiper-container_1', {
	scrollbar: '.swiper-scrollbar',
	scrollbarHide: true,
	slidesPerView: 'auto',
	//centeredSlides: true,
	//spaceBetween: 30,
	grabCursor: true,
});
</script>
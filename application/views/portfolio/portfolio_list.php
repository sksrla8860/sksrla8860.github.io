    <link rel="stylesheet" type="text/css" href="/assets/css/community/portfolio.css"/>
			<div class="greenStudyPortfolioBG">
				<ul class="curriculumField clearfix">
				<?php $tSegment = $this->uri->segment(3); ?>
					<li id="liC1" class="TbdbCACACA MbdbCACACA"><a href="#인터렉티브웹" onclick="GetRecordsPart('1');return false;" <?php if($tSegment == "1"){ ?> class="on" <?php } ?>>인터렉티브웹</a></li>
					<li id="liC9" class="TbdbCACACA MbdbCACACA"><a href="#프론트엔드웹" onclick="GetRecordsPart('9');return false;" <?php if($tSegment == "9"){ ?> class="on" <?php } ?>>프론트엔드웹</a><div></div></li>
					<li id="liC2" class="TbdbCACACA MbdbCACACA"><a href="#편집디자인" onclick="GetRecordsPart('2');return false;" <?php if($tSegment == "2"){ ?> class="on" <?php } ?>>편집디자인</a></li>
					<li id="liC3" class="TbdbCACACA"><a href="#건축인테리어" onclick="GetRecordsPart('3');return false;" <?php if($tSegment == "3"){ ?> class="on" <?php } ?>>건축인테리어</a><div></div></li>
					<li id="liC4" class=""><a href="#영상/마야" onclick="GetRecordsPart('4');return false;" <?php if($tSegment == "4"){ ?> class="on" <?php } ?>>영상/마야</a><div></div></li>
					<li id="liC8" class=""><a href="#자바개발자" onclick="GetRecordsPart('8');return false;" <?php if($tSegment == "8"){ ?> class="on" <?php } ?>>자바개발자</a></li>
					<li id="liC10" class=""><a href="#게임/원화" onclick="GetRecordsPart('10');return false;" <?php if($tSegment == "10"){ ?> class="on" <?php } ?>>게임/원화</a><div></div></li>
					<li id="liC11" class=""><a href="#아트웍" onclick="GetRecordsPart('11');return false;" <?php if($tSegment == "11"){ ?> class="on" <?php } ?>>아트웍</a></li>
				</ul>
				<h3><span id="top_title"></span> <span class="temp1">PORTFOLIO</span></h3>
				<p class="portfolioExplain">위 포트폴리오는 비상업적용도로 사용되고있는 수강생 개인작품입니다.</p>
				<ul class="portfolioList clearfix">
				<?php
                  foreach($list as $lt){
                    $year = substr($lt['regdate'], 0, 4);
                    $writer = mb_substr($lt["writer"], 0, 2);
                ?>
					<li><a href=""><div class="detailView">자세히보기</div><!--<?=$lt['pf_link']; ?>-->
					<div class="portfolioImg"><img src="http://greenart.co.kr/upimage/pf_image/<?=$year; ?>/<?=$lt['thum_img']; ?>"/></div>
					<div class="clearfix"><div class="studentName"><?=$writer; ?>*</div><div class="className ellipsisStyle"><?=$lt["project"]; ?></div></div></a></li>
					<?php
                  }
                    ?>
				</ul>
				<input type="hidden" name="hiddenBox" id="hiddenBox" value="<?=$tSegment; ?>" />
				<a href="#더보기" onclick="GetRecords();return false;" class="moreBtn">더보기 + </a>
			</div><!-- greenStudyPortfolioBG -->
		</div><!-- contents 끝 -->
	<script src="/assets/js/jquery.fancybox.pack.js"></script>
	<script src="/assets/js/slides.min.jquery.js"></script>
	<script>
	$(document).ready (function () {

		//탭(ul) onoff
		$('.jq_tabonoff>.jq_cont').children().css('display', 'none');
		$('.jq_tabonoff>.jq_cont div:first-child').css('display', 'block');
		$('.jq_tabonoff>.jq_tab li:first-child').addClass('on');
		$('.jq_tab>li').on('click', function() {
			var index = $(this).parent().children().index(this);
			$(this).siblings().removeClass('on');
			$(this).siblings().children('div').removeClass('triangle');
			$(this).addClass('on');
			$(this).children('div').addClass('triangle');
			$(this).parent().next('.jq_cont').children().hide().eq(index).show();
		});
	});

$(document).on("mouseenter",".portfolioList > li > a",function(){
	$(this).children('.detailView').fadeTo("fast",0.8)
});
$(document).on("mouseleave",".portfolioList > li > a",function(){
	$(this).children('.detailView').fadeTo("fast",0)
})


		$(window).resize(function () {
			$('.slides_control').css('width',$('.campusViewList').width()).delay(800).css('height',$('.slides_control > div > img').height())
		});
      
      $(".curriculumField > li").on('click', function(){
        var licID = $(this).attr('id');
        var s_kindH = licID.substring(3);
        $("#hiddenBox").val(s_kindH);
        // alert(s_kind);
      });
var pageIndex = 1;
var pageCount;
var dataBind;
      
function GetRecords() {
  var s_kind = $("#hiddenBox").val();
	pageIndex++;
	if (pageIndex == 2 || pageIndex <= pageCount) {
	$.ajax({
			type: "POST",
			url: "/inner/portfolio_inner",
			data: 'page=' + pageIndex + '&s_kind='+ s_kind,
			dataType: "html",
			success: OnSuccess,
			failure: function (response) {
					alert(response.d);
			},
			error: function (response) {
					alert(response.d);
			}
	});
	}else{
		pageIndex--;
	}
}
function OnSuccess(data) {
	if (data != ""){
      // alert("rrrrrr");
		if (data == "1"){
			$(".moreBtn").hide();
		}else{
			pageCount = pageIndex + 1;
			$(".portfolioList").append(data);
		}
	}else{
      alert("마지막 게시물 입니다.");
      $(".moreBtn").remove();
		pageCount = 0;
		pageIndex = pageIndex - 1;
	}
}

function GetRecordsPart(kind) {
	$(this).addClass("on");
	$(".moreBtn").show();
	pageCount = 0;
	pageIndex = 1;
	skind = kind;
	$.ajax({
			type: "POST",
			url: "/inner/portfolio_inner_part",
			data: 's_kind='+kind,
			dataType: "html",
			success: OnSuccessPart,
			failure: function (response) {
					alert(response.d);
			},
			error: function (response) {
					alert(response.d);
			}
	});
}
function OnSuccessPart(data) {
	if (data != ""){
		$(".portfolioList").html(data);
	}else{
      alert("마지막 게시물 입니다.");
      $(".moreBtn").remove();
		pageCount = 0;
		pageIndex = pageIndex - 1;
	}
}$(".curriculumField>li>a").on("click",function(){
	$(this).addClass("on");
	$(this).parent().siblings().children().removeClass("on");
});

	</script>
	<!--F12 키코드 막기-->
<script type="text/javascript">
		$(document).ready(function(){
			$(document).bind('keydown',function(e){
				if ( e.keyCode == 123 /* F12 */) {
					e.preventDefault();
					e.returnValue = false;
				}
			});
		});
	</script>
<link rel="stylesheet" type="text/css" href="/assets/css/green/affiliationsSuggestionsList.css"/>
		<!-- contents 시작 -->
		<div class="container">
		 <div class="affiliationsSuggestionsListBG">
			<h3 class="blueEmphasis"><div><span class="MdisplayBlock">그린은</span> <span class="MdisplayBlock">제휴협력을 맺고있는 업체를 통해</span></div><div><span class="MdisplayBlock">수강생 여러분께 협력업체별 할인혜택을</span> <span class="MdisplayBlock">제공해 드리고 있습니다.</span></div></h3>
			<p class="grayEmphasis"><span class="MdisplayBlock">서비스 이용전에 그린의 수강증이나</span>  영수증을 제시해 주시면 됩니다</p>
			<ul class="affiliationsField clearfix">
				<li><a href="#학원" onclick="GetRecords('1');return false;" class="on">학원</a><div class="triangle"></div></li>
				<li><a href="#이미용/병원" onclick="GetRecords('2');return false;"><span class="MdisplayBlock">이미용/</span>병원</a><div></div></li>
				<li><a href="#생활/문화" onclick="GetRecords('3');return false;"><span class="MdisplayBlock">생활/</span>문화</a><div></div></li>
				<li><a href="#외식" onclick="GetRecords('4');return false;">외식</a><div></div></li>
				<li><a href="#기타" onclick="GetRecords('5');return false;">기타</a><div></div></li><!--
				<li><a href="/green/affiliationsSuggestions.asp" class="blueBtn"><span class="MdisplayBlock">제휴&</span>제안하기</a></li> -->
			</ul>
			<ul class="companyList">
			<?php
              // var_dump($list);
              foreach($list as $lt){
              ?>
        <li class="clearfix">
			<div class="companyLogo"><img src="http://greenart.co.kr/upimage/alliance/<?=$lt['aimage']?>" alt="<?=$lt["acompany"]?>"></div>
			<ul class="companyInfo">
				<li class="companyName"><?=$lt["acompany"]?></li>
				<li class="companyBenefit clearfix"><div class="companyBar"><span>혜택</span></div><div class="campanyText"><?=$lt["abenefit"]?></div></li>
				<li class="companyLocation clearfix"><div class="companyBar"><span>위치</span></div><div class="campanyText"><?=$lt["aplace"]?></div></li>
				<li class="companyTelNum clearfix"><div class="companyBar"><span>문의</span></div><div class="campanyText"><?=$lt["areference"]?></div></li>
			</ul>
			<div class="btnBG"><?php if($lt['aurl']){ ?><a href="http://<?=$lt['aurl']?>" target="_blank" class="blueBtn">홈페이지 이동</a><?php } ?></div>
		</li>
		<?php
                }
          ?>
			</ul>
		 </div><!-- affiliationsSuggestionsListBG -->
		</div>
		<!-- contents 끝 -->
<script type="text/javascript">
$(".affiliationsField > li > a").on('click',function(){
	$(this).parents().siblings().children().removeClass("on");
	$(this).parents().siblings().children('div').removeClass("triangle");
	$(this).addClass("on");
	$(this).siblings('div').addClass("triangle");
});

var pageIndex = 1;
var pageCount;
var sortIdx = "<%=sortidx%>";
var sortIdx = "";
var dataBind;
var appendChk = 1;
function GetRecords(tabCode) {
	$.ajax({
			type: "POST",
			url: "/inner/affiliationsSuggestions_list_inner",
			data: "sortidx=" + tabCode,
			dataType: "html",
			success: function (data) {
					$('.companyList').html(data);
			},
			failure: function (data) {
					alert(response.d);
			},
			error: function (data) {
					alert(response.d);
			}
	});
}
</script>
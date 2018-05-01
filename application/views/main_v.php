<link rel="stylesheet" type="text/css" href="/assets/css/mainContents.css" />
		<div class="main_slide">
			<div class="container">
				<div id="slides">
				<?
				foreach ($banner as $lt){
                  $file_info = explode(".", $lt->file_name);
                  $thumbassets = '/uploads/banner/'.$lt->file_name;
                  // echo ($thumbassets);
              ?>
              <li class="slideBG<?=$lt->n_idx; ?> slideBG" style="background-image: url(<?=$thumbassets; ?>)"><div class="slideBox"><a href="<?=$lt->n_link; ?>" title="<?=$lt->n_text; ?>">ddd</a></div></li>
              <?
                }
                ?>
				</div>
			</div>
		</div><!-- slideBox -->
		<div class="fourBoxBG">
			<div class="fourBox clearfix">
				<div class="box box1"><a href="/community/campusEvents.asp">캠퍼스행사 그린의 다양한 행사를 한 눈에 볼 수 있습니다.</a></div>
				<div class="box box2"><a href="/servicecenter/tuition_fee.asp">수강료조회 수강료를 미리 조회 할 수 있습니다.</a></div>
				<div class="box box3"><a href="/servicecenter/online_consultation.asp">온라인상담 궁금한 점을 무엇이든 물어보세요.</a></div>
				<div class="box box4"><a href="/customer/cust_pay.asp">온라인결제 온라인에서 쉽게 결제 할 수 있습니다.</a></div>
			</div><!-- fourBox -->
		</div><!-- fourBoxBG -->
		<div class="curriculumSearch">
			<div class="curriculumSearchTop clearfix">
				<p class="curriculumSearchTitle">배우고 싶은 교육과정을 <br>그린에서 쉽게 검색하세요! <a href="/curriculum/curriculum_FieldList" class="curriculumSearchMoreBtn">과정 더 보기+</a></p><!-- curriculumSearchTitle -->
				<div class="curriculumSearchPart clearfix">
					<div id="curriculumSelectBox">
						<label for="curriculumSelect">분야</label>
                        <select name="curriculumSelect" id="curriculumSelect">
                          <option value="0">아트웍</option>
                          <option value="1">웹디자인</option>
                          <option value="2">편집디자인</option>
                          <option value="3">실내/산업디자인</option>
                          <option value="4">게임/영상/마야</option>
                          <option value="5">SW개발</option>
                          <option value="6">세무회계/OA</option>
                          <option value="7">단과/자격증</option>
                        </select>
								<!--<%Call getSubcodeLevel0SelectBox("curriculumSelect","","")%>-->
				</div><!-- curriculumSelectBox -->
					<div id="studentSelectBox">
						<label for="studentSelect">대상 선택</label>
						<select id="studentSelect" title="select student">
						</select>
				</div><!-- studentSelectBox -->
					<div class="clearfix"><input type="hidden" name="sus_idx" id="sus_idx"/><input type="text" id="curriculumSearchBox" name="curriculumSearchBox" placeholder="검색어를 입력해주세요"><button id="curriculumSearchIcon">검색</button></div>
				</div><!-- curriculumSearchPart -->
			</div><!-- curriculumSearchTop -->
			<div class="curriculumSearchDown">
				<div class="curriculumSlide">
					<ul class="curriculumSearchList">
					<?php
                      foreach($xml as $lt)
                      {
                      ?>
						<li>
							<div class="curriculumTitleImage"><img src="http://www.greenart.co.kr/upimage/subject/<?=$lt['subimg']; ?>" alt="<?=$lt['subname']; ?>"/></div>
							<p class="curriculumTitle ellipsisLine2"><?=$lt['subname']; ?></p>
							<a href="/curriculum/curriculum_detail/gp/x/<?=$lt['susidx']; ?>" class="curriculumDetail">자세히 보기+</a>
						</li>
						<?php
                        }
                      ?>
					</ul>
				</div>
			</div><!-- curriculumSearchDown -->
		</div><!-- curriculumSearch -->
		<div class="postscriptBoxBG clearfix">
			<div class="postscriptBox clearfix">
				<div class="postscriptBoxOne">
					<div class="lecturePostscript"><a href="/community/student_interview"><h2>수강후기</h2><p class="postscriptExplain">생생한 수강후기를 들려드립니다.</p></a></div>
					<div class="employmentPostscript"><a href="/jobcenter/successStories"><h2>취업후기</h2><p class="postscriptExplain">생생한 취업후기를 들려드립니다.</p></a></div>
				</div><!-- postscriptBoxOne -->
				<div class="postscriptBoxTow">
					<h2>GREEN PORTFOLIO</h2>
					<ul class="portfolio">
						<li><a href="/portfolio/portfolio_list/1"><img src="/assets/img/main/portfolio_web.jpg" alt="웹디자인 포트폴리오"></a></li>
						<li><a href="/portfolio/portfolio_list/2"><img src="/assets/img/main/portfolio_edit.jpg" alt="편집디자인 포트폴리오"></a></li>
						<li><a href="/portfolio/portfolio_list/10"><img src="/assets/img/main/portfolio_game.jpg" alt="게임 포트폴리오"></a></li>
						<li><a href="/portfolio/portfolio_list/4"><img src="/assets/img/main/portfolio_cg.jpg" alt="영상마야 포트폴리오"></a></li>
						<li><a href="/portfolio/portfolio_list/3"><img src="/assets/img/main/portfolio_interior.jpg" alt="인테리어디자인 포트폴리오"></a></li>
						<li><a href="/portfolio/portfolio_list/8"><img src="/assets/img/main/portfolio_java.jpg" alt="자바 포트폴리오"></a></li>
					</ul>
				</div><!-- postscriptBoxOne -->
			</div><!-- postscriptBox -->
		</div><!-- postscriptBoxBG -->
		<div class="greenBoxBG clearfix">
			<div class="greenBox clearfix">
				<div class="greenSupportSystem">
				<a href="/curriculum/supportSystem">
					<h2>지원제도안내</h2>
					<p>실업자·재직자를위한<br>지원제도의 정보를<br/>제공해드립니다.</p>
				</a>
				</div><!-- greenStudyRoom -->
				<div class="greenNoticeBG">
					<h2>공지사항</h2> <a href="/community/notice_list" class="greenBoxMore">더보기</a>
					<ul class="greenNotice">
					<?php
                      $cont = 1;
                      foreach($board as $bl)
                      {
                        if($cont >= 7){
                          break;
                        }
                      ?>
						<li><a href="/community/notice_view/<?=$bl->b_idx; ?>"><?=$bl->b_name; ?></a></li>
						<?php
                      $cont++;
                      }
                      ?>
					</ul>
				</div><!-- greenNotice -->
				<div class="greenEmploySituationBG">
					<h2>취업현황</h2><a href="/jobcenter/employList" class="greenBoxMore" >더보기</a>
					<ul class="greenEmploySituation clearfix">
					<?php
                      $cont=1;
                      foreach($job as $jl)
                      {
                      ?>
						<li class="employeeBG<?=$cont++; ?>">
							<ul class="employee">
								<li class="employeeCompany"><?=$jl['ccompany']; ?></li>
								<li class="employeeCurri"><?=$jl['ccourse']?></li>
								<li class="employeeName"><?=$jl['cname']; ?>*</li>
							</ul>
						</li>
						<?php
                        }
                      ?>
					</ul>
				</div><!-- greenEmploySituation -->
			</div><!-- greenBox -->
		</div><!-- greenBoxBG -->
		<div class="greenGraduationBG claerfix">
			<div class="greenGraduation">
				<div class="greenGraduationTitle">
					<h2>그린 수료식</h2>
					<p><span class="greenGraduationMobileText">수고하셨습니다!</span> 그린은 여러분들의 소중한 꿈을 응원합니다.</p>
				</div><!-- greenGraduationTitle -->
				<ul class="greenGraduationList clearfix">
				<?php
                  foreach($event as $ev)
                  {
                  ?>
					<li>
						<div class="greenGraduationPhoto"><a href="/community/campusEvents_view/<?=$ev['ridx']; ?>"><img src="http://www.greenart.co.kr/upimage/subject/portfolio/<?=$ev['rimg']; ?>" alt="<?=$ev['rtitle']; ?>"></a></div>
						<p class="greenGraduationExplain"><?=$ev['rtitle']; ?></p>
					</li>
					<?php
                    }
                  ?>
				</ul>
			</div><!-- greenGraduation -->
		</div><!-- greenGraduationBG -->
<!--		<div class="greenShortCutBG">
			<ul class="greenShortCut clearfix">
				<li class="greenShortCut1"><a href="/servicecenter/online_consultation.asp"><span id="SNStempText">상담문의</span> <%=Replace(CALLNUMBER,"-",".")%></a></li>
				<li class="greenShortCut2"><a href="https://www.facebook.com/greenartofficial/" target="_blank">페이스북</a></li>
				<li class="greenShortCut3"><a href="http://blog.naver.com/gitacademy01" target="blank">블로그</a>
				<li class="greenShortCut5"><a href="http://cb.egreen.co.kr/" target="_blank">이그린</a></li>
				<li class="greenShortCut7"><a href="https://www.youtube.com/channel/UCSInYflXkRs4hWAb4s6qpfA" target="_blank">유튜브채널</a></li>
				<li class="greenShortCut8"><a href="http://tv.naver.com/greenart" target="_blank">네이버채널</a></li>
			</ul>
		</div>--><!-- greenShortCutBG -->
<script src="/assets/js/jquery.slides.js"></script>
<script src="/assets/js/jquery.bxslider.js"></script>
<script src="/assets/js/rwd_main.js"></script>
<script src="/assets/js/main.js"></script>

<script type="text/javascript">
function fireOnResizeEvent() {
 var width, height;

 if (navigator.appName.indexOf("Microsoft") != -1) {
  width  = document.body.offsetWidth;
  height = document.body.offsetHeight;
 } else {
  width  = window.outerWidth;
  height = window.outerHeight;
 }

 window.resizeTo(width - 1, height);
 window.resizeTo(width + 1, height);
}

$("#curriculumSelect").change(function(){
	$(".curriculumSlide").css("opacity","0");
	var group = $(this).val();
	jQuery.ajax({
		type:"post",
		url:"/inner/subcode",
		data:"c_group="+group,
		datatype:"html",
		success:function(strVal){
			$("#studentSelect").html(strVal);
			$("#studentSelect").prev("label").text($("#studentSelect option:selected").text());
		}
	});
	fnCurriculumSearchList(group,'');
});
$("#studentSelect").change(function(e){
	$(".curriculumSlide").css("opacity","0");
	var group = $("#curriculumSelect").val();
	var c_idx = $("#studentSelect").val();
	fnCurriculumSearchList(group,c_idx);
});
function fnCurriculumSearchList(c_group,c_idx){
	$.ajax({
	type: 'post',
	url: "/inner/subjectMainList",
	dataType: "html",
	data: { c_group : c_group, c_idx : c_idx},
	success: function(responseData){
			if (responseData == "1"){
				return false;
			}else{
				$(".curriculumSearchList").html(responseData);
			}
	}
	});
	if (slider) {
		//slider.destroySlider();
	}
	setTimeout("reloadSlider()", 500);
}
function reloadSlider(){
	slider.reloadSlider();
	//slider = $('.curriculumSearchList').bxSlider({
		//minSlides: 1,
		//maxSlides: 4,
		//pager:false,
		//slideWidth: 230,
		//slideMargin: 25
	//});
	$(".curriculumSlide").css("opacity","100");
}
$(function(){
	$.browser={};(function(){
		jQuery.browser.msie=false;
		$.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)\./)){
		$.browser.msie=true;jQuery.browser.version=RegExp.$1;}
	})();
	var delay = 10;
	if( $.browser.mozilla ){delay = 200;}
	setInterval(function() { $('#curriculumSearchBox').filter('[value!=""]:focus').trigger('keydown'); }, 1000);
	$("#curriculumSearchBox").autocomplete({
		source : function( request, response ) {
			//console.log(escape(request.term));
			var c_group = $("#curriculumSelect").val();
			var c_idx = $("#studentSelect").val();
			$.ajax({
				type: 'post',
				url: "/inner/subjectName",
				dataType: "json",
				data: { name : request.term, c_group : c_group, c_idx : c_idx },
				success: function(responseData){
            var array = responseData.map(function(element) {
                return {value: element['sub_name'], id : element['sus_idx']};
            });
            response(array);
        }
			});
		},
		delay: delay,
		minLength: 2,
		selectFirst: true,
		focus: function() {
				// prevent value inserted on focus
				return false;
		},
		select: function( event, ui ) {

		}
	});
	// 슬라이드 화살표, 인디케이터 마우스 오버했을때 멈추기
	$('#slides > a,#slides > ul').on('mouseover', function(){
		$('.slidesjs-container').mouseover();
	});
	$('#slides > a,#slides > ul').on('mouseout', function(){
		$('.slidesjs-container').mouseout();
	});
});
$("#curriculumSearchIcon").click(function(){
	var group = $("#curriculumSelect").val();
	var c_idx = $("#studentSelect").val();
	var sub_name = encodeURIComponent($("#curriculumSearchBox").val());
	if (sub_name){
		location.href="/curriculum/curriculum_List.asp?sub_name="+sub_name+"&gp="+group+"&c_idx="+c_idx;
	}else{
		alert("검색하실 과정명을 입력해주세요.");
	}
});
</script>
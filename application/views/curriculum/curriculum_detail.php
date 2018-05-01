  <link rel="stylesheet" type="text/css" href="/assets/css/curriculum/curriculumDetail.css" />
		<div id="contents">
		 <div class="curriculumPageTitleBG curriculumTitleBG">
			<div class="curriculumPageTitle">
				<h1><?php if(isset($list['subname'])){ echo($list['subname']); } ?></h1>
				<?php if(isset($list['subdetailname'])){ ?><h2><?=$list['subdetailname'] ;?></h2><?php } ?>
			</div><!-- pageTitle -->
			<ul class="studentStyle clearfix">
              <?php if($list['suscode1']){ ?><li>일반</li><?php } ?>
              <?php if($list['suscode2']){ ?><li>실업자</li><?php } ?>
              <?php if($list['suscode3']){ ?><li>재직자</li><?php } ?>
              <?php if($list['suscode4']){ ?><li>국기</li><?php } ?>
			</ul><!-- studentStyle -->
			<div class="NCSExplain"><span><a href="#NCS기반 훈련과정" class="NCSBtn">NCS기반 훈련과정</a></span><a href="#다른 훈련 과정 보기" class="otherCurriculumsBtn">다른 훈련 과정 보기</a></div>
			<div class="criterionBox">
				<div class="NCSExplainBox">
					<div class="NCSExplainTriangle"></div>
					<a href="#닫기" class="NCScloseBtn">닫기</a>
					<p class="NCSExplainTitle">국가직무능력표준(NCS)은 무엇인가요?</p>
					<p class="NCSExplainText">국가직무능력표준(NCS, National Competency Standards)은 산업현장에서 직무를 수행하기 위해 요구되는 지식·기술·태도 등의 내용을 국가가 체계화한 것입니다.</p>
				</div><!-- NCSExplainBox -->
				<div class="otherCurriculumBox">
					<div class="otherTriangle"></div>
					<a href="#닫기" class="otherCurriculumcloseBtn">닫기</a>
					<div class="searchFieldBox">
					<?php $gp = $this->uri->segment(4); ?>
						<select id="searchField" title="select Field">
								<option value= "">분야</option>
								<option value="0" <?php if($gp == 0){?>selected="selected"<? } ?>>아트웍</option>
								<option value="1" <?php if($gp == 1){?>selected="selected"<? } ?>>웹디자인</option>
								<option value="2" <?php if($gp == 2){?>selected="selected"<? } ?>>편집디자인</option>
								<option value="3" <?php if($gp == 3){?>selected="selected"<? } ?>>실내/산업디자인</option>
								<option value="4" <?php if($gp == 4){?>selected="selected"<? } ?>>게임/영상/마야</option>
								<option value="5" <?php if($gp == 5){?>selected="selected"<? } ?>>SW개발</option>
								<option value="6" <?php if($gp == 6){?>selected="selected"<? } ?>>세무회계/OA</option>
								<option value="7" <?php if($gp == 7){?>selected="selected"<? } ?>>단과/자격증</option>
						</select>
						<label for="searchField">분야</label>
					</div><!-- searchFieldBox -->
					<p class="otherCurriculumText">다른 분야 · 훈련과정을 한 눈에 볼 수 있습니다.</p>
					<div id="groupList">
					</div>
				</div><!-- otherCurriculumBox -->
			</div>
			<ul class="curriculumBtn clearfix">
				<li><a href="/servicecenter/online_consultation/<?=$list['subname'] ;?>">온라인상담</a></li>
				<li><a href="/servicecenter/cust_pay">온라인결제</a></li>
				<li><a href="/servicecenter/tuition_fee/<?=$list['subname'] ;?>">수강료조회</a></li>
			</ul>
		 </div><!-- pageTitleBG -->
        <div class="pageNavigationBG">
			<div class="pageNavigation clearfix">
				<a href="/" title="홈으로 이동"><div class="homeShortCut">home</div></a>
					<div class="pageNavigationStepBox1">
							<label for="pageNavigationStep1"></label>
							<select id="pageNavigationStep1">
								<option value="1">그린소개</option>
								<option value="2">교육과정</option>
								<option value="3">커뮤니티</option>
								<option value="4">포트폴리오</option>
								<option value="5">고객센터</option>
								<option value="6">취업센터</option>
								<option value="7">NCS지원센터</option>
							</select>
					</div>
					<div class="pageNavigationStepBox2">
							<label for="pageNavigationStep2"></label>
							<select id="pageNavigationStep2">
									<option value=""></option>
									<option value=""></option>
							</select>
					</div>
			</div><!-- pageNavigation -->
		<div id="progressbar" class="bar_progress"><!--  로딩바  --></div>
		</div><!-- pageNavigationBG -->
		<!-- contents 시작 -->
			<div class="curriculumTabMoveBG" id="curriculumExplainTab">
				<ul class="curriculumTabMove clearfix">
					<li class="active"><a href="#curriculumExplainTab">과정소개</a></li>
					<li><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li><a href="#curriculumInstructorTab">강사소개</a></li>
					<li><a href="#portfolioTab">포트폴리오</a></li>
					<li><a href="#classPostscriptTab">수강후기</a></li>
					<li><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
			<div class="curriculumExplainBG">
				<div class="curriculumExplainTop clearfix">
					<div class="curriculumExplainImage">
						<img src="http://www.greenart.co.kr/upimage/subject/<?=$list['subimg'] ;?>" alt=""/><!--<%=server.urlencode(SUB_NAME)%>-->
					</div><!-- curriculumExplainImage -->
					<div class="curriculumExplain">
					  <?=$list['subinfo'] ;?>
					</div><!-- curriculumExplain -->
				</div><!-- curriculumExplainTop -->
				<div class="curriculumExplainDown">
					<div class="curriculumInfo clearfix">
					  <?=$list['subtarget'] ;?>
					</div>
				</div><!-- curriculumExplainDown -->
			</div><!-- curriculumExplainBG -->
			<div class="curriculumTabMoveBG" id="curriculumTableTab">
				<ul class="curriculumTabMove clearfix">
					<li><a href="#curriculumExplainTab">과정소개</a></li>
					<li class="active"><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li><a href="#curriculumInstructorTab">강사소개</a></li>
					<li><a href="#portfolioTab">포트폴리오</a></li>
					<li><a href="#classPostscriptTab">수강후기</a></li>
					<li><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
			<div class="curriculumTableBG">
				<?=toOutput($list['suscurr']); ?>
				<ul class="consultBtn clearfix">
					<li><a href="/servicecenter/online_consultation/<?=$list['subname'] ;?>">온라인상담</a></li>
					<li><a href="/customer/cust_pay">온라인결제</a></li>
					<li><a href="/servicecenter/tuition_fee/<?=$list['subname'] ;?>">수강료조회</a></li>
				</ul>
			</div><!-- curriculumTableBG -->
			<div class="curriculumTabMoveBG" id="curriculumInstructorTab">
				<ul class="curriculumTabMove clearfix">
					<li><a href="#curriculumExplainTab">과정소개</a></li>
					<li><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li class="active"><a href="#curriculumInstructorTab">강사소개</a></li>
					<li><a href="#portfolioTab">포트폴리오</a></li>
					<li><a href="#classPostscriptTab">수강후기</a></li>
					<li><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
	<div class="curriculumInstructorBG" id="curriculumInstructorBG">
		<div id="tabs_table ">
			<ul class="curriculumInstructorList tabs clearfix">
			<?php
              if(isset($teacher))
              {
              $i=1;
              foreach($teacher as $tl)
              {
              ?>
				<li><a href="#panel1-<?=$i++; ?>" title="강사 상세정보 보기"><img src="http://www.greenart.co.kr/upimage/subject/teacher/<?=$tl['timg']; ?>" alt="<?=$tl['tname']; ?>" class="InstructorImg"/><img src="/assets/img/sub/curriculum/instructorListBG.png" alt="" class="instructorListBG"/></a></li>
				<?php
                }
              ?>
			</ul>
			</div><!-- tabs_table -->
			<div class="panels curriculumInstructorInfoBG">
			<?php
              $i=1;
              foreach($teacher as $tl)
              {
              ?>
			<div class="panel" id="panel1-<?=$i++; ?>">
					<!-- 내용 시작-->
					<div class="curriculumInstructor clearfix">
						<div class="">
							<div class="curriculumInstructorImg"><img src="http://www.greenart.co.kr/upimage/subject/teacher/<?=$tl['timg']; ?>" alt="<?=$tl['tname']; ?>"></div><!-- curriculumInstructorImg -->
							<ul class="curriculumInstructorInfo">
								<li class="name"><?=$tl['tname']; ?></li>
								<? if(isset($tl['teudcation'])) echo($tl['teudcation']); ?>
							</ul><!-- curriculumInstructorInfo -->
						</div>
						<ul class="curriculumInstructorCareer">
							<li class="careerTitle">PROJECT</li>
							<? if(isset($tl['tcareer'])) echo($tl['tcareer']); ?>
						</ul><!-- curriculumInstructorCareer -->
					</div><!-- curriculumInstructor -->
					<!-- 내용 끝 -->
				</div><!-- panel1-1 -->
				<?php
                }
            }
              ?>
		</div><!-- panels curriculumInstructorInfoBG-->
	</div><!-- curriculumInstructorBG -->
			<div class="curriculumTabMoveBG" id="portfolioTab">
				<ul class="curriculumTabMove clearfix">
					<li><a href="#curriculumExplainTab">과정소개</a></li>
					<li><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li><a href="#curriculumInstructorTab">강사소개</a></li>
					<li class="active"><a href="#portfolioTab">포트폴리오</a></li>
					<li><a href="#classPostscriptTab">수강후기</a></li>
					<li><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
			<div class="portfolioBG" id="portfolioBG">
				<ul class="portfolioList clearfix">
				<?php
                  if(isset($portfolio))
                  {
                      foreach($portfolio as $pl)
                      {
                      $year = substr($pl['pregdate'], 0, 4);
              ?>
					<li>
						<div class="portfolioImg"><img src="http://www.greenart.co.kr/upimage/subject/portfolio/<?=$year; ?>/<?=$pl['pthumimg']; ?>" alt="<?=$pl['pname']; ?>"/></div>
						<div class="portfolioExplain clearfix"><span class="studentName"><?=$pl['pname']; ?></span><span class="studentClass ellipsisStyle"><?=$pl['ptitle']; ?></span></div>
					</li>
					<?php
                    }
                }
                    ?>
				</ul>
				<a href="/portfolio/portfolio_list"class="portfolioBtn">포트폴리오 더 보기 +</a>
			</div><!-- portfolioBG -->
			<div class="curriculumTabMoveBG" id="classPostscriptTab">
				<ul class="curriculumTabMove clearfix">
					<li><a href="#curriculumExplainTab">과정소개</a></li>
					<li><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li><a href="#curriculumInstructorTab">강사소개</a></li>
					<li><a href="#portfolioTab">포트폴리오</a></li>
					<li class="active"><a href="#classPostscriptTab">수강후기</a></li>
					<li><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
			<div class="classPostscriptBG clearfix">
				<ul class="classPostscript">
				<?php
                  if(isset($review))
                  {
                      foreach($review as $rl)
                      {
                        $name = mb_substr($rl['username'], 0, 2);
                ?>
					<li>
						<div id="section1" class="label">
							<p class="clearfix"><span class="ellipsis"><?=$rl['subject']; ?></span><span class="classPostscriptName"><?=$name; ?>*</span></p>
						</div>
						<div class="classPostscriptText">
							<?=$rl['contents']; ?>
						</div>
					</li>
					<?php
                      }
                  }
                  ?>
				</ul>
				<a href="/community/student_interview" class="classPostscriptBtn">수강후기 더 보기▶</a>
			</div><!-- classPostscriptBG -->
			<div class="curriculumTabMoveBG" id="recommendationClassTab">
				<ul class="curriculumTabMove clearfix">
					<li><a href="#curriculumExplainTab">과정소개</a></li>
					<li><a href="#curriculumTableTab">커리큘럼 </a></li>
					<li><a href="#curriculumInstructorTab">강사소개</a></li>
					<li><a href="#portfolioBG">포트폴리오</a></li>
					<li><a href="#classPostscriptTab">수강후기</a></li>
					<li class="active"><a href="#recommendationClassTab">추천과정 </a></li>
				</ul><!-- curriculumTabMove -->
			</div><!-- curriculumTabMoveBG -->
			<div class="recommendationClassBG">
				<h3>그린이 <span class="buleEmphasis">추천</span>하는 관련 교육과정</h3>
				<div class="clearfix"><div class="approachingDay">개강임박</div></div>
				<ul class="recommendationClass">
				<?php
                  if(isset($recommend))
                  {
                      foreach($recommend as $rm)
                      {
                ?>
					<li class="clearfix">
					 <p class="recommendationClassName"><?=$rm['subname']; if(isset($rm['subdetailname'])){ echo("[".$rm['subdetailname']."]"); } ?><span class="approachingDayImg">개강임박</span></p><div class="clearfix searchBtnBG"><a href="/curriculum/curriculum_detail" class="searchBtn detailViewBtn">상세보기</a><a href="/servicecenter/online_consultation" class="searchBtn">온라인상담하기</a><a href="/servicecenter/tuition_fee/" class="searchBtn">수강료조회</a></div>
					</li>
					<?php
                        }
                    }
                    ?>
				</ul>
				<ul class="consultBtn clearfix">
					<li><a href="/servicecenter/online_consultation/<?=$list['subname'] ;?>">온라인상담</a></li>
					<li><a href="/customer/cust_pay">온라인결제</a></li>
					<li><a href="/servicecenter/tuition_fee/<?=$list['subname'] ;?>">수강료조회</a></li>
				</ul>
			</div><!-- recommendationClassBG -->
		</div><!-- contents -->
<script type="text/javascript">
    $(function () {

        var w = $(window).width();
        var iframe = $('.portfolioImg iframe');
        var b_wh = iframe.width();
        if(w < 1079){
            iframe.height(b_wh*0.663082);
        }else{
            iframe.height("100%");
        };

        $(window).on("resize",function(){
                var iframe = $('.portfolioImg iframe');
                var b_wh = iframe.width();
                var w = $(window).width();
                if(w < 1079){
                        iframe.height(b_wh*0.663082);
                }else{
                        iframe.height("100%");
                };
            });

    });
	$(window).ready(function(){
		//$('.NCSExplainBox').hide();
		//$('.otherCurriculumBox').hide();
		$("#searchField").next("label").text($("#searchField option:selected").text());
		$("#searchField").trigger("change");
	});

	$('.NCSBtn').on('click',function(){
		$('.otherCurriculumBox').hide();
		var w=$(window).width()/2;
		var NCSExplainBox=$('.NCSExplainBox').width()/2;
		var left=w-NCSExplainBox;
		$('.NCSExplainBox').css({left:left})
		$('.NCSExplainBox').show();
	});

		$('.otherCurriculumsBtn').on('click',function(){
		$('.NCSExplainBox').hide();
		var w=$(window).width()/2;
		var otherCurriculumBox=$('.otherCurriculumBox').width()/2;
		var left=w-otherCurriculumBox;
		$('.otherCurriculumBox').css({left:left})
		$('.otherCurriculumBox').show();
	});

	$('.NCScloseBtn').on('click',function(){
		$('.NCSExplainBox').hide();
	});

		$('.otherCurriculumcloseBtn').on('click',function(){
		$('.otherCurriculumBox').hide();
	});

	var select = $("select#searchField");
	select.change(function(){
	var select_name = $(this).children("option:selected").text();
	$(this).siblings("label").text(select_name);
	});

	$('.curriCourseBox').hide();
	$('h2.textH2Title').hide();
	var num = $('.studentStyle li').length;
	var w=$(window).width();
	if (w>640)	{
	$('.studentStyle').css({width:num*126});
	var curriculumInfoT = $('.temp1').height();
	$('.target').css({height:curriculumInfoT});

	var curriculumInfoE = $('.temp2').height();
	$('.employmentField').css({height:curriculumInfoE});

	var curriculumInfoL = $('.temp3').height();
	$('.license').css({height:curriculumInfoL});
	}else{$('.studentStyle').css({width:num*88});}


	$(window).resize(function(){
		var num = $('.studentStyle li').length;
		var w=$(window).width();
		if (w>640)	{
		$('.studentStyle').css({width:num*126});

		var curriculumInfoT = $('.temp1').height();
		$('.target').css({height:curriculumInfoT});

		var curriculumInfoE = $('.temp2').height();
		$('.employmentField').css({height:curriculumInfoE});

		var curriculumInfoL = $('.temp3').height();
		$('.license').css({height:curriculumInfoL});
		}else{
		$('.studentStyle').css({width:num*88});

		$('.target').css({height:30});
		$('.employmentField').css({height:30});
		$('.license').css({height:48});

		}
	});
$(function(){
	$('.curriculumInstructorBG').each(function(){
		var topDiv = $(this);
		var anchors = topDiv.find('ul.tabs a');
		var panelDivs = topDiv.find('div.panel');

		var lastAnchor;
		var lastPanel;

		anchors.show();

		lastAnchor = anchors.filter('.on');
		lastPanel = $(lastAnchor.attr('href'));

		panelDivs.hide();
		panelDivs.eq(0).show();
		lastPanel.show();

		anchors.click(function(event){
			event.preventDefault();

			var currentAnchor = $(this);
			var currentPanel = $(currentAnchor.attr('href'));
			lastAnchor.removeClass('on');

			currentAnchor.addClass('on');
		    panelDivs.hide();
			lastPanel.hide();
			currentPanel.show();

			lastAnchor = currentAnchor;
			lastPanel = currentPanel;
		});
	});
});

var elements = document.getElementsByTagName("div");

// 모든 영역 접기
for (var i = 0; i < elements.length; i++) {
  if (elements[i].className == "classPostscriptText") {
    elements[i].style.display="none";
  } else if (elements[i].className == "label") {
    elements[i].onclick=switchDisplay;
  }
}

// 상태에 따라 접거나 펼치기
function switchDisplay() {

  var parent = this.parentNode;
  var target = parent.getElementsByTagName("div")[1];

  if (target.style.display == "none") {
    target.style.display="block";
  } else {
    target.style.display="none";
  }
  return false;
}

$("#searchField").on("change", function(){
	var c_group = $(this).val();
	if (c_group == ""){
	 alert("분야를 선택해주세요.");
	 return;
	}
	$.ajax({
		type: 'post',
		url: "/inner/subjectGroupList",
		dataType: "html",
		data: { c_group : c_group},
		success: function(responseData){
			$("#groupList").html(responseData);
		}
	});
});
</script>
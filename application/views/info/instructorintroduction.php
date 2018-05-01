<link rel="stylesheet" type="text/css" href="/assets/css/info/instructorIntroduction.css"/>
			<div class="instructorIntroductionBG">
				<div class="instructorIntroduction">
				<div class="jq_tabonoff comm_tab1">
					<ul class="jq_tab tab_menu clearfix">
					<?php if($cam_idx->m_cam == "2" || $cam_idx->m_cam == "4" || $cam_idx->m_cam == "7" || $cam_idx->m_cam == "15" || $cam_idx->m_cam == "10" || $cam_idx->m_cam == "11" || $cam_idx->m_cam == "25" || $cam_idx->m_cam == "22" || $cam_idx->m_cam == "12"){ ?>
						<li class="on"><a href="javascript:;" class="tit">그린컴퓨터아트학원</a><div class="triangle"></div></li>
						<li><a href="javascript:;" class="tit">그린컴퓨터아카데미</a><div></div></li>
				    <? }
                      else
                      {
                        ?>
						<li><a href="javascript:;" class="tit">그린컴퓨터아트학원</a><div></div></li>
						<li class="on"><a href="javascript:;" class="tit">그린컴퓨터아카데미</a><div class="triangle"></div></li>
                        <?php
                      }; ?>
					</ul>
					<div class="jq_cont tab_cont">
						<!-- //탭1 -->
						<div class="cont" <?php if($cam_idx->m_cam == "1" || $cam_idx->m_cam == "3" || $cam_idx->m_cam == "19" || $cam_idx->m_cam == "8" || $cam_idx->m_cam == "16" || $cam_idx->m_cam == "9" || $cam_idx->m_cam == "17" || $cam_idx->m_cam == "23" || $cam_idx->m_cam == "18" || $cam_idx->m_cam == "24" || $cam_idx->m_cam == "13"){ ?>style="display:none;"<? }; ?>>
							<div class="jq_tabonoff comm_tab2">
								<ul class="jq_tab tab_menu clearfix">
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "1"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('1');return false;" class="tit">강남</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "2"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('2');return false;" class="tit">종로</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "4"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('4');return false;" class="tit">신도림</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "7"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('7');return false;" class="tit">안양</a></li>
									<li class="bdbCACACA <?php if($cam_idx->m_cam == "15"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('15');return false;" class="tit">천안</a></li>
									<li class="<?php if($cam_idx->m_cam == "10"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('10');return false;" class="tit">청주</a></li>
									<li class="<?php if($cam_idx->m_cam == "11"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('11');return false;" class="tit">대전 본점</a></li>
									<li class="<?php if($cam_idx->m_cam == "25"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('25');return false;" class="tit">대전 중앙점</a></li>
									<li class="<?php if($cam_idx->m_cam == "22"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('22');return false;" class="tit">전주</a></li>
									<li class="<?php if($cam_idx->m_cam == "12"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('12');return false;" class="tit">대구</a></li>
								</ul>
							</div>
						</div>
						<!-- 탭1// -->

						<!-- //탭2 -->
						<div class="cont" <?php if($cam_idx->m_cam == "2" || $cam_idx->m_cam == "4" || $cam_idx->m_cam == "7" || $cam_idx->m_cam == "15" || $cam_idx->m_cam == "10" || $cam_idx->m_cam == "11" || $cam_idx->m_cam == "25" || $cam_idx->m_cam == "22" || $cam_idx->m_cam == "12"){ ?>style="display:none;"<? }; ?>>
							<div class="jq_tabonoff comm_tab2">
								<ul class="jq_tab tab_menu clearfix">
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "1"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('1');return false;" class="tit">강남</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "3"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('3');return false;" class="tit">신촌</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "19"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('19');return false;" class="tit">부천</a></li>
									<li class="bdbCACACA MbdbCACACA <?php if($cam_idx->m_cam == "8"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('8');return false;" class="tit">인천</a></li>
									<li class="bdbCACACA <?php if($cam_idx->m_cam == "16"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('16');return false;" class="tit">안산</a></li>
									<li class="bdbCACACA <?php if($cam_idx->m_cam == "9"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('9');return false;" class="tit">수원</a></li>
									<li class="<?php if($cam_idx->m_cam == "17"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('17');return false;" class="tit">의정부</a></li>
									<li class="<?php if($cam_idx->m_cam == "23"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('23');return false;" class="tit">일산</a></li>
									<li class="<?php if($cam_idx->m_cam == "18"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('18');return false;" class="tit">성남</a></li>
									<li class="<?php if($cam_idx->m_cam == "24"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('24');return false;" class="tit">울산</a></li>
									<li class="<?php if($cam_idx->m_cam == "13"){ ?>on<? }; ?>"><a href="#강사목록리스트" onclick="checkCam('13');return false;" class="tit">부산</a></li>
								</ul>
							</div>
						</div>
						<!-- 탭2// -->
					</div>
				</div>
					<ul class="educationField clearfix">
						<li class="TbdbCACACA MbdbCACACA"><a href="#아트웍 강사목록" id="gp0">아트웍</a></li>
						<li class="TbdbCACACA MbdbCACACA"><a href="#웹디자인 강사목록" id="gp1">웹디자인</a><div></div></li>
						<li class="TbdbCACACA MbdbCACACA"><a href="#편집디자인 강사목록" id="gp2">편집디자인</a></li>
						<li class="TbdbCACACA"><a href="#실내/산업디자인 강사목록" id="gp3">실내/산업디자인</a><div></div></li>
						<li class=""><a href="#게임/영상/마야 강사목록" id="gp4">게임/영상/마야</a><div></div></li>
						<li class=""><a href="#SW개발 강사목록" id="gp5">SW개발</a></li>
						<li class=""><a href="#세무회계/OA 강사목록" id="gp6">세무회계/OA</a><div></div></li>
					</ul>
						<h3><span id="buleColor"></span></h3>
						<ul class="instructorList clearfix">
						<?php
                          foreach($list as $lt){
                          ?>
							<li><a href="#강사프로필 자세히 보기" onclick="viweTeacher('<?=$lt["t_idx"]; ?>');return false;"><img src="http://greenart.co.kr/upimage/subject/teacher/<?=$lt['t_img']; ?>" alt="<?=$lt['t_name']; ?>"><div class="instructorNameBG"><span class="instructorName"><?=$lt['t_name']; ?><span class="position">강사</span></span></div></a></li>
							<?php
                          }
                          ?>
						</ul><!-- instructorList -->
					</div><!-- instructorIntroduction -->
					<div class="curriculumInstructorBG" style="display: none; ">
						<div class="curriculumInstructor clearfix">
						<a href="" class="closeBtn">닫기</a>
							<div class="teacherViewBox">
								
						</div><!-- curriculumInstructor -->
					</div><!-- curriculumInstructorBG -->
				</div><!-- instructorIntroductionBG -->
		</div><!-- contents 끝 -->
	<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function(){/*
      //탭(ul) onoff
		$('.jq_tabonoff>.jq_cont').children().css('display', 'none');
		<%IF CAM_TYPE = "0" THEN%>
		$('.jq_tabonoff>.jq_cont div:first-child').css('display', 'block');
		<%ELSE%>
		$('.jq_tabonoff>.jq_cont div:last-child').css('display', 'block');
		<%END IF%>
		//$('.jq_tabonoff>.jq_tab li:first-child').addClass('on');*/
		$('.jq_tab>li').on('click', function() {
			var index = $(this).parent().children().index(this);
			$(this).siblings().removeClass('on');
			$(this).siblings().children('div').removeClass('triangle');
			$(this).addClass('on');
			$(this).children('div').addClass('triangle');
			$(this).parent().next('.jq_cont').children().hide().eq(index).show();
		});

		$('.educationField>li>a').on('click', function() {
			var tempH = $(this).position().top;
			//alert(tempH);
			$(".curriculumInstructorBG").hide();
			var index = $(this).parent().children().index(this);
			$('.educationField>li>a').parents().children().removeClass("on");
			$(this).addClass('on');
			var regex = /[^0-9]/g;
			var thisId = $(this).attr("id").replace(regex, '');
			var thisText = $(this).text();
			var cam_idx = $("#cam_idx").val();
			$.ajax({
			type: 'post',
			url: "/inner/instructorintroduction_inner",
			dataType: "html",
			data: 'thisId=' + thisId + '&cam_idx=' + cam_idx,
			success: function(data){
				$(".instructorList").html(data);
			}
			});
			$("#campusName").text(campusName(cam_idx));
			$("#buleColor").text(thisText);

		});

		$(".curriculumInstructorBG").hide();
	});
		function viweTeacher(idx){
          var cam_idx = $("#cam_idx").val();
			var w = $(window).width();
			if(w<1080){
			 var h = $(window).height();
			 $(".curriculumInstructor").css({height:h})
			}
			var htmlCode = "";
			$.ajax({
			type: 'post',
			url: "/inner/teacherImgView",
			dataType: "html",
			data: 't_idx=' + idx + '&cam_idx=' + cam_idx,
			success: function(data){
              alert(data);
					htmlCode += "<div class='curriculumInstructorImg'><img src='http://greenart.co.kr/upimage/subject/teacher/"+data['t_img']+"' alt='' /></div>"
					htmlCode += "<ul class=\"curriculumInstructorInfo\">"
					htmlCode += "<li class=\"name\">"+data['t_name']+"<span class=\"positionName\"> 강사</span></li>"+data['t_eudcation']
					htmlCode += "</ul>"
					if (data['t_career'] != ""){
					htmlCode += "<ul class=\"curriculumInstructorCareer\">"
					htmlCode += "<li class=\"careerTitle\">PROJECT</li>"+data['t_career']
					htmlCode += "</ul>"
					}
				$(".teacherViewBox").html(htmlCode);
			}
			});
			$(".curriculumInstructorBG").show();
		}
		$(".closeBtn").on("click",function(e){
			e.preventDefault();
			$(".curriculumInstructorBG").hide();

		});
		function checkCam(cam_idx){
			$("#cam_idx").val(cam_idx);
          $.ajax({
              type: 'post',
              url: "/inner/instructorintroduction_inner",
              dataType: "html",
              data: 'cam_idx=' + cam_idx,
              success: function(data){
                  $(".instructorList").html(data);
              }
			});
		}
	//]]>
	</script>
	<input type="hidden" name="cam_idx" id="cam_idx" value="<?=$manger->m_cam; ?>"/>
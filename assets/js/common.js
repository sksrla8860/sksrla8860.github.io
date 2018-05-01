/*campusList*/
$(function(){
    $(".onlynum").keyup(function () {
      $(this).val($(this).val().replace(/[^0-9]/g, ""));
    });
	var pull=$('#campusListOpen');
			menu=$('.branch ul');
			menuHeight=menu.height();
	$(pull).on('click', function(e){
		e.preventDefault();
		menu.slideToggle();
	});
  $(".curriculumSearchList > li").css({"padding-left":"10% !important !important;", "box-sizing":"boder-box;"});
});
$(window).load(function(){
  /*  페이지네이션 갯수  */
  var pagination = $(".pagination");
  var pageLi = pagination.find("li");
  var pageNum = pageLi.length;
  var Wid = "45" * pageNum;
  pagination.width(Wid);
  
  /*페이지네이션 end  */
});
$(document).ready(function(){
	var loading = $('<img src="/assets/img/Ajax-loader.gif" alt="loading" />').appendTo(document.body).hide();
	$(window).ajaxStart(function(){
		loading.show();
	}).ajaxStop(function() {
		loading.hide();
	});
	if($(window).width() <= 1079){
		swiper.unlockSwipes();
	}
	if($(window).width() >= 1080){
		swiper.lockSwipes();
	}

	if($(window).width() <=639){
		$('.login').parent().addClass("centerAlign");
		$('.campusLocation').parent().addClass("displayNone");
		//$('.join').parent().addClass("displayNone");
		//$('.campusLocation').parent().addClass("displayNone");
	}else if($(window).width() >=640){
		//$('.join').parent().removeClass("displayNone");
		$('.campusLocation').parent().removeClass("displayNone");
	}
	jQuery('.quickTop').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, 300);
		return false;
	});

	var quickView = getCookie('Quick');
	if (quickView){
		$(".quickBG").animate({
			height:0
		},300);
		$(".quickClose").addClass("quickCloseOff");
	}


	/*var select = $("select#pageNavigationStep1");
	select.change(function(){
		jQuery.ajax({
		type:"post",
		url:"/_lib/menu.asp",
		data:"tg="+$(this).val(),
		datatype:"html",
		success:function(strVal){
			$("select#pageNavigationStep2").html(strVal);
			$("#pageNavigationStep2").next("label").text("");
		}
	});
		var select_name = $(this).children("option:selected").text();
		$(this).siblings("label").text(select_name);
	});
	var select1 = $("select#pageNavigationStep2");
	select1.change(function(){
		var select_name = $(this).children("option:selected").text();
		$(this).siblings("label").text(select_name);
	});
	$("#pageNavigationStep1").prev("label").text($("#pageNavigationStep1 option:selected").text());
	$("#pageNavigationStep2").prev("label").text($("#pageNavigationStep2 option:selected").text());
	$("#pageNavigationStep2").find("option:first").attr("selected","selected");
	$("#pageNavigationStep2").change(function(){
		var locationURL = $(this).val();
		if (locationURL){
			location.href=locationURL;
		}
	});*/
});
$(window).resize(function(){
	/*캠퍼스 리스트 변환*/
//	$(".quickClose").addClass("quickCloseOff").text("펴기");
//	$(".quickBG").css("height",0);
	var w=$(window).width();
	if(w>1079 && menu.is(':hidden'))
		{menu.removeAttr('style');}
	if(w <=1079){
		//$('.join').parent().addClass("displayNone");
		swiper.unlockSwipes(); //swiper 잠긴거 풀기
	}else if($(window).width() >=1080){
		//$('.join').parent().removeClass("displayNone");
		swiper.lockSwipes(); //swiper 잠기기
	}
	if(w <=639){
		//$('.join').parent().addClass("displayNone");
		$('.campusLocation').parent().addClass("displayNone");
	}else if($(window).width() >=640){
		//$('.join').parent().removeClass("displayNone");
		$('.campusLocation').parent().removeClass("displayNone");
	}
	var winW = $(window).width();
	var boxh
	if(winW > 1080){
		boxh=52
	}if (winW > 641 && winW <1079){
		 boxh=52
	}if (winW <640){
		boxh=52
	}
		//alert('');
//	if($(".quickConsultBtn ").hasClass('quickConsultBtnBG')){
//		$(".quickConsultBox").addClass('quickConsultBoxOff');
//		$(this).removeClass("quickConsultBtnBG");
//		$(this).text("빠른상담");
//	}
});


/*menu*/
var swiper = new Swiper('.swiper-container', {
	scrollbar: '.swiper-scrollbar',
	scrollbarHide: true,
	slidesPerView: 'auto',
	preventClicks: false,
	//preventClicksPropagation: false
	//centeredSlides: true,
	//spaceBetween: 30,
	grabCursor: true
});
/*
$(".quickConsultBtn").on("click",function(e){
		e.preventDefault();

	if($(this).attr("class") == "quickConsultBtnOff"){
		alert("짐")
		//$(".quickConsultBox").addClass("quickConsultBoxOff");
	}else{
		alert("켜짐")
		$(this).addClass("quickConsultBtnBG");
		$(".quickConsultBox").removeClass("quickConsultBoxOff");
		$(this).text("닫기");
	}
});
*/
$(".quickConsultBtn").on("click",function(e){
		e.preventDefault();

	if($(".quickConsultBtn ").hasClass('quickConsultBtnBG')){
		$(".quickConsultBox").addClass('quickConsultBoxOff');
		$(this).removeClass("quickConsultBtnBG");
		$(this).html("<span class="+"Mblock"+">빠른</span>상담");
	}else{
		$(".quickConsultBox").removeClass('quickConsultBoxOff');
		$(this).addClass('quickConsultBtnBG');
		$(this).text("닫기");
	}
});
/*quick*/
$(".quickClose").on("click",function(){
	var winW = $(window).width();
	var boxh
	if(winW > 1080){
		boxh=52
	}if (winW > 641 && winW <1079){
		 boxh=52
	}if (winW <640){
		boxh=52
	}
	if ($(this).attr("class") == "quickClose"){
		$(".quickBG").animate({
			height:0
		},300);
		setCookie('Quick', 'hideQuick', 1);
		$(this).addClass("quickCloseOff");
		$('.quickConsultBox').addClass("quickConsultBoxOff"); //빠른 상담이 열린 상태에서 quick을 닫으면 빠른상담이 닫힌다.
		//$('.quickConsultBtn ').text("빠른상담");
	}else{
		$(".quickBG").animate({
			height:boxh
		},300);
		setCookie('Quick', '', -1);
		$(this).removeClass("quickCloseOff");
		$('.quickConsultBox ').addClass("quickConsultBoxOff");
		$('.quickConsultBtn').removeClass("quickConsultBtnBG");
		$('.quickConsultBtn').html("<span class="+"Mblock"+">빠른</span>상담"); //빠른 상담이 열린 상태에서 quick을 닫으면 빠른상담이 닫힌후 다시 quick 를 열었을 때 닫기 -> 빠른 상담으로 변경
	}

});


	function setCookie(cName, cValue, cDay){
		var expire = new Date();
		expire.setDate(expire.getDate() + cDay);
		cookies = cName + '=' + escape(cValue) + '; path=/ ';
		if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
		document.cookie = cookies;
		}

		function getCookie(cName) {
		cName = cName + '=';
		var cookieData = document.cookie;
		var start = cookieData.indexOf(cName);
		var cValue = '';
		if(start != -1){
				start += cName.length;
				var end = cookieData.indexOf(';', start);
				if(end == -1)end = cookieData.length;
				cValue = cookieData.substring(start, end);
		}
		return unescape(cValue);
		}

//전화번호 체크
checkPhoneNumber = function(value) {
	var Phonepattern = "/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/";
	value = value.replace(/[-\s]+/g, "");
	return (eval(Phonepattern).test(value)) ;
}
//이메일 체크
checkEmail = function(value){
	var pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
	value = value.replace(/[-\s]+/g, "");
	return (eval(pattern).test(value)) ;
}
//공백제거
Trim = function(string){
	for(;string.indexOf(" ")!= -1;){
		string=string.replace(" ","");
	}
	return string;
}
$('.num_only').css('imeMode','disabled').keyup(function(){
	if( $(this).val() != null && $(this).val() != '' ) {
		$(this).val( $(this).val().replace(/[^0-9]/g, '') );
	}
});
$('form[name=quickFrm]').submit(function(){
	if (!$('#q_agree').is(':checked')){
		alert("약관 및 정책에 동의해야 합니다.");
		$('#q_agree').focus();
		return false;
	}
	if (!Trim($('#q_course').val())){
		alert("과정을 선택해주세요.");
		$('#q_course').val('');
		return false;
	}
	if (!$('#q_cam_idx').val()){
		alert("캠퍼스를 선택하세요.");
		$('#q_cam_idx').focus();
		return false;
	}
	if (!Trim($('#q_name').val())){
		alert("이름을 입력해주세요.");
		$('#q_name').focus();
		return false;
	}
	if (!Trim($('#q_tel1').val())){
		alert("연락처를 입력해주세요.");
		$('#q_tel1').focus();
		return false;
	}
	if (!Trim($('#q_tel2').val())){
		alert("연락처를 입력해주세요.");
		$('#q_tel2').focus();
		return false;
	}
	if (!Trim($('#q_tel3').val())){
		alert("연락처를 입력해주세요.");
		$('#q_tel3').focus();
		return false;
	}
	var telNumber = jQuery('#q_tel1').val()+"-"+jQuery('#q_tel2').val()+"-"+jQuery('#q_tel3').val();
	if (!checkPhoneNumber(telNumber)){
		alert("전화번호나 핸드폰번호의 형식이 맞지 않습니다. \n정확하게 입력해주세요.");
		return false;
	}
});

//길이체크
lengCheck = function(val1,val2){
	if (val1 < val2){
		return false;
	}
	return true;
}

isCharChk = function(strTxt){
	var str = strTxt;
	if (str.length == 0) return false;
	str = str.toUpperCase();
	for(var i=1;i < str.length;i++) {
  if(!(('A' <= str.charAt(i) && str.charAt(i) <= 'Z') || ('0' <= str.charAt(i) && str.charAt(i) <= '9') || str.charAt(i) == '_')){
		return false;
	}
 }
 return true;
}


function forRowspan(tableID,blockNumber){
	$('#'+tableID).each(function() {
		var table = this;
		blockNumber = eval(blockNumber);
		$.each(blockNumber /* 합칠 칸 번호 */, function(c, v) {
			var tds = $('>tbody>tr>td:nth-child(' + v + ')', table).toArray(), i = 0, j = 0;
			for(j = 1; j < tds.length; j ++) {
				if(tds[i].innerHTML != tds[j].innerHTML) {
					$(tds[i]).attr('rowspan', j - i);
					i = j;
					continue;
				}
				$(tds[j]).hide();
			}
			j --;
			if(tds[i].innerHTML == tds[j].innerHTML) {
				$(tds[i]).attr('rowspan', j - i + 1);
			}
		});
	});
}

jQuery.fn.rowspan = function(colIdx) {
	return this.each(function(){
		var that;
		$('tr', this).each(function(row) {
			$('td:eq('+colIdx+')', this).filter(':visible').each(function(col) {
				if ($(this).html() == $(that).html()) {
					if ($(that).attr("rowSpan") == "undifined" || $(that).attr("rowSpan") == window.undifined){
						rowspan = that.getAttribute("rowSpan");
					}else{
						rowspan = $(that).attr("rowSpan");
					}
					if (rowspan == undefined) {
						$(that).attr("rowSpan",1);
						rowspan = $(that).attr("rowSpan");
					}
					rowspan = parseInt(rowspan)+1;
					if ($(that).attr("rowSpan") == "undifined" || $(that).attr("rowSpan") == window.undifined){
						that.setAttribute("rowSpan",rowspan);
					}else{
						$(that).attr("rowSpan",rowspan); // do your action for the colspan cell here
					}
					$(this).hide(); // .remove(); // do your action for the old cell here
				} else {
					that = this;
				}
				that = (that == null) ? this : that; // set the that if not already set
			});
		});
	});
}
$(document).ready(function(){
	var w = $(window).width();
	if(w>1079){
		$(function(){
			function vacationBtn_Moving(){
				$('.vacationAdvanceBtn').animate({'bottom':'85px'},1200,vacationBtn_Moving).animate({'bottom':'55px'},1200,vacationBtn_Moving);
			}
			vacationBtn_Moving();
		});
	};
	$(window).on('scroll', function(){
		var sc = $(this).scrollTop();
		var plus1 = $('.whole > .header').height();
		var plus2 = $('#contents>.curriculumPageTitleBG').height();
		var plus3 = $('#contents>.pageTitleBG').height();

		var plus0 = plus1 + plus2 + plus3 + 42;
		var win_h = $(this).height();
		var header_h =$('.pageNavigationBG').height();

		if(sc >= plus0){
			$('.pageNavigationBG').addClass('scroll');
          $("#progressbar").addClass('disB');
          var scrollTop = $(window).scrollTop();
          var docHeight = $(document).height();
          var winHeight = $(window).height();
          var scrollPercent = (scrollTop) / (docHeight - winHeight);
          var scrollPercentRounded = Math.round(scrollPercent*100);

          $('#progressbar').css('width', scrollPercentRounded + "%");;
		}else{
			$('.pageNavigationBG').removeClass('scroll');
          $("#progressbar").removeClass('disB');
		}
	});
	$(window).on('resize', function(){
		var w = $(window).width();
		if(w>1079){
				$(function(){
					function vacationBtn_Moving(){
						$('.vacationAdvanceBtn').animate({'bottom':'85px'},1200,vacationBtn_Moving).animate({'bottom':'55px'},1200,vacationBtn_Moving);
					};
					vacationBtn_Moving();
				});
			}else if(w<1080){
				$('.vacationAdvanceBtn').stop(true);
			};
	});

	var ww = $(window).width();
	if(ww > 1079){
		$('.tel > a').on('click',function(e){
			 e.preventDefault();
		});
	}else{
		$('.tel > a').on('click',function(e){
			e.pointerEvents()
		});
	};
	$(window).on('resize', function(){
		var ww = $(window).width();
		if(ww > 1079){
			$('.tel > a').on('click',function(e){
				 e.preventDefault();
			});
		}else{
			$('.tel > a').on('click',function(e){
				e.pointerEvents()
			});
		};
	});

    var pname = $(location).attr('pathname').split('/');
    //console.log(pname[1], pname[2]);
    var gpParameter = $(location).attr('pathname').split('/');
    
    //console.log(gpParameter);
    var sMenu1 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/info/whyGreen'>왜 그린인가?</option><option value='/info/greenIntroduce'>기관소개</option><option value='/info/greenHistory'>기관연혁</option><option value='/info/greenbusiness'>사업영역</option><option value='/info/instructorintroduction'>강사소개</option><option value='/info/affiliateUniversityBenefits'>제휴대학 혜택</option><option value='/info/affiliationsSuggestions_list'>제휴서비스</option></select>");
    var sMenu2 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/curriculum/curriculum_List/gp/0'>아트웍</option><option value='/curriculum/curriculum_List/gp/1'>웹디자인</option><option value='/curriculumcurriculum/curriculum_List/gp/2'>편집디자인</option><option value='/curriculum/curriculum_List/gp/3'>실내/산업디자인</option><option value='/curriculum/curriculum_List/gp/4'>게임/영상/마야</option><option value='/curriculum/curriculum_List/gp/5'>SW개발</option><option value='/curriculum/curriculum_List/gp/6'>세무회계/OA</option><option value='/curriculum/curriculum_List/gp/7'>단과/자격증</option><option value='/curriculum/supportSystem'>지원제도안내</option></select>");
    var sMenu3 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/community/notice_list'>공지사항</option><option value='/community/student_interview'>수강후기</option><option value='/community/campusEvents'>캠퍼스 행사</option><option value='/community/greenMedia'>그린미디어</option></select>");
    var sMenu4 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/portfolio/portfolio_list/1'>인터렉티브웹</option><option value='/portfolio/portfolio_list/9'>프론트엔드웹</option><option value='/portfolio/portfolio_list/2'>편집디자인</option><option value='/portfolio/portfolio_list/3'>건축인테리어</option><option value='/portfolio/portfolio_list/4'>영상 / 마야</option><option value='/portfolio/portfolio_list/8'>자바개발자</option><option value='/portfolio/portfolio_list/10'>게임 / 원화</option><option value='/portfolio/portfolio_list/11'>아트웍</option></select>");
    var sMenu5 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/servicecenter/cust_pay'>온라인결제</option><option value='/servicecenter/online_consultation'>온라인상담</option><option value='/servicecenter/tuition_fee'>수강료조회</option><option value='/servicecenter/locationGuide'>캠퍼스위치조회</option><option value='/servicecenter/CorporateGroupTraining'>기업단체교육</option><option value='/servicecenter/universityCustomizedEducation'>대학맞춤교육</option></select>");
    var sMenu6 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/jobcenter/GreenEmploymentSupportSystem'>취업지원시스템</option><option value='/jobcenter/employmentManager'>취업담당자안내</option><option value='/jobcenter/employList'>취업현황</option><option value='/jobcenter/successStories'>취업후기</option></select>");
    var sMenu7 = ("<select id='pageNavigationStep2' onchange='location.href=this.value'><option value=''>- 메뉴선택 -</option><option value='/ncs/NationalCompetencyStandardsCenterV2'>NCS소개</option><option value='/ncs/GreenNationalCompetencyStandardsCenter'>그린NCS지원센터</option></select>");

    if(pname[1] == 'info'){
      $('#pageNavigationStep1').val('1').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu1);
      if(pname[2] == 'whyGreen'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[2] == 'greenIntroduce'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      }else if(pname[2] == 'greenHistory'){
        $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
      }else if(pname[2] == 'greenbusiness'){
        $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
      }else if(pname[2] == 'instructorintroduction'){
        $('#pageNavigationStep2').find('option:eq(5)').prop('selected', true);
      }else if(pname[2] == 'affiliateUniversityBenefits'){
        $('#pageNavigationStep2').find('option:eq(6)').prop('selected', true);
      }else if(pname[2] == 'affiliationsSuggestions_list'){
        $('#pageNavigationStep2').find('option:eq(7)').prop('selected', true);
      } // 그린소개
    }else if(pname[1] == 'curriculum'){
      $('#pageNavigationStep1').val('2').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu2);
      if(pname[2] == 'supportSystem'){
        $('#pageNavigationStep2').find('option:eq(9)').prop('selected', true);
      }
      // 교육과정
    }else if(pname[1] == 'community'){
      $('#pageNavigationStep1').val('3').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu3);
      if(pname[2] == 'notice_list' || pname[2] == 'notice_view'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[2] == 'student_interview' || pname[2] == 'student_view'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      }else if(pname[2] == 'campusEvents' || pname[2] == 'campusEvents_view'){
        $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
      }else if(pname[2] == 'greenMedia' || pname[2] == 'greenMedia_view'){
        $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
      } // 커뮤니티
    }else if(pname[1] == 'portfolio'){
      $('#pageNavigationStep1').val('4').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu4);
      if(pname[3] == '1'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[3] == '9'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      }else if(pname[3] == '2'){
        $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
      }else if(pname[3] == '3'){
        $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
      }else if(pname[3] == '4'){
        $('#pageNavigationStep2').find('option:eq(5)').prop('selected', true);
      }else if(pname[3] == '8'){
        $('#pageNavigationStep2').find('option:eq(6)').prop('selected', true);
      }else if(pname[3] == '10'){
        $('#pageNavigationStep2').find('option:eq(7)').prop('selected', true);
      }else if(pname[3] == '11'){
        $('#pageNavigationStep2').find('option:eq(8)').prop('selected', true);
      }// 포트폴리오
    }else if(pname[1] == 'servicecenter'){
      $('#pageNavigationStep1').val('5').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu5);
      if(pname[2] == 'cust_pay'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[2] == 'online_consultation'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      }else if(pname[2] == 'tuition_fee'){
        $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
      }else if(pname[2] == 'locationGuide'){
        $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
      }else if(pname[2] == 'CorporateGroupTraining'){
        $('#pageNavigationStep2').find('option:eq(5)').prop('selected', true);
      }else if(pname[2] == 'universityCustomizedEducation' || pname[2] == 'universityCustomizedEducation_Apply'){
        $('#pageNavigationStep2').find('option:eq(6)').prop('selected', true);
      } // 고객센터
    }else if(pname[1] == 'jobcenter'){
      $('#pageNavigationStep1').val('6').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu6);
      if(pname[2] == 'GreenEmploymentSupportSystem'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[2] == 'employmentManager'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      }else if(pname[2] == 'employList'){
        $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
      }else if(pname[2] == 'successStories' || pname[2] == 'successStories_view'){
        $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
      } // 취업센터
    }else if(pname[1] == 'ncs'){
      $('#pageNavigationStep1').val('7').prop('selected', true);
      $('#pageNavigationStep2').remove();
      $('.pageNavigationStepBox2').append(sMenu7);
      if(pname[2] == 'NationalCompetencyStandardsCenterV2'){
        $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
      }else if(pname[2] == 'GreenNationalCompetencyStandardsCenter'){
        $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
      } // NCS지원센터
    };

    if(gpParameter[4] == '0'){
      $('#pageNavigationStep2').find('option:eq(1)').prop('selected', true);
    }else if(gpParameter[4] == '1'){
      $('#pageNavigationStep2').find('option:eq(2)').prop('selected', true);
    }else if(gpParameter[4] == '2'){
      $('#pageNavigationStep2').find('option:eq(3)').prop('selected', true);
    }else if(gpParameter[4] == '3'){
      $('#pageNavigationStep2').find('option:eq(4)').prop('selected', true);
    }else if(gpParameter[4] == '4'){
      $('#pageNavigationStep2').find('option:eq(5)').prop('selected', true);
    }else if(gpParameter[4] == '5'){
      $('#pageNavigationStep2').find('option:eq(6)').prop('selected', true);
    }else if(gpParameter[4] == '6'){
      $('#pageNavigationStep2').find('option:eq(7)').prop('selected', true);
    }else if(gpParameter[4] == '7'){
      $('#pageNavigationStep2').find('option:eq(8)').prop('selected', true);
    };

    $("#pageNavigationStep1").on('change', function(){
        var s1Val = $(this).val();
        if(s1Val == 1){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu1);
        }else if(s1Val == 2){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu2);
        }else if(s1Val == 3){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu3);
        }else if(s1Val == 4){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu4);
        }else if(s1Val == 5){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu5);
        }else if(s1Val == 6){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu6);
        }else if(s1Val == 7){
            $('#pageNavigationStep2').remove();
            $('.pageNavigationStepBox2').append(sMenu7);
        };
    });
});

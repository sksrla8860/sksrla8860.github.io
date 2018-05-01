var slider = "";
		$(function() {
      $('#slides').slidesjs({
        height: 500,
        play: {
          active: true,
          auto: true,
          interval: 5000,
          swap: true,
					pauseOnHover: true,
          restartDelay: false
        }
      });

		slider = $('.curriculumSearchList').bxSlider({
				minSlides: 1,
				maxSlides: 4,
				pager:false,
				slideWidth: 230,
				slideMargin: 25
			});
    });
		$('.onlineAdvanceReservationList').bxSlider({
			mode: 'vertical',
			auto: 'true',
			pager:false,
			controls:false,
			autoControls:false
		});
			$('.onlineAdvanceReservationList2').bxSlider({
			mode: 'vertical',
			auto: 'true',
			pager:false,
			controls:false,
			autoControls:false
		});
		$('.portfolio').bxSlider({
			auto: 'true',
			controls:false
		});

		$('.beginningScheduleList li').on('mouseover focus',function(){
			$(this).children().children(".beginningScheduleCurri").addClass("displayNone");
			$(this).children().children(".beginningScheduleDay").removeClass("displayNone");
		});
		$('.beginningScheduleList li').on('mouseleave ',function(){
			$(this).children().children(".beginningScheduleDay").addClass("displayNone");
			$(this).children().children(".beginningScheduleCurri").removeClass("displayNone");
		});
		$(document).ready(function(){
			var select = $("select#studentSelect");
			select.change(function(){
					var select_name = $(this).children("option:selected").text();
					$(this).siblings("label").text(select_name);
			});
			var select = $("select#curriculumSelect");
			select.change(function(){
					var select_name = $(this).children("option:selected").text();
					$(this).siblings("label").text(select_name);
			});
			/* pagination 가운데 정렬 코딩*/
			var paginationWidth = $('.slidesjs-pagination').width();
			var slideWidth=$('.slidesjs-container').width();
				left = slideWidth/2-paginationWidth/2;
				$('.slidesjs-pagination').css({left:left })
			/*		*/
		});
			$(window).resize(function(){
			var paginationWidth = $('.slidesjs-pagination').width();
			var slideWidth=$('.slidesjs-container').width();
				left = slideWidth/2-paginationWidth/2;
				$('.slidesjs-pagination').css({left:left });
			});
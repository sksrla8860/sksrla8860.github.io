    $(function () {
        var w = $(window).width();
        if(w < 1080){
        		var b_wh = $('.main_slide').width();
				$(".main_slide").height(b_wh*0.532400);
              $('.beginningScheduleList').width("100%");
        }else if(w > 1079){
          var listN = $('.beginningScheduleList').find('li').length;
          var ulBox = $('.beginningScheduleList');
          if(listN == 6){
            ulBox.width(1080);
          }else if(listN == 5){
            ulBox.width(900);
          }else if(listN == 4){
            ulBox.width(720);
          }else if(listN == 3){
            ulBox.width(540);
          }else if(listN == 2){
            ulBox.width(360);
          }else if(listN == 1){
            ulBox.width(180);
          }
      };

      $(window).on("resize",function(){
                  var w = $(window).width();
        if(w < 1080){
          var b_wh = $('.main_slide').width();
          $(".main_slide").height(b_wh*0.532400);
          $('.beginningScheduleList').width("100%");
        }else if(w > 1079){
          var listN = $('.beginningScheduleList').find('li').length;
          var ulBox = $('.beginningScheduleList');
          if(listN == 6){
            ulBox.width(1080);
          }else if(listN == 5){
            ulBox.width(900);
          }else if(listN == 4){
            ulBox.width(720);
          }else if(listN == 3){
            ulBox.width(540);
          }else if(listN == 2){
            ulBox.width(360);
          }else if(listN == 1){
            ulBox.width(180);
          }
        };
      });

      if(w < 639){
          $('.slidesjs-play').css({'left':'calc(50% + 55px)'});
      };
});
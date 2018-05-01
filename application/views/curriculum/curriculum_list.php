<link rel="stylesheet" type="text/css" href="/assets/css/curriculum/curriculumList.css"/>
		<div class="curriculumListBG">
		<!-- 	<%If vaCnt > 0 Or emVaCnt > 0 Then%>
			<div class="reservationBtns">
				<%If vaCnt > 0 Then%><a href="/curriculum/semesterOpeningProcessInformation.asp" class="advanceReservationBtn regular">정규과정 사전예약 안내</a><%End If%><%If emVaCnt > 0 Then%><a href="/curriculum/semesterOpeningProcessInformationjob.asp" class="advanceReservationBtn unemployed">실업자 국비지원 사전예약하기</a><%End If%>
			</div>reservationBtns
			<%End If%> -->
			<div class="curriculumListBox">
				<h3 class="curriculumListGroupName unemployment">· 일반/실업자 국비과정</h3>
				<ul class="curriculumList clearfix">
				<?php
                  if($list['subcode'] = 1){
                  foreach($list as $lt){
                  ?>
					<li>
						<a href="/curriculum/curriculum_detail/gp/<?=$this->uri->segment(4); ?>/<?=$lt['susidx']; ?>">
							<h4 class="ellipsisStyle"><?=$lt["subname"]; ?></h4>
							<div class="curriculumListImg"><img src="http://greenart.co.kr/upimage/subject/<?=$lt['subimg']; ?>" alt="<?=$lt['subname']; ?>"/></div><!-- curriculumListImg -->
						</a>
					</li>
					<?php
                    }
                  }
                  ?>
				</ul>
				<h3 class="curriculumListGroupName employee">· 일반/재직자 국비과정</h3>
				<ul class="curriculumList clearfix">
				<?php
                  if($list['subcode'] = 2){
                  foreach($list as $lt){
                  ?>
					<li>
						<a href="/curriculum/curriculum_detail/gp/<?=$this->uri->segment(4); ?>/<?=$lt['susidx']; ?>">
							<h4 class="ellipsisStyle"><?=$lt["subname"]; ?></h4>
							<div class="curriculumListImg"><img src="http://greenart.co.kr/upimage/subject/<?=$lt['subimg']; ?>" alt="<?=$lt['subname']; ?>"/></div><!-- curriculumListImg -->
						</a>
					</li>
					<?php
                    }
                  }
                  ?>
				</ul>
			</div>
		</div><!-- curriculumListBG -->
		</div><!-- contents 끝 -->
	<script src="/assets/js/rwd.js"></script>
	<script type="text/javascript">
      $(function(){
          if($(window).width() <=640){
              var w = $('.curriculumList li').width();
              $('.curriculumList li').height(w);
              $('.curriculumList li h4').removeClass('ellipsisStyle');
              $('.curriculumList li h4').addClass('ellipsisLine3');
              var h = (w -$('.curriculumList li h4').height())/2;
              $('.ellipsisLine3').css({top:h})
          }
          if($('.curriculumListBG').width() > 623){
              $('.curriculumList li').removeAttr("style");
                  $('.curriculumList li h4').removeClass('ellipsisLine3');
                  $('.curriculumList li h4').addClass('ellipsisStyle');
          }
          $(window).resize(function(){
              if($('curriculumListBG').width() <= 640){
                  var w = $('.curriculumList li').width();
                  $('.curriculumList li').height(w);
                  $('.curriculumList li h4').removeClass('ellipsisStyle');
                  $('.curriculumList li h4').addClass('ellipsisLine3');
              var h = (w -$('.curriculumList li h4').height())/2;
              $('.ellipsisLine3').css({top:h})
              }
              if($(window).width() > 640){
                  $('.curriculumList li').removeAttr("style");
                  $('.curriculumList li h4').removeClass('ellipsisLine3');
                  $('.curriculumList li h4').addClass('ellipsisStyle');
              }
              if($('.curriculumListBG').width() > 623){
                  $('.curriculumList li').removeAttr("style");
                  $('.curriculumList li h4').removeClass('ellipsisLine3');
                  $('.curriculumList li h4').addClass('ellipsisStyle');
              }
          });
        });
		</script>
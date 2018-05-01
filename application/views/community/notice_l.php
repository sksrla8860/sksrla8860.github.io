<link rel="stylesheet" type="text/css" href="/assets/css/community/noticeList.css"/>
			<div class="noticeListBG">
				<div class="noticeSearchBox">
					<form name="schFrm" id="schFrm" method="post">
					<div class="noticeSearchBG"><input type="text" id="noticeSearch" name="sch_val" value="" onkeypress="board_search_enter(document.q);" /><button class="noticeSearchBtn" type="submit">검색</button></div>
					</form>
				</div><!-- noticeSearchBox -->
				<ul class="noticeList">
				<?php
                  foreach($list as $lt)
                  {
                    ?>
					<li class="clearfix"><div class="noticeListNum"><?=$intListNumber; ?></div><div class="noticeListTitle ellipsisStyle"><a href="notice_view/<?=$lt->b_idx; ?>"><?=$lt->b_name; ?></a></div><div class="noticeListDate"><?=$lt->b_date; ?></div></li>
                      <?php
                    $intListNumber--;
                      }
                  ?>
				</ul>
				<?= $pagination; ?>
			</div><!-- noticeListBG -->
		</div><!-- contents 끝 -->
<script type="text/javascript">
      $(document).ready(function(){
        $(".noticeSearchBtn").click(function(){
          if($("#noticeSearch").val() ==''){
            var act = '/community/notice_list/';
            $("#schFrm").attr('action', act).submit();
          }else{
            var act = '/community/notice_list/page/1/q/'+$("#noticeSearch").val();
            $("#schFrm").attr('action', act).submit();
          };
        });
      });
      
      function board_search_enter(form){
        var keycode = window.event.keyCode;
        if(keycode == 13) $("#search_btn").click();
      }
</script>

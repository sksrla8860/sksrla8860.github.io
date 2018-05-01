<link rel="stylesheet" type="text/css" href="/assets/css/ncs/NationalCompetencyStandardsCenterV2_test.css"/>
		<!-- contents 시작 -->
    <div class="container">
        <div class="section">
        	<div class="studentViewTitleBox">
        		<div class="studentViewTitle"><?=$view["btitle"]; ?></div>
        								<ul class="studentViewInfo clearfix">
        									<li class="date">작성일 : <?=$view["bregdate"]; ?></li>
        									<li>조회수 : <?=$view["breadcount"]; ?></li>
        								</ul>
        	</div>
						<div class="studentViewText">
							<?=$view["bcontent"]; ?>
						</div>
        </div>
        <div class="noticeListBG">
        	<ul class="noticeList">
             <?php
              foreach($list as $lt)
              {
                ?>
              <li class="clearfix">
        			<div class="noticeListNum"><?=$intListNumber; ?></div>
        			<div class="noticeListTitle ellipsisStyle">
        				<a href="/ncs/ddd<?=$lt["bidx"]; ?>"><?=$lt["btitle"]; ?></a>
        			</div>
        			<div class="noticeListDate"><?=$lt["bregdate"]; ?></div>
        		</li>
        		<?php
                $intListNumber--;
              }
              ?>
        	</ul>
        </div>
        <div class="listBox">
          <?= $pagination; ?>
        </div>
        <script type="text/javascript">
			$(function(){
				var ww = $(window).width();
				if(ww < 1080){
					var h3w = $(".section>h3").width();
					var img1w = $(".section>.img1").width();
					var img2w = $(".section>.img2").width();
					$(".section>h3").height(h3w*0.371316);
					$(".section>.img1").height(img1w*0.480822);
					$(".section>.img2").height(img2w*0.686301);
				};
				$(window).on("resize",function(){
					var ww = $(window).width();
					if(ww < 1080){
						var h3w = $(".section>h3").width();
						var img1w = $(".section>.img1").width();
						var img2w = $(".section>.img2").width();
						$(".section>h3").height(h3w*0.371316);
						$(".section>.img1").height(img1w*0.480822);
						$(".section>.img2").height(img2w*0.686301);
					};
				});
			});
		</script>
    </div>
		<!-- contents 끝 -->
	</div><!-- whole -->
	<script src="/assets/js/common.js"></script>
</script>
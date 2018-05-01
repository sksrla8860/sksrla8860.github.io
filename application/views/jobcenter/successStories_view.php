<link rel="stylesheet" type="text/css" href="/assets/css/community/studentView.css" />
  <?php // var_dump($xml);
?>
		<!-- contents 시작 -->
			<div class="container">
			 <div class="studentViewBG">
				<div class="studentViewBox">
					<div class="titleInfoBox">
						<div class="studentViewTitle"><?=$xml['stitle']; ?></div>
						<ul class="studentClass clearfix">
							<li>과정명 : <?=$xml['ssub']; ?></li>
							<li>취업분야 : <?=$xml['sgubun']; ?></li>
						</ul>
						<ul class="studentViewInfo clearfix">
							<li>작성자 : <?if(isset($lt["sname"])){ mb_substr($lt["sname"], 0, 2);} ?>*</li>
							<li>작성일 : <?=$xml['regdate']; ?></li>
							<li>조회수 : <?= $xml['sreadcount']; ?></li>
							<li class="studentViewBar"><span>캠퍼스 : <?=$xml['camname']; ?></span></li>
						</ul>
						<div class="studentViewText"><?=$xml['scontent']; ?></div><!-- studentViewText -->
					</div><!-- titleBox -->
					<div class="btns"><a href="successStories.asp?<%=lnkParam%>" class="interviewListBtn">목 록</a></div>
				</div><!-- studentViewBox -->
			 </div><!-- studentViewBG -->
			</div><!-- container -->
		</div><!-- contents -->
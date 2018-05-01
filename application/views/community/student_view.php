<link rel="stylesheet" type="text/css" href="/assets/css/community/studentView.css"/>
		<!-- contents 시작 -->
			<div class="container">
			 <div class="studentViewBG">
				<div class="studentViewBox">
					<div class="titleInfoBox">
						<div class="studentViewTitle"><?=$xml["possubject"]; ?></div>
						<ul class="studentViewInfo clearfix">
							<li>작성자 : <?=$xml["username"]; ?>*</li>
							<li>작성일 : <?=$xml["regdate"]; ?></li>
							<li>조회수 : <?=$xml["posreadcount"]; ?></li>
							<li class="studentViewBar"><span>캠퍼스 : <?=$xml["camname"]; ?></span></li>
						</ul>
						<div class="studentViewText">
							<?=$xml["poscontents"]; ?>
						</div><!-- studentViewText -->
					</div><!-- titleBox -->
					<div class="btns"><a href="/community/student_interview" class="interviewListBtn">목 록</a></div>
				</div><!-- studentViewBox -->
			 </div><!-- studentViewBG -->
			</div><!-- container -->
		</div><!-- contents -->
		<!-- contents 끝 -->
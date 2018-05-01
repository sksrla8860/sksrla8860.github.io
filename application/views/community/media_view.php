<link rel="stylesheet" type="text/css" href="/assets/css/community/greenDesignNews.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/community/noticeView.css"/>
<style type="text/css">
.noticeViewText {margin:0 auto;}
.noticeViewText table {width:100%;text-align:center;}
</style>
			<div class="noticeViewBG">
				<div class="noticeViewTitleBox">
					<div class="noticeViewTitle"><?=$xml["c_title"]; ?></div>
					<div class="noticeInfo clearfix"><div class="Mclearfix"><div class="noticeCam">작성일: <?=$xml["c_regdate"]; ?></div></div><div class="noticeRead">조회수: <?=$xml["c_visit"]; ?></div></div>
				</div>
				<div class="noticeViewText"><?=$xml["c_content"]; ?></div>
				<a href="/community/greenMedia" class="noticeViewListBtn">목 록</a>
			</div><!-- noticeViewBG  -->
		</div><!-- contents -->
		<!-- contents 끝 -->
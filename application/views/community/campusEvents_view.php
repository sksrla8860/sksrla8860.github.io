<link rel="stylesheet" type="text/css" href="/assets/css/community/noticeView.css"/>
			<div class="noticeViewBG">
				<div class="noticeViewTitleBox">
					<div class="noticeViewTitle"><?=$xml['rtitle']; ?></div>
					<div class="noticeInfo clearfix"><div class="Mclearfix"><div class="noticeCam"><?=getCampusName($xml["camidx"]); ?></div></div><div class="Mclearfix paddingT14"><div class="noticeDate">작성일: <?=$xml['regdate']; ?></div><div class="noticeRead">조회수: <?=$xml['readcnt']; ?></div></div></div>
				</div>
				<div class="noticeViewText"><?=toOutput($xml['rcontents']); ?></div>
				<a href="campusEvents.asp?<%=lnkParam%>" class="noticeViewListBtn">목 록</a>
			</div><!-- noticeViewBG  -->
		</div><!-- contents 끝 -->
<script type="text/javascript">
$(function() {
if($(".noticeViewText img").size() > 0) {
	$(".noticeViewText img").each(function() {
			var imgObj = new Image();
			imgObj.src = $(this).attr("src");
			$(this).css("margin","0 auto");
	});
}
});
</script>
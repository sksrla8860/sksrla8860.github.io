<link rel="stylesheet" type="text/css" href="/assets/css/community/noticeView.css"/>
			<div class="noticeViewBG">
				<div class="noticeViewTitleBox">
					<div class="noticeViewTitle"><?=$views->b_name; ?></div>
					<div class="noticeInfo clearfix"><div class="Mclearfix"><div class="noticeCam"></div></div><div class="Mclearfix paddingT14"><div class="noticeDate">작성일: <?=$views->b_date; ?></div><div class="noticeRead">조회수: <?=$views->b_count; ?></div></div></div>
				</div>
				<div class="noticeViewText"><?=$views->b_contents; ?>
				<ul class="noticeBtn4 clearfix">
				<li><a href="<%=returl%>servicecenter/tuition_fee.asp">수강료조회</a></li>
				<li><a href="<%=returl%>servicecenter/online_consultation.asp">온라인상담</a></li>
				<li><a href="<%=returl%>customer/cust_pay.asp">온라인결제</a></li>
				<li><a href="<%=returl%>servicecenter/locationGuide.asp">캠퍼스위치</a></li>
			</ul>
				</div>
				<a href="notice_list.asp?<%=lnkParam%>" class="noticeViewListBtn">목 록</a>
			</div><!-- noticeViewBG  -->
		</div><!-- contents 끝 -->
<script type="text/javascript">
	$(document).ready(function(){
		var tempW = $(window).width();
		if(tempW < 641){
			$(".moveTab").find('img').each(function(){
				var tempString = $(this).attr('src');
				tempString = tempString.replace("noticeTab","MnoticeTab");
				$(this).attr('src', tempString);
			});
		}
	});
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
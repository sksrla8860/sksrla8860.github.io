//$(function(){$gnb=$('.gnb');$gnb1d=$('.gnb > ul > li > a');$sub=$('.gnb ul li div:visible');$sub.hide();$gnb1d.on('mouseover focus',function(){$sub.stop().hide();$(this).addClass("gnbBoxOver");$(this).next('div').stop().show()}).on('mouseleave focusout',function(){$(this).removeClass("gnbBoxOver")});$sub.on('mouseleave',function(){$sub.stop().hide()});$sub.find('a:last').on('focusout',function(){$sub.stop().hide()});$gnb.on("mouseleave",function(){$sub.stop().hide()});$sub.on("mouseover focusin",function(){$(this).parent().find(">a").addClass("gnbBoxOver")}).on("mouseleave focusout",function(){$(this).parent().find(">a").removeClass("gnbBoxOver")})});

$(function(){
	var gnb=$('.gnb');
	var gnb1d=$('.gnb>ul>li>a');
	var sub=$('.gnb>ul ul');
	var subv=$('.gnb>ul ul:visible');
	sub.hide();

/*	$gnb1d.on('mouseover focus',function(){
		$subv.slideUp(200)
		$(this).next('ul:hidden').slideDown(200)
		$(this).addClass('borderHoverEvent');
	})*/

gnb1d.on('mouseover',function(){
		gnb1d.removeClass("gnbBoxOver");
		sub.stop().slideUp(200);
		//$(this).addClass("gnbBoxOver");
		$(this).addClass("gnbBoxOver").next('ul').slideDown(200);//안보여지고 있는 것에 마우스오버가 된다면 slideDown을 하여라.
	});
/*	$sub.on('mouseleave',function(){
		$subv.slideUp(200)
		$(this).parent().removeClass('borderHoverEvent');
	})
*/
	gnb.on("mouseleave",function(){
		gnb1d.removeClass("gnbBoxOver");
		sub.stop().slideUp(200);
	});

//1단 메뉴에서 마우스가 떠났을때 2단 메뉴 사라지기
//마우스 오버했을 때 border 생기는것!
	/*
		$sub.find('a:last').on('focusout',function(){
		$(this).parent().parent().slideUp()
	})
	*/
})


function campusName(vals){
	var sDomain;
	if (vals=="1")
	{ sDomain = "강남캠퍼스"; }
	else if  (vals=="2")
	{ sDomain = "종로캠퍼스"; }
	else if  (vals=="3")
	{ sDomain = "신촌캠퍼스"; }
	else if  (vals=="4")
	{ sDomain = "신도림캠퍼스"; }
	else if  (vals=="5")
	{ sDomain = "그린디자인IT아카데미"; }
	else if  (vals=="6")
	{ sDomain = "게임아카데미"; }
	else if  (vals=="7")
	{ sDomain = "안양캠퍼스"; }
	else if  (vals=="8")
	{ sDomain = "인천캠퍼스"; }
	else if  (vals=="9")
	{ sDomain = "수원캠퍼스"; }
	else if  (vals=="10")
	{ sDomain = "청주캠퍼스"; }
	else if  (vals=="11")
	{ sDomain = "대전캠퍼스"; }
	else if  (vals=="12")
	{ sDomain = "대구캠퍼스"; }
	else if  (vals=="13")
	{ sDomain = "부산캠퍼스"; }
	else if  (vals=="15")
	{ sDomain = "천안캠퍼스"; }
	else if  (vals=="16")
	{ sDomain = "안산캠퍼스"; }
	else if  (vals=="17")
	{ sDomain = "의정부캠퍼스"; }
	else if  (vals=="18")
	{ sDomain = "건대캠퍼스"; }
	else if  (vals=="19")
	{ sDomain = "부천캠퍼스"; }
	else if  (vals=="22")
	{ sDomain = "전주캠퍼스"; }
	else if  (vals=="23")
	{ sDomain = "일산캠퍼스"; }
	else if  (vals=="24")
	{ sDomain = "울산캠퍼스"; }
	else if  (vals=="25")
	{ sDomain = "대전중앙캠퍼스"; }
	else
	{  sDomain = "그린컴퓨터아트학원";  }
	return sDomain
}
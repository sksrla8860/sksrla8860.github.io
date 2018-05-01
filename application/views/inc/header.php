<body>
  <div class="whole">
    <div class="header">
			<div class="campus">
				<div class="branch clearfix">
					<a id="campusListOpen" href="#">캠퍼스 선택하기</a>
					<ul class="clearfix floatLeft">
						<li class="greenArtLogo"><a href="/" title="그린컴퓨터아트학원 이동" id="greenArtLogoA">그린컴퓨터아트학원</a></li>
						<li><a href="/servicecenter/locationGuide/1" title="강남캠퍼스 이동">강남</a></li>
						<li><a href="/servicecenter/locationGuide/2" title="종로캠퍼스 이동">종로</a></li>
						<li><a href="/servicecenter/locationGuide/3" title="신촌캠퍼스 이동">신촌</a></li>
						<li><a href="/servicecenter/locationGuide/4" title="신도림캠퍼스 이동">신도림</a></li>
						<li><a href="/servicecenter/locationGuide/7" title="안양캠퍼스 이동">안양</a></li>
						<li><a href="/servicecenter/locationGuide/15" title="천안캠퍼스 이동">천안</a></li>
						<li><a href="/servicecenter/locationGuide/10" title="청주캠퍼스 이동">청주</a></li>
						<li><a class="twoLine" href="/servicecenter/locationGuide/11" title="대전 본점 이동">대전<span class="camP">본점</span></a></li>
						<li><a class="twoLine" href="/servicecenter/locationGuide/25" title="대전 중앙캠퍼스 이동">대전<span class="camP">중앙점</span></a></li>
						<li><a href="/servicecenter/locationGuide/22" title="전주캠퍼스 이동">전주</a></li>
						<li><a href="/servicecenter/locationGuide/12" title="대구캠퍼스 이동">대구</a></li>
					</ul>
					<ul class="borderBottom10 clearfix floatLeft">
						<li class="greenAcademyLogo"><a href="/" title="그린컴퓨터아카데미 강남 이동"><!-- <img src="/assets/img/main/greenacademy.png" alt="그린컴퓨터아카데미"> -->그린컴퓨터아카데미</a></li>
						<li><a href="/servicecenter/locationGuide/1" title="강남캠퍼스 이동">강남</a></li>
						<li><a href="/servicecenter/locationGuide/3" title="신촌캠퍼스 이동">신촌</a></li>
						<li><a href="/servicecenter/locationGuide/19" title="부천캠퍼스 이동">부천</a></li>
						<li><a href="/servicecenter/locationGuide/8" title="인천캠퍼스 이동">인천</a></li>
						<li><a href="/servicecenter/locationGuide/16" title="안산캠퍼스 이동">안산</a></li>
						<li><a href="/servicecenter/locationGuide/9" title="수원캠퍼스 이동">수원</a></li>
						<li><a href="/servicecenter/locationGuide/17" title="의정부캠퍼스 이동">의정부</a></li>
						<li><a href="/servicecenter/locationGuide/18" title="성남캠퍼스 이동">성남</a></li>
						<li><a href="/servicecenter/locationGuide/24" title="울산캠퍼스 이동">울산</a></li>
						<li><a class="twoLine" href="/servicecenter/locationGuide/13" title="부산캠퍼스 이동">부산<span class="camP">서면(본)</span></a></li>
						<li><a class="twoLine" href="/servicecenter/locationGuide/13" title="부산캠퍼스 이동">부산<span class="camP">경성대(별)</span></a></li>
					</ul>
				</div><!-- branch -->
			</div><!-- campus -->
			<div class="title">
				<div class="titleBG clearfix">
					<div class="tel">
					  <a href="tel:<?=$manger->m_tell; ?>"><!--<%=CALLNUMBER%>-->
					    <!--<p class="campusTel"><?=$manger->m_tell; ?></p>-->
					    <h2><span>상담문의 아이콘</span></h2>
					    <div>
                       <h3>상담 · 문의</h3>
                        <div><?=$manger->m_tell; ?></div>
					    </div>
					   </a>
				    </div><!-- tel -->
					<div class="logo"><a href="/"><h1 class="campusLogo" style="background-image: url('/uploads/header/<?=$sub->s_logo; ?>');">로고</h1></a> </div><!-- logo -->
					<div class="members">
						<ul class="clearfix">
							<li><a href="/community/student_interview" class="student">수강후기</a></li>
							<li><a href="/jobcenter/successStories" class="job_interview">취업후기</a></li>
						</ul>
					</div><!-- members -->
				</div><!-- titleBG -->
			</div><!-- title -->
			<div class="gnbBG" id="gnb_utill">
				<div class="gnb swiper-container">
					<ul class="clearfix swiper-wrapper">
						<li class="swiper-slide">
							 <a href="#그린소개메뉴">그린소개</a>
							 <ul>
									<li><a href="/info/whyGreen">왜 그린인가?</a></li>
									<li><a href="/info/greenIntroduce">기관소개</a></li>
									<li><a href="/info/greenHistory">기관연혁</a></li>
									<li><a href="/info/greenbusiness">사업영역</a></li>
									<li><a href="/info/instructorintroduction">강사소개</a></li>
									<li><a href="/info/affiliateUniversityBenefits">제휴대학 혜택</a></li>
									<li><a href="/info/affiliationsSuggestions_list">제휴서비스</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#교육과정메뉴">교육과정</a>
							 <ul>
									<li><a href="/curriculum/curriculum_List/gp/0">아트웍</a></li>
									<li><a href="/curriculum/curriculum_List/gp/1">웹디자인</a></li>
									<li><a href="/curriculum/curriculum_List/gp/2">편집디자인</a></li>
									<li><a href="/curriculum/curriculum_List/gp/3">실내/산업디자인</a></li>
									<li><a href="/curriculum/curriculum_List/gp/4">게임/영상/마야</a></li>
									<li><a href="/curriculum/curriculum_List/gp/5">SW개발</a></li>
									<li><a href="/curriculum/curriculum_List/gp/6">세무회계/OA</a></li>
									<li><a href="/curriculum/curriculum_List/gp/7">단과/자격증</a></li>
									<li><a href="/curriculum/supportSystem">지원제도안내</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#커뮤니티메뉴">커뮤니티</a>
							 <ul>
									<li><a href="/community/notice_list">공지사항</a></li>
									<li><a href="/community/student_interview">수강후기</a></li>
									<li><a href="/community/campusEvents">캠퍼스 행사</a></li>
									<li><a href="/community/greenMedia">그린미디어</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#포트폴리오">포트폴리오</a>
							 <ul>
									<li><a href="/portfolio/portfolio_list/1">인터렉티브웹</a></li>
									<li><a href="/portfolio/portfolio_list/9">프론트엔드웹</a></li>
									<li><a href="/portfolio/portfolio_list/2">편집디자인</a></li>
									<li><a href="/portfolio/portfolio_list/3">건축인테리어</a></li>
									<li><a href="/portfolio/portfolio_list/4">영상 / 마야</a></li>
									<li><a href="/portfolio/portfolio_list/8">자바개발자</a></li>
									<li><a href="/portfolio/portfolio_list/10">게임 / 원화</a></li>
									<li><a href="/portfolio/portfolio_list/11">아트웍</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#고객센터메뉴">고객센터</a>
							 <ul>
									<li><a href="/servicecenter/cust_pay">온라인결제</a></li>
									<li><a href="/servicecenter/online_consultation">온라인상담</a></li>
									<li><a href="/servicecenter/tuition_fee">수강료조회</a></li>
									<li><a href="/servicecenter/locationGuide">캠퍼스위치조회</a></li>
									<li><a href="/servicecenter/CorporateGroupTraining">기업단체교육</a></li>
									<li><a href="/servicecenter/universityCustomizedEducation">대학맞춤교육</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#취업센터메뉴">취업센터</a>
							 <ul>
									<li><a href="/jobcenter/GreenEmploymentSupportSystem">취업지원시스템</a></li>
									<li><a href="/jobcenter/employmentManager">취업담당자 안내</a></li>
									<li><a href="/jobcenter/employList">취업현황</a></li>
									<li><a href="/jobcenter/successStories">취업후기</a></li>
							 </ul>
						</li>
						<li class="swiper-slide">
							 <a href="#NCS지원센터메뉴">NCS지원센터</a>
							 <ul>
									<li><a href="/ncs/NationalCompetencyStandardsCenterV2">NCS소개</a></li>
									<li><a href="/ncs/GreenNationalCompetencyStandardsCenter">그린NCS지원센터</a></li>
							 </ul>
						</li>
				 </ul>
				 <!-- Add Scrollbar -->
        <div class="swiper-scrollbar"></div>
				</div><!-- nav-collapse -->
				 <div class = "arrowBox">
						<span class="arrowL"><!--왼쪽화살표--></span>
						<span class="arrowR"><!--오른쪽화살표--></span>
				 </div>
			</div><!-- gnb -->
		</div><!-- header -->
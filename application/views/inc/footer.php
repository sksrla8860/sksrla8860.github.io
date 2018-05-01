<div class="footerBG">
			<div class="footerNavigationBG">
				<ul class="footerNavigation clearfix">
					<li><a href="/info/greenIntroduce" class="bar">학원소개</a></li>
					<li><a href="/main/agreement/clause" class="bar">이용약관</a></li>
					<li><a href="/main/agreement/policy" >개인정보보호정책</a></li>
					<li><a href="/main/siteMap">사이트맵</a></li>
				</ul>
			</div><!-- footerNavigationBG -->
			<div class="footerInfoBG">
				<div class="footerLogo"><a href="/"><img src="/uploads/header/<?=$sub->s_Flogo; ?>" title="그린컴퓨터아트학원 그린컴퓨터아카데미 (주)지아이티아카데미" />그린컴퓨터아트학원 그린컴퓨터아카데미 (주)지아이티아카데미</a></div><!-- footerLogo -->
				<ul class="footerAddress">
				<?=$sub->s_info; ?>
				</ul><!-- footerAddress -->
<!-- 				<div class="footerTel0"><a href="tel:<%=getCampusTelInfo(LOGOCODE)%>" class="footerBL"><span><%=getCampusTelInfo(LOGOCODE)%></span></a></div> --><!-- footerTel -->
					<div class="footerTel0">
					  <a href="tel:">
					    <!--<p class="campusTel<%=camCode%>"><%=getCampusTelInfo(camCode)%></p>-->
					    <h2><span>상담문의 아이콘</span></h2>
					    <div>
                       <h3>상담 · 문의</h3>
                        <div><?=$manger->m_tell; ?></div>
					    </div>
					   </a>
				    </div>
			  </div>
			</div><!-- footerInfoBG -->
      <script type="text/javascript" src="/assets/js/common.js"></script>
      </div><!-- whole -->
    </body>
</html>
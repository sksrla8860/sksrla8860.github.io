		<div class="quickBG">
			<div class="quick clearfix">
				<div class="qClose"><a href="#quickClose" class="quickClose">접기</a></div>
				<div class="quickShortCut">
					<ul class="quickShortCutList clearfix">
						<li><a href="#빠른상담창열기" class="quickConsultBtn"><span class="Mblock">빠른</span>상담</a>
								<div class="quickConsultBox quickConsultBoxOff clearfix">
									<form action="/main/quick_writer" name="quickFrm" id="quickFrm" method="post">
									<input type="hidden" name="target_campus" id="target_campus" value="<%=logoCode%>"/>
									<ul class="quickConsult floatLeft clearfix">
										<li class="liL"><input type="text" name="i_writer" id="i_writer" class="nameStyle" placeholder="이름을 입력해주세요." value=""></li>
										<li class="clearfix liR">
											<input type="text" id="i_num" name="i_num" value="" class="curriStyle onlynum" title="휴대폰" placeholder="연락처를 입력해주세요." maxlength="11" />
										</li>
										<li class="liL"><input type="text" name="m_cam" id="m_cam" class="nameStyle" value="<?=getCampusName($manger->m_cam); ?>" disabled /></li>
										<li class="liR"><input type="text" id="i_name" name="i_name" class="curriStyle" placeholder="과정을 입력해주세요." ></li>
										<li><label for="personalInfo" class="personalInfoLabel">개인정보 수집이용을 동의합니다. </label><input type="checkbox" name="q_agree" id="q_agree" class="personalInfoCheck"><a href="/policyPop" class="personalExplain" target="blank">[내용보기]</a><input type="submit" value="등록하기" class="quickBtnStyle"></li>
									</ul>
									<div class="floatLeft"></div>
									</form>
								</div><!-- quickConsultBox -->
						</li>
						<li><a href="/servicecenter/tuition_fee" class="quickShortCutList1"><span class="Mblock">수강료</span>조회</a></li>
						<li><a href="/servicecenter/cust_pay" class="quickShortCutList2"><span class="Mblock">온라인</span>결제</a></li>
						<li><a href="/portfolio/portfolio_list" class="quickShortCutList3"><span class="Mblock">포트</span>폴리오</a></li>
					</ul>
				</div><!-- quickShortCut -->
				<div class="quickCampusTelBG"><div class="quickCampusTelBox clearfix"><span id="quickTempText">상담<br>문의</span><div class="quickCampusTel"><?=$manger->m_tell; ?></div></div></div>
				<div class="qTop"><a href="#" class="quickTop">TOP</a></div>
			</div><!-- quick -->
		</div><!-- quickBG -->
<script type="text/javascript">
$('.quickBtnStyle').on('click', function(){
	if (!$('#q_agree').is(':checked')){
		alert("약관 및 정책에 동의해야 합니다.");
		$('#agree').focus();
		return false;
	}else if (!Trim($('#i_name').val())){
		alert("과정을 입력해주세요.");
		$('#i_name').val('');
		return false;
	}else if (!Trim($('#i_writer').val())){
		alert("이름을 입력해주세요.");
		$('#i_writer').focus();
		return false;
	}else if (!Trim($('#i_num').val())){
		alert("연락처를 입력해주세요.");
		$('#i_num').focus();
		return false;
	}else{
      $("#quickFrm").submit();
    }
});
</script>
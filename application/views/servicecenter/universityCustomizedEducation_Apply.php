<link rel="stylesheet" type="text/css" href="/assets/css/servicecenter/universityCustomizedEducationApply.css"/>
		<!-- contents 시작 -->
    <div class="container">
        <div class="section">
            <div class="form_box">
                <form id="frm" name="frm" method="post" action="">
                    <fieldset>
                        <legend>대학맞춤교육신청서</legend>
                        <div class="category01">
                            <label for="l_name">신청대학교명</label>
                            <div>
                                <input type="text" name="l_name" id="l_name" />
                            </div>
                        </div>
                        <div class="category02">
                            <label for="l_writer">신청자명</label>
                            <div>
														<input type="text" name="l_writer" id="l_writer" value="" />
                            </div>
                        </div>
                        <div class="category03">
                            <label for="l_people">교육인원</label>
                            <div>
                                <input type="text" name="l_people" id="l_people" value="" class="num_only" maxlength="3" />
                                <p>명</p>
                            </div>
                        </div>
                        <div class="category04">
                            <label for="l_period">교육기간</label>
                            <div>
                                <input type="text" name="l_period" id="l_period" value="" maxlength="30" />
                            </div>
                        </div>
                        <div class="category05">
                            <label for="l_place">교육장소</label>
                            <div>
                                <input name="l_place" type="text" id="l_place" maxlength="10"  />
                            </div>
                        </div>
                        <div class="category06">
                            <label for="l_course">교육과정</label>
                            <div>
                                <input type="text" name="l_course" id="l_course" value="" />
                            </div>
                        </div>
                        <div class="category07">
                            <label for="l_num">연락처</label>
                            <div>
														<input name="l_num" type="text" class="num_only" id="l_num" title="첫자리 입력" maxlength="11" size="11" />
                            </div>
                        </div>
                        <div class="category08">
                            <label for="l_mail">메일주소</label>
                            <div>
															<input type="text" name="l_mail" id="l_mail" />
                            </div>
                        </div>
                        <div class="category09">
                            <label for="l_contents">내용</label>
                            <div>
                                <textarea  name="l_contents" id="l_contents" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="category10">
                            <label for="">개인정보 수집<br />및 이용동의</label>
                            <div>
                                <p>(주)지아이티아카데미는 대학맞춤교육을 희망하는 분을 대상으로 아래와 같이 개인정보를 수집하고 있습니다.<br />
                                -수집 개인정보 항목 : [필수] 신청대학교, 신청자명, 이메일, 연락처<br />
                                -개인정보의 수집 및 이용목적 : 대학맞춤교육신청에 따른 본인확인 및 원활한 의사소통 경로 확보<br />
                                -개인정보의 이용기간 : 모든 검토가 완료된 후 3년간 이용자의 조회를 위하여 보관하며, 이후 해당정보를 지체없이 파기합니다.<br />
                                -동의 거부권리 안내 추가 :위와 같은 개인정보 수집 동의를 거부할 수 있습니다. 다만 동의를 거부하는 경우 대학맞춤교육 신청이 제한될 수 있습니다.<br />
                                  그 밖의 사항은 <a href="/admin/policyPop" target="_blank">개인정보처리방침</a>을 준수합니다.</p>
                                <input type="checkbox" name="agree" id="agree" value="" />
                                <label for="agree">위 개인정보 수집 및 이용에 대한 안내를 충분히 숙지하였으며 이에 동의 합니다.</label>
                            </div>
                        </div>
                        <div class="btn_box">
                            <input type="submit" id="okBtn" name="okBtn" value="등록하기"/>
                            <input type="reset" id="cancleBtn" name="cancleBtn" value="등록취소" />
                        </div>
												<input type="hidden" name="a_code" id="a_code" value="u">
                    </fieldset>
                </form>
            </div>
			<div class="article03">
					<h6>*분야별 문의 창구 안내</h6>
					<p>- 기업교육 문의/상담 : 02-3481-5425<br/>- 세금계산서문의 : 02-3476-0631~5<br />
					- 팩스 : 02-593-1443    - 메일 : webmaster@greenart.co.kr<br />
					- 상담운영시간 : 평일 오전 9시 ~ 오후 6시</p>
       		</div>
        </div>
    </div>
	</div>
		<!-- contents 끝 -->
<script type="text/javascript">
jQuery().ready(function(){
	jQuery("form[name=frm]").submit(function(){
		if(!jQuery("#agree").is(':checked')){
			alert("개인정보 수집 안내에 동의해야 합니다.");
			return false;
		}
		if(!jQuery("#l_name").val()){
			alert("대학교명을 입력해주세요.");
			jQuery("#l_name").focus();
			return false;
		}
		if(!jQuery("#l_writer").val()){
			alert("신청자명을 입력해주세요.");
			jQuery("#l_writer").focus();
			return false;
		}
		if(!jQuery("#l_people").val()){
			alert("교육인원을 입력해주세요.");
			jQuery("#l_people").focus();
			return false;
		}
		if(!jQuery("#l_period").val()){
			alert("교육기간을 입력해주세요.");
			jQuery("#l_period").focus();
			return false;
		}
		if(!jQuery("#l_place").val()){
			alert("교육장소를 입력해주세요.");
			jQuery("#l_place").focus();
			return false;
		}
		if(!jQuery("#l_course").val()){
			alert("교육과정을 입력해주세요.");
			jQuery("#l_course").focus();
			return false;
		}
		if(!jQuery("#l_num").val()){
			jQuery('#l_num').focus();
			alert("연락처를 입력해주세요.");
			return false;
		}
		if(!jQuery("#l_mail").val()){
			alert("이메일을 입력해주세요.");
			jQuery("#l_mail").focus();
			return false;
		}
		if (!checkEmail(jQuery("#l_mail").val())){
			alert("이메일 형식이 맞지 않습니다.");
			jQuery("#l_mail").focus();
			jQuery("#l_mail").val('');
			return false;
		}
		if(!jQuery("#l_contents").val()){
			alert("내용을 입력해주세요.");
			jQuery("#l_contents").focus();
			return false;
		}
		jQuery("form[name=frm]").attr("action","/servicecenter/universityCustomizedEducation_Apply");
	});
});
</script>
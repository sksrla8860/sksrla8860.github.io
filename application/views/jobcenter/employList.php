<link rel="stylesheet" type="text/css" href="/assets/css/jobcenter/employList.css"/>
			<div class="employListAllBG">
				<div class="employSpecialListBG">
					<p class="congratulation1">CONGRATULATION</p>
					<p class="congratulation2">취업을 진심으로 축하드립니다!</p>
					<p class="congratulation3">수강생 여러분들의 새로운 시작을 그린이 응원합니다!</p>
					<ul class="greenEmploySituation clearfix">
					<?php
                      $i = 1;
                      foreach($view as $ve)
                      {
                        $name = mb_substr($ve['cname'], 0, 2);
                      ?>
						<li class="employeeBG<?=$i; ?>">
								<ul class="employee">
									<li class="employeeCompany"><?=$ve['ccompany'];?></li>
									<li class="employeeCurri"><?=$ve['ccourse'];?></li>
									<li class="employeeName"><?=$name ?>*</li>
								</ul>
						</li>
						<?php
                        $i++;
                        }
                      ?>
					</ul><!-- greenEmploySituation -->
				</div><!-- employSpecialListBG -->
				<??>
				<div class="employListBG">
					<!-- <ul class="educationField clearfix">
						<li class="TbdbCACACA MbdbCACACA"><a href="#전체보기" class="on" id="gp0">전체보기</a></li>
						<li class="TbdbCACACA MbdbCACACA"><a href="#아트웍" id="gp0">아트웍</a></li>
						<li class="TbdbCACACA MbdbCACACA"><a href="#웹디자인" id="gp1">웹디자인</a><div></div></li>
						<li class="TbdbCACACA "><a href="#편집디자인" id="gp2">편집디자인</a></li>
						<li class=""><a href="#실내/산업디자인 " id="gp3">실내/산업디자인</a><div></div></li>
						<li class=""><a href="#게임/영상/마야 " id="gp4">게임/영상/마야</a><div></div></li>
						<li class=""><a href="#SW개발 " id="gp5">SW개발</a></li>
						<li class=""><a href="#세무회계/OA " id="gp6">세무회계/OA</a><div></div></li>
					</ul> --><!-- educationField -->
					<ul class="employList clearfix">
					<?php
                      foreach($xml as $lt){
                        $name = mb_substr($lt['cname'], 0, 2);
                      ?>
						<li>
								<ul class="employee">
									<li class="employeeCompany"><?=$lt['ccompany'];?></li>
									<li class="employeeCurri"><?=$lt['ccourse'];?></li>
									<li class="employeeName"><?=$name ?>*</li>
								</ul>
						</li>
						<?php
                      }
                  ?>
					</ul><!-- employList -->
					<a href="#더보기" onclick="GetRecords();return false;" class="moreBtn">더보기 + </a>
				</div><!-- employListBG -->
			</div><!-- greenStudyAllBG  -->
		</div><!-- contents 끝 -->
<script type="text/javascript">
var pageIndex = 1;
var pageCount;
function GetRecords() {
	pageIndex++;
	if (pageIndex == 2 || pageIndex <= pageCount) {
	$.ajax({
			type: "POST",
			url: "/inner/employList_inner",
			data: 'page=' + pageIndex,
			dataType: "html",
			success: OnSuccess,
			failure: function (response) {
					alert(response.d);
			},
			error: function (response) {
					alert(response.d);
			}
	});
	}else{
		pageIndex--;
	}
}
function OnSuccess(data) {
	if (data != ""){
		if (data == "1"){
			$(".moreBtn").hide();
		}else{
			pageCount = pageIndex + 1;
			$(".employList").append(data);
		}
	}else{
      alert("마지막 게시물 입니다.");
      $(".moreBtn").remove();
		pageCount = 0;
		pageIndex = pageIndex - 1;
	}
}
</script>
<link rel="stylesheet" type="text/css" href="/assets/css/jobcenter/successStories.css" />
		<!-- contents 시작 -->
    <div class="container">
        <div class="section">
            <div class="article02">
                <h3>수강후기</h3>
                <form method="get" name="sch_frm" id="sch_frm" >
                    <fieldset>
                        <select name="sch_type" id="sch_type">
                            <option value="2">제목+내용</option>
                            <option value="0">제목</option>
                            <option value="1">내용</option>
                        </select>
                        <input class="textBox" type="text" name="sch_val" id="sch_val" value="" />
                        <input class="serch" type="submit" name="" id="" value="검색" />
                    </fieldset>
                </form>
                <ul class="reviewBox">
                    <li class="tableHead">
                        <div>
                            <h5>No.</h5>
                            <h4>제목</h4>
								<div class="campusTag">캠퍼스</div>
                            <div class="writer">작성자</div>
                            <div class="views">조회수</div>
                            <div class="day">등록일</div>
                        </div>
                    </li>
                    <?php
                  if($xml)
                  {
                  foreach($xml as $lt){
                    $writer = mb_substr($lt["username"], 0, 2);
                    if($lt["regdate"] > date("Y-m-d", strtotime ("-20 days"))){
                      ?>
                      <li class="tableList"><div class="showBox"><h5></h5><a href="/community/student_view/<?=$lt["posidx"]; ?>" class="new"><?=$lt["possubject"]; ?></a><div class="campusTag"><?=$lt["camname"]; ?></div><div class="writer"><?=$writer; ?>*</div><div class="views"><?=$lt["posreadcount"]; ?></div><div class="day"><?=$lt["regdate"]; ?></div></div></li>
                  <?php
                    }else{
                      ?>
                      <li class="tableList"><div class="showBox"><h5></h5><a href="/community/student_view/<?=$lt["posidx"]; ?>"><?=$lt["possubject"]; ?></a><div class="campusTag"><?=$lt["camname"]; ?></div><div class="writer"><?=$writer; ?>*</div><div class="views"><?=$lt["posreadcount"]; ?></div><div class="day"><?=$lt["regdate"]; ?></div></div></li>
                  <?php
                      }
                      /*$intListNumber--;*/
                    }
                  }
                  ?>
                </ul>
                <input type="button" class="plusBtn moreBtn" onclick="GetRecords();return false;" value="더보기 +">
            </div>
        </div>
    </div>
</div><!-- contents 끝 -->
    
		
<script type="text/javascript">
  function search_enter(form){
    var keycode = window.Event.keyCode;
    if(keycode == 13) $("#search_btn").click();
  }
var sch_val = $("#sch_val").val(), sch_type = $("#sch_type").val();
var pageIndex = 1;
var pageCount;
var IpageIndex = 1;
var IpageCount;
function GetRecords() {
	pageIndex++;
	if (pageIndex == 2 || pageIndex <= pageCount) {
	$.ajax({
			type: "get",
			url: "/inner/student_review_inner",
			data: 'page='+pageIndex+'&sch_val='+ sch_val +'&sch_type='+ sch_type +'&cam_idx=',
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
			$(".reviewBox").append(data);
		}
	}else{
		pageCount = 0;
		pageIndex = pageIndex - 1;
	}
}
  $(window).load(function(){
    var hideL = $(".reviewBox > li").length;
    if(hideL < 2){
      $('.moreBtn').remove();
    }
  });
</script>
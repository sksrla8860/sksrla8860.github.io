<link rel="stylesheet" type="text/css" href="/assets/css/jobcenter/successStories.css"/>
    <div class="container">
        <div class="section">
            <div class="article02">
                <h3>취업후기</h3>
                <form method="get" name="sch_frm" id="sch_frm" >
                    <fieldset>
                        <select name="sch_type" id="sch_type">
                            <option value="2">제목+내용</option>
                            <option value="0">제목</option>
                            <option value="1">내용</option>
                        </select>
                        <input class="textBox" type="text" name="sch_val" id="sch_val" value="" />
                        <input class="serch" type="submit" name="search_btn" id="search_btn" value="검색" />
                    </fieldset>
                </form>
                <ul class="reviewBox">
                    <li class="tableHead">
                        <div>
                            <h5>캠퍼스</h5>
                            <h4>제목</h4>
                            <div class="writer">작성자</div>
                            <div class="views">조회수</div>
                            <div class="day">등록일</div>
                        </div>
                    </li>
                    <?php
                  /*var_dump ($xml);*/
                  if($xml){
                    foreach($xml as $lt)
                    {
                      if($lt["regdate"] > date("Y-m-d", strtotime ("-21 days"))){
                      ?>
                      <li class="tableList">
                        <div class="showBox" id="<?=$lt['sidx']; ?>">
                            <h5><?=$lt["camname"]; ?></h5>
                            <a class="new" href="/jobcenter/successStories_view/<?=$lt['sidx']; ?>"><?=$lt["stitle"]; ?></a>
                            <div class="writer"><? if(isset($lt["sname"])){ mb_substr($lt["sname"], 0, 2);} ?>*</div>
                            <div class="views"><?=$lt["sreadcount"]; ?></div>
                            <div class="day"><?=$lt["regdate"]; ?></div>
                        </div>
                    </li>
                    <?php
                    }else{
                      ?>
                      <li class="tableList">
                        <div class="showBox" id="<?=$lt['sidx']; ?>">
                            <h5><?=$lt["camname"]; ?></h5>
                            <a href="/jobcenter/successStories_view/<?=$lt['sidx']; ?>"><?=$lt["stitle"]; ?></a>
                            <div class="writer"><? if(isset($lt["sname"])){ mb_substr($lt["sname"], 0, 2);} ?>*</div>
                            <div class="views"><?=$lt["sreadcount"]; ?></div>
                            <div class="day"><?=$lt["regdate"]; ?></div>
                        </div>
                    </li>
                      <?php
                      }
                    }
                   }
                  ?>
                </ul>
                <input type="button" class="plusBtn moreBtn" onclick="GetRecords();return false;" value="더보기 +" />
            </div>
        </div>
    </div>
	</div>
		<!-- contents 끝 -->
<script type="text/javascript">
$(function(){
    var w = $(window).width();
    if(w < 1080){
        $(".imgBox").css({'width':'100%'})
        var img_ht = $(".imgBox").width();
        $(".imgBox").height(img_ht*0.4547368);
    }else{
        $(".imgBox").css({'width':'475px','height':'216px'});
    };

    $(window).on("resize",function(){
        var w = $(window).width();
        if(w < 1080){
            $(".imgBox").css({'width':'100%'})
            var img_ht = $(".imgBox").width();
            $(".imgBox").height(img_ht*0.4547368);
        }else{
            $(".imgBox").css({'width':'475px','height':'216px'});
        };
    });
});
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
			url: "/inner/successStories_inner",
			data: 'page='+pageIndex+'&sch_val='+sch_val+'&sch_type='+sch_type+'&cam_idx=',
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
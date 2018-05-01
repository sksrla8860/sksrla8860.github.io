<link rel="stylesheet" type="text/css" href="/assets/css/community/compusEvents.css"/>
		<!-- contents 시작 -->
	<div class="container">
		<div class="section">
			<form name="sch_name" id="sch_name" method="get">
				<fieldset>
					<label for="searchString">검색하기</label>
					<input type="text" name="searchString" id="searchString" value="" />
					<input type="submit" class="serchBtn" value="검색"/>
				</fieldset>
			</form>
			<ul class="listBox">
			<?php
              if($xml)
              {
                foreach($xml as $lt)
                {
              ?>
                  <li>
                      <a href="campusEvents_view/<?=$lt['ridx']?>"><div>
                              <h4><?=$lt["rtitle"]; ?></h4>
                              <div>
                                  <h5><?=getCampusName($lt["camidx"]); ?>캠퍼스</h5>
                                  <p><?=$lt["regdate"]; ?></p>
                              </div>
                          </div>
                          <span><!--화살표--></span></a>
                  </li>
                  <?php
                  }
                }
              ?>
			</ul>
          <input type="hidden" name="hiddenBox" id="hiddenBox" value="<?=$searchString; ?>" />
			<a href="#더보기" onclick="GetRecords();return false;" class="plusBtn moreBtn">더보기 +</a>
		</div>
	</div>
  </div>
		<!-- contents 끝 -->
<script type="text/javascript">
var pageIndex = 1;
var pageCount;
function GetRecords() {
  var searchString = $('#hiddenBox').val();
  pageIndex++;
  if (pageIndex == 2 || pageIndex <= pageCount) {
  $.ajax({
          type: "POST",
          url: "/inner/campusEvents_inner",
          data: 'page=' + pageIndex + "&searchString=" + searchString,
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
		if (data == 1){
			$(".moreBtn").hide();
		}else{
		pageCount = pageIndex + 1;
		$(".listBox").append(data);
		}
	}else{
      alert("마지막 게시물 입니다.");
      $(".moreBtn").remove();
		pageCount = 0;
		pageIndex = pageIndex - 1;
	}
}
</script>
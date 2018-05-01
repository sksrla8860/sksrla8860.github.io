<link rel="stylesheet" type="text/css" href="/assets/css/community/greenDesignNews.css" />
		<div class="container">
			<div class="greenDesignNewsBG">
			<div class="noticeSearchBox">
					<form name="schFrm" id="schFrm" method="get">
					<div class="noticeSearchBG"><input type="text" id="noticeSearch" name="schVal" value=""><button class="noticeSearchBtn">검색</button></div>
					</form>
				</div><!-- noticeSearchBox -->

				<ul class="designNewsList">
  <?php
                   // var_dump($xml);
  if($xml){
    foreach($xml as $lt)
    {
    ?>
    				    <li class="clearfix">
      <div class="designNewsImg">
        <a href="/community/greenMedia_view/<?=$lt['c_seq']; ?>">
          <img src="http://greenart.co.kr/upimage/comm/<?=$lt['c_file']; ?>">
        </a>
      </div>
      <p class="designNewsTitle ellipsisStyle">
        <a href="/community/greenMedia_view/<?=$lt['c_seq']; ?>"><?=$lt['c_title']; ?></a>
      </p>
      <div class="designNewsRead">조회수 : <?=$lt["c_visit"]; ?></div>
      <p class="designNewsPreView ellipsisStyle"><?=$lt["c_short"]; ?></p>
    </li>
<?php
    
					/*echo '<li class="clearfix"><div class="designNewsImg"><a href="/'.$this->uri->segment(1).'/greenMedia_view/'.$lt["c_seq"].'"><img src="http://greenart.co.kr/upimage/comm/'.$lt["c_file"].'"></a></div><p class="designNewsTitle ellipsisStyle"><a href="/'.$this->uri->segment(1).'/greenMedia_view/'.$lt["c_seq"].'">'.stripslashes($lt["c_title"]).'</a></p><div class="designNewsRead">조회수 : '.$lt["c_visit"].'</div><p class="designNewsPreView ellipsisStyle">'.stripslashes ($lt["c_short"]).'</p></li>';
	*/
    }
  }else{
    
  }
  ?>
				</ul>
              <?=$pagination;?>
			 </div><!-- greenDesignNewsBG -->
			</div><!-- container -->
		</div><!-- contents -->
		<!-- contents 끝 -->
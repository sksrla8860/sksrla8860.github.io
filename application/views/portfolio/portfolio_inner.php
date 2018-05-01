<?php
if(isset($xml)){
    foreach($xml as $lt){
    $year = substr($lt['regdate'], 0, 4);
    $writer = mb_substr($lt["writer"], 0, 2);
?>
    <li><a href=""><div class="detailView">자세히보기</div><!--<?=$lt['pf_link']; ?>-->
    <div class="portfolioImg"><img src="http://greenart.co.kr/upimage/pf_image/<?=$year; ?>/<?=$lt['thum_img']; ?>"/></div>
    <div class="clearfix"><div class="studentName"><?=$writer; ?>*</div><div class="className ellipsisStyle"><?=$lt["project"]; ?></div></div></a></li>
<?php
  }
}
else
{
  
}
?>
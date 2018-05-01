  <?php
    foreach($xml as $lt){
      $writer = mb_substr($lt["username"], 0, 2);
      ?>
      <li class="tableList"><div class="showBox"><h5></h5><a href="/community/student_view/<?=$lt["posidx"]; ?>"><?=$lt["possubject"]; ?></a><div class="campusTag"><?=$lt["camname"]; ?></div><div class="writer"><?=$writer; ?>*</div><div class="views"><?=$lt["posreadcount"]; ?></div><div class="day"><?=$lt["regdate"]; ?></div></div></li>
      <?php
      }
    /*$intListNumber--;*/
  ?>
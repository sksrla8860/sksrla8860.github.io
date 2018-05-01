  <?php
    foreach($list as $lt){
    ?>
      <li><a href="#강사프로필 자세히 보기" onclick="viweTeacher('<?=$lt["t_idx"]; ?>');return false;"><img src="http://greenart.co.kr/upimage/subject/teacher/<?=$lt['t_img']; ?>" alt="<?=$lt['t_name']; ?>"><div class="instructorNameBG"><span class="instructorName"><?=$lt['t_name']; ?><span class="position">강사</span></span></div></a></li>
      <?php
    }
    ?>
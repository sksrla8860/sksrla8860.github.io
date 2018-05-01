<?php
  foreach($xml as $lt)
  {
  ?>
    <li>
        <div class="curriculumTitleImage"><img src="http://www.greenart.co.kr/upimage/subject/<?=$lt['subimg']; ?>" alt="<?=$lt['subname']; ?>"/></div>
        <p class="curriculumTitle ellipsisLine2"><?=$lt['subname']; ?></p>
        <a href="/curriculum/curriculum_detail/gp/x/<?=$lt['susidx']; ?>" class="curriculumDetail">자세히 보기+</a>
    </li>
    <?php
    }
  ?>
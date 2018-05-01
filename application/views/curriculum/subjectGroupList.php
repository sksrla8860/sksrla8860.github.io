<div id="groupList">
				<h3>일반/실업자 교육과정</h3>
				<ul class="otherCurriculumList clearfix">
            <?php
              foreach($list as $lt)
              {
                if($lt['subcode'] == 1)
                {
              ?>
					<li><a href="/curriculum/curriculum_detail/gp/<?=$c_group; ?>/<?=$lt['susidx']; ?>" class="ellipsisStyle"><?=$lt['subname']; ?>[<?=$lt['subdetailname']; ?>]</a></li>
              <?php
                  }
              }
            ?>
				</ul>
				<h3>일반/재직자 교육과정</h3>
				<ul class="otherCurriculumList clearfix">
				<?php
          foreach($list as $lt)
          {
              if($lt['subcode'] == 2)
              {
              ?>
					<li><a href="/curriculum/curriculum_detail/gp/<?=$c_group; ?>/<?=$lt['susidx']; ?>" class="ellipsisStyle"><?=$lt['subname']; ?>[<?=$lt['subdetailname']; ?>]</a></li>
              <?php
                }
          }
              ?>
				</ul>
</div>
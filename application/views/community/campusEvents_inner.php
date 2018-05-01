<?php
if(isset($xml)){
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
else
{
}
?>
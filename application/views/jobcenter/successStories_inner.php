
                    <?php
                  /*var_dump ($xml);*/
                  if($xml){
                    foreach($xml as $lt)
                    {
                      $name = mb_substr($lt["sname"], 0, 2);
                      ?>
                      <li class="tableList">
                        <div class="showBox" id="<?=$lt['sidx']; ?>">
                            <h5><?=$lt["camname"]; ?></h5>
                            <a href="/jobcenter/successStories_view/<?=$lt['sidx']; ?>"><?=$lt["stitle"]; ?></a>
                            <div class="writer"><?=$name; ?>*</div>
                            <div class="views"><?=$lt["sreadcount"]; ?></div>
                            <div class="day"><?=$lt["regdate"]; ?></div>
                        </div>
                    </li>
                      <?php
                    }
                   }
                  ?>
<option value='' selected="selected">대상 선택</option>
 <?php
  foreach($list as $lt)
  {
  ?>
<option value="<?=$lt['cidx']; ?>" title="<?=$lt['cname']; ?>"><?=$lt['cname']; ?></option>
    <?php
    }
  ?>
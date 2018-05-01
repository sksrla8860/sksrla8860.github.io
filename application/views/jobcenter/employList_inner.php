    <?php
if(isset($xml)){
      foreach($xml as $lt){
        $name = mb_substr($lt['cname'], 0, 2);
      ?>
        <li>
                <ul class="employee">
                    <li class="employeeCompany"><?=$lt['ccompany'];?></li>
                    <li class="employeeCurri"><?=$lt['ccourse'];?></li>
                    <li class="employeeName"><?=$name ?>*</li>
                </ul>
        </li>
        <?php
      }
}
else
{
  
}
  ?>
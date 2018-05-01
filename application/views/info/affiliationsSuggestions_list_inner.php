			<?php
              foreach($list as $lt){
              ?>
        <li class="clearfix">
			<div class="companyLogo"><img src="http://greenart.co.kr/upimage/alliance/<?=$lt['aimage']?>" alt="<?=$lt["acompany"]?>"></div>
			<ul class="companyInfo">
				<li class="companyName"><?=$lt["acompany"]?></li>
				<li class="companyBenefit clearfix"><div class="companyBar"><span>혜택</span></div><div class="campanyText"><?=$lt["abenefit"]?></div></li>
				<li class="companyLocation clearfix"><div class="companyBar"><span>위치</span></div><div class="campanyText"><?=$lt["aplace"]?></div></li>
				<li class="companyTelNum clearfix"><div class="companyBar"><span>문의</span></div><div class="campanyText"><?=$lt["areference"]?></div></li>
			</ul>
			<div class="btnBG"><?php if(isset($lt['aurl'])){ ?><a href="http://<?=$lt['aurl']?>" target="_blank" class="blueBtn">홈페이지 이동</a><?php } ?></div>
		</li>
		<?php
                }
          ?>
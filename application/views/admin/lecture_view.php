    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: DevJS
 * Date: 2017-05-18
 * Time: 오후 3:14
 */
?>    
    <div class="container">
      <table class="tableStyle centered">
        <thead>
          <tr><th>기 업 명</th><td><?=$views->l_name; ?></td><th>상 담 여 부</th><td>
              <select id="l_chk" name="l_chk" class="browser-default" onchange="updateLChk('<?=$views->l_idx?>',this);return false;">
                <option value="O" <?php echo set_select('l_chk','O',$views->l_chk == 'O' ? true : false);?>>O</option>
                <option value="X" <?php echo set_select('l_chk','X',$views->l_chk == 'X' ? true : false);?>>X</option>
              </select></td></tr>
          <tr><th>업 종</th><td><?=$views->l_writer; ?></td><th>교 육 과 정</th><td><?=$views->l_course; ?></td></tr>
          <tr><th>교 육 장 소</th><td><?=$views->l_place; ?></td><th>교 육 인 원</th><td><?=$views->l_people; ?></td></tr>
          <tr><th>신 청 자</th><td><?=$views->l_writer; ?></td><th>메 일</th><td><?=$views->l_mail; ?></td></tr>
          <tr><th>연 락 처</th><td><?=$views->l_num; ?></td><th>등 록 일</th><td><?=$views->l_date; ?></td></tr>
        </thead>
        <tbody>
         <tr><td colspan="4"><?=$views->l_contents; ?></td></tr>
        </tbody>
      </table>
      <div class="right">
        <a href="/admin/lecture_l" class="btn">목록</a>
      </div>
    </div>
  </body>
</html>
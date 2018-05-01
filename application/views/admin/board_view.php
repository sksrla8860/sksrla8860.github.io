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
          <tr><th>제목</th><td colspan="3"><?=$views->b_name; ?></td></tr>
          <tr><th>작성자</th><td><?=$views->stf_idx; ?></td><th>조회수</th><td><?=$views->b_count; ?></td></tr>
          <tr><th>첨부파일</th><td></td><th>등록일</th><td><?=$views->b_date; ?></td></tr>
        </thead>
        <tbody>
         <tr><td colspan="4"><?=$views->b_contents; ?></td></tr>
        </tbody>
      </table>
      <div class="right">
        <a href="/admin/board_w/<?=$this->uri->segment(3); ?>" class="btn">수정</a>
        <a href="/admin/board_d/<?=$this->uri->segment(3); ?>" class="btn">삭제</a>
        <a href="/admin/board" class="btn">목록</a>
      </div>
    </div>
  </body>
</html>
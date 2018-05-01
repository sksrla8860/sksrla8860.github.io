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
     <form action="" id="bd_search" method="post">
           <div class="input-field width40P">
             <input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);" />
           </div>
            <button class="btn marginT4" type="submit" id="search_btn"><span class="btnText">검색</span><i class="material-icons">search</i></button>
            <a href="/admin/board" class="btn grey darken-1 marginT4">초기화</a>
     </form>
      <table class="tableStyle centered">
        <thead>
          <tr><th>No</th><th>제 목</th><th>글 쓴 이</th><th>등 록 일</th><th>조 회 수</th><th>정 렬</th></tr>
        </thead>
        <tbody>
         <?
          foreach ($list as $lt)
          {
          ?>
          <tr><td><?=$intListNumber; ?></td><td><a href="/admin/board_v/<?=$lt->b_idx; ?>"><?=$lt->b_name; ?></a></td><td><?=$lt->stf_idx; ?></td><td><?=$lt->b_date; ?></td><td><?=$lt->b_count; ?></td><td></td></tr>
          <?
            $intListNumber--;
            }
          ?>
        </tbody><!--
        <tfoot>
          <tr><th colspan="6" class="pagination"><ul class="pagination"><li><?= $pagination; ?></li></ul></th></tr>
        </tfoot>-->
      </table>
      <?= $pagination; ?>
      <div class="right">
        <a href="/admin/board_w" class="btn">글쓰기</a>
        <a href="#" class="btn">정렬변경</a>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        $("#search_btn").click(function(){
          if($("#q").val() ==''){
            var act = '/admin/board/';
            $("#bd_search").attr('action', act).submit();
          }else{
            var act = '/admin/board/page/1/q/'+$("#q").val();
            $("#bd_search").attr('action', act).submit();
          };
        });
      });
      
      function board_search_enter(form){
        var keycode = window.event.keyCode;
        if(keycode == 13) $("#search_btn").click();
      }
    </script>
  </body>
</html>
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
            <button class="btn grey darken-1 marginT4" type="submit" id="search_btn"><span class="btnText">검색</span><i class="material-icons">search</i></button>
            <div class="right"><input type="checkbox" name="allList" id="allList"  />
                        <label for="allList">전체 글 보기</label>&nbsp;&nbsp;&nbsp;</div>
     </form>
      <table class="tableStyle centered">
        <thead>
          <tr><th>No</th><th>구 분</th><th>상 담 여 부</th><th>기업/학교명</th><th>신 청 자</th><th>신 청 과 정</th><th>연 락 처</th><th>메 일</th><th>등 록 일</th></tr>
        </thead>
        <tbody>
         <?
          foreach ($list as $lt)
          {
          ?>
          <tr>
            <td><?=$intListNumber; ?></td>
            <td><?=$lt->l_division; ?></td>
            <td><?=$lt->l_chk; ?></td>
            <td><a href="/admin/lecture_v/<?=$lt->l_idx; ?>"><?=$lt->l_name; ?></a></td>
            <td><?=$lt->l_writer; ?></td>
            <td><?=$lt->l_course; ?></td>
            <td><?=$lt->l_num; ?></td>
            <td><?=$lt->l_mail; ?></td>
            <td><?=$lt->l_date; ?></td>
          </tr>
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
    </div>
    <script>
      $(document).ready(function(){
        $("#search_btn").click(function(){
          if($("#allList").is(":checked")){
            if($("#q").val() == ''){
              var act = '/admin/lecture_l/page/1/allList/'+$("#allList").val();
              alert("11111");
              $("#bd_search").attr('action', act).submit();
            }else{
              var act = '/admin/lecture_l/page/1/allList/'+$("#allList").val()+'/q/'+$("#q").val();
              alert("22222");
              $("#bd_search").attr('action', act).submit();
            };
          }else{
            if($("#q").val() == ''){
              var act = '/admin/lecture_l/page/1/allList/off';
              alert("3333");
              $("#bd_search").attr('action', act).submit();
            }else{
              var act = '/admin/lecture_l/page/1/allList/off/q/'+$("#q").val();
              alert("4444");
              $("#bd_search").attr('action', act).submit();
            };
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
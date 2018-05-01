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
          <div class="right">
            <input type="checkbox" name="allList" id="allList" />
            <label for="allList">전체 글 보기</label>&nbsp;&nbsp;&nbsp;
          </div>
     </form>
      <table class="tableStyle centered">
       <colgroup>
         <col width="3%; " />
         <col width="7%; " />
         <col width="7%; " />
         <col width="5%; " />
         <col width="28%; " />
         <col width="13%; " />
         <col width="19%; " />
         <col width="18%; " />
       </colgroup>
        <thead>
          <tr><th>No</th><th>구 분</th><th>유 입 경 로</th><th>답 변 상 태</th><th>과 정 명</th><th>글 쓴 이</th><th>연 락 처</th><th>등 록 일</th></tr>
        </thead>
        <tbody>
         <?
          foreach ($list as $lt)
          {
          ?>
          <tr>
            <td><?=$intListNumber; ?></td>
            <td><?=inquiry_title($lt->i_title); ?></td>
            <td><?=inquiry_route($lt->i_route); ?></td>
            <td><?=$lt->i_chk; ?></td>
            <td><a href="/admin/inquiry_v/<?=$lt->i_idx; ?>"><?=$lt->i_name; ?></a></td>
            <td><?=$lt->i_writer; ?></td>
            <td><?=$lt->i_num; ?></td>
            <td><?=$lt->i_date; ?></td>
          </tr>
          <?
            $intListNumber--;
            }
          ?>
        </tbody>
      </table>
      <?= $pagination; ?>
    </div>
    <script>
      $(document).ready(function(){
        $("#search_btn").click(function(){
          if($("#allList").is(":checked")){
            if($("#q").val() == ''){
              var act = '/admin/inquiry_l/page/1/allList/on';
              $("#bd_search").attr('action', act).submit();
            }else{
              var act = '/admin/inquiry_l/page/1/allList/off/q/'+$("#q").val();
              $("#bd_search").attr('action', act).submit();
            };
          }else{
            if($("#q").val() == ''){
              var act = '/admin/inquiry_l/page/1/allList/off/';
              $("#bd_search").attr('action', act).submit();
            }else{
              var act = '/admin/inquiry_l/page/1/allList/off/q/'+$("#q").val();
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
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
     </form>
      <table class="tableStyle centered">
        <thead>
          <tr><th>No</th><th>구 분</th><th>내 용</th><th>등 록 일</th></tr>
        </thead>
        <tbody>
         <?
          $ii = 1;
          foreach ($list as $lt)
          {
          ?>
          <tr><td><?=$ii; ?></td><td>공지</td><td>사이트 운영 관련 메뉴얼<a href="//greenart.co.kr/upimage/agency_common/manual.pdf" target="_blank">다운로드</a></td><td></td></tr>
          <?
          $ii++;
            }
          ?>
        </tbody>
      </table>
      <?= $pagination; ?>
    </div>
    <script>
      $(document).ready(function(){
        $("#search_btn").click(function(){
          if($("#q").val() ==''){
            alert('검색어를 입력하세요.');
            return false;
          }else{
            var act = '/admin/board/page/1/q/'+$("#q").val();
            alert("가즈아아아아");
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
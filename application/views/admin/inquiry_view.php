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
       <colgroup>
         <col width="15%; ">
         <col width="35%; ">
         <col width="15%; ">
         <col width="35%; ">
       </colgroup>
        <thead>
          <tr><th>과 정 명</th><td colspan="3"><?=$views->i_name; ?></td></tr>
          <tr><th>글 쓴 이</th><td><?=$views->i_writer; ?></td><th>구 분</th><td><?=inquiry_title($views->i_title); ?></td></tr>
          <tr><th>핸 드 폰</th><td><?=$views->i_num; ?></td><th>유 입 경 로</th><td><?=inquiry_route($views->i_route); ?></td></tr>
          <tr><th>이 메 일</th><td><?=$views->i_mail; ?></td><th>답 변 상 태</th>
             <td>
              <select id="i_chk" name="i_chk" class="browser-default" onchange="updateiChk('<?=$views->i_idx?>',this);return false;">
                <option value="O" <?php echo set_select('i_chk','O',$views->i_chk == 'O' ? true : false);?>>O</option>
                <option value="X" <?php echo set_select('i_chk','X',$views->i_chk == 'X' ? true : false);?>>X</option>
              </select>
              </td>
              </tr>
          <tr><th>아 이 피</th><td><?=$views->user_ip; ?></td><th>등 록 일</th><td><?=$views->i_date; ?></td></tr>
        </thead>
        <tbody>
         <tr><td colspan="4"><?=$views->i_contents; ?></td></tr>
        </tbody>
      </table>
      <div class="commentBox afterC marginB20">
      <?php
      foreach ($viewComment as $lt) {
        $c_idx = $lt->c_idx;
        $c_comment = $lt->c_comment;
        $c_date = $lt->c_date;
        $i_idx = $lt->i_idx;
        ?>
       <div class="borderB marginB20 commentList<?= $c_idx ?>">
         <div class="afterC btnBox">
           <h6 class="left">작성자<span class="smallT"><?= $c_date ?></span></h6><div class="right btnBox1"><a onclick="commentEdit('<?= $c_idx ?>', '<?= $c_comment ?>');return false;" href="#수정" class="padding10">수정</a><a onclick="commentDel('<?= $c_idx ?>');return false;" href="#삭제" class="padding10">삭제</a></div>
         </div>
         <div class="cContainer"><pre class="c_comment"><?= $c_comment ?></pre></div>
       </div>
        <?php
      }
      ?>
        <textarea name="c_comment" id="c_comment" class="materialize-textarea"></textarea>
        <button onclick="commentReg('<?= $views->i_idx ?>'); return false;" class="btn waves-effect waves-light right">등록<i class="material-icons right">send</i></button>
      </div>
      <div class="right">
        <a href="/admin/inquiry_d/<?=$this->uri->segment(3); ?>" class="btn">삭제</a>
        <a href="/admin/inquiry_l" class="btn">목록</a>
      </div>
    </div>
    <script type="text/javascript">
        function commentReg(i_idx) {
          var c_comment = $("#c_comment").val();
          var htmlCode = '';
          /*console.log(i_comment);
          console.log("/inquiry/ajaxCommentInsert/?i_idx=" + i_idx + "&i_comment=" + i_comment);*/
          jQuery.ajax({
            type: "post",
            url: "/admin/ajaxCommentInsert",
            data: "i_idx=" + i_idx + "&c_comment=" + c_comment,
            datatype: "json",
            success: function (jsonData) {
              $.each(jsonData, function (key, value) {
                htmlCode += '<div class="borderB marginB20 commentList' + value.c_idx +'"><div class="afterC"><h6 class="left">작성자<span class="smallT">' + value.c_date + '</span></h6><div class="right "><a href="#" class="padding10">수정</a><a onclick="commentDel(' + value.c_idx + ');return false;" href="#삭제" class="padding10">삭제</a></div></div><div class=><pre>' + value.c_comment + '</pre></div></div>';
              });
              $(".commentBox").prepend(htmlCode);
            }
          });
          $("#c_comment").val('');
        }

       
        function commentEdit(c_idx, c_comment) { // 수정 텍스트박스
          //c_idx stf_idx
          var commentList = $('.commentList' + c_idx), preBox = commentList.find('.c_comment');
          var btnBox = commentList.find('.btnBox');
          var btnBox1 = commentList.find('.btnBox1'), preVal = preBox.html();
          var btnBox2 = '<div class="right btnBox2"><a onclick="editGo(\'' + c_idx  + '\');return false;" href="#수정하기" class="padding10">수정하기</a><a onclick="commentCancel(\'' + c_idx + '\');return false;" href="#취소" class="padding10">취소</a></div>';
          if (!preBox) {
            alert("데이터가 없습니다.");
            return;
          }
          var textBox = '<textarea name="c_comment" id="re_comment' + c_idx + '" class="materialize-textarea">' + preVal + '</textarea>'
          commentList.find(".cContainer").append(textBox);
          btnBox1.hide();
          preBox.hide();
          btnBox.append(btnBox2);
          commentList.find($(".select-wrapper")).show();
        }

      function editGo(c_idx) {
        var upText = $('#re_comment' + c_idx).val();
        var updata = '';
        // console.log(step + "/" +upText);
        jQuery.ajax({
          type: "post",
          url: "/admin/ajaxCommentUpdate",
          data: "c_idx=" + c_idx + "&c_comment=" + upText,
          datatype: "json",
          success: function (textData) {
            $.each(textData, function (key, value) {
              updata += '<div class="afterC btnBox"><h6 class="left">작성자<span class="smallT">' + value.c_date + '</span></h6><div class="right btnBox1"><a onclick="commentEdit(\'' + value.c_idx + '\',\'' + value.c_comment + '\');return false;" href="#수정" class="padding10">수정</a><a onclick="commentDel(\'' + value.c_idx + '\');return false;" href="#삭제" class="padding10">삭제</a></div></div><div class="cContainer"><pre class="c_comment">' + value.c_comment + '</pre></div>';
            });
            $('.commentBox').find('.commentList' + c_idx).html(updata);
          }
        });
      }
      

      function commentDel(c_idx) {
        //c_idx stf_idx
        if (!c_idx) {
          alert("필요한 데이터가 없습니다.");
          return;
        }
        if (confirm("삭제 하시겠습니까?")) {
          jQuery.ajax({
            type: "post",
            url: "/admin/ajaxCommentDelete",
            data: "c_idx=" + c_idx,
            datatype: "text",
            success: function (textData) {
              if (textData == "1") {
                $(".commentList" + c_idx).remove();
              }
            }
          });
        }
      }
      

      function commentCancel(c_idx, c_comment) { // 수정 취소
        var commentList = $('.commentList' + c_idx), btnBox = commentList.find('.btnBox');
        var btnBox2 = commentList.find('.btnBox2'), commentLeftBox = commentList.find('.commentLeftBox');
        var btnBox1 = commentList.find('.btnBox1');

        commentList.find(".c_comment").show();
        btnBox1.show();
        btnBox2.remove();
        commentList.find("textarea").remove();
        $(".select-wrapper").hide();
      }
    </script>
  </body>
</html>
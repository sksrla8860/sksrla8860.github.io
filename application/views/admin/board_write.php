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
      <form action="" method="post" id="write_action">
          <table class="tableStyle centered">
            <thead>
             <input type="hidden" value="<?=$this->uri->segment(3); ?>" name="b_idx" />
              <tr><th><label for="input01">제 목</label></th><td><input type="text" id="input01" name="b_name" value="<?=isset($views[0]->b_name) ? $views[0]->b_name : '';?>" /></td></tr>
              <tr><th><label for="input02">작 성 자</label></th><td><input disabled type="text" id="disabled" name="" class="validate" value="관 리 자" /></td></tr>
              <tr><th><label for="input03">첨부파일</label></th><td><input type="file" value="" /></td></tr>
            </thead>
            <tbody>
              <tr><td colspan="2"><textarea name="b_contents" id="input04" class="materialize-textarea"><?=isset($views[0]->b_contents) ? $views[0]->b_contents : '';?></textarea></td></tr>
            </tbody>
          </table>
          <div class="right paddingB50">
            <button type="submit" class="btn" id="write_btn">등록<i class="material-icons right">send</i></button>
            <a href="" class="btn">취소</a>
          </div>
      </form>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      $("#write_btn").click(function(){
        if($("#input01").val() == ''){
          alert('제목을 입력해주세요.');
          $("#input01").focus();
          return false;
        }else if($("#input04").val() == ''){
          alert('내용을 입력해주세요.');
          $("#input04").focus();
          return false;
        }else {
          $("#write_action").submit();
        }
      });
      $('#input04').ckeditor({
        customConfig: "/assets/ckeditor/config_contents.js"
      });
    });
</script>
</html>
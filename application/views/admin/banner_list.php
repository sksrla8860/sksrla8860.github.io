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
    <h1>배너관리</h1>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_action');
      echo form_open_multipart("/admin/banner_l" , $attributes);
      ?>
     <filedset>
          <table>
            <tbody>
              <tr>
                <th class="width20P"><label for="n_text">텍스트</label></th><td><input type="text" name="n_text" id="n_text" onkeypress="board_search_enter(document.q);" value="<?=isset($modify[0]->n_text) ? $modify[0]->n_text : '';?>" placeholder=" 배너에 마우스를 올렸을 때 표시됩니다." /></td>
              </tr>
              <tr>
                <th class="width20P"><label for="n_link">링크</label></th><td><input type="text" name="n_link" id="n_link" onkeypress="board_search_enter(document.q);" value="<?=isset($modify[0]->n_link) ? $modify[0]->n_link : '';?>" placeholder=" 배너를 클릭했을 때 이동 할 링크릴 입력해 주세요." /></td>
              </tr>
             <tr>
                <th colspan="2" class="file-field">
                  <div class="btn blue lighten-1">
                    <i class="material-icons small">image&nbsp;<span class="btnText">File</span></i>
                    <input type="file" id="userfile" name="userfile" value="<?=set_value('userfile'); ?>" />
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" id="banner_name" name="banner_name" value="<?=isset($modify[0]->original_name) ? $modify[0]->original_name : '';?>" placeholder=" 배너 파일을 올려주세요. (사용 가능 확장자 gif, jpg, png)" />
                  </div>
                </th>
              </tr>
              <tr>
                <th colspan="2"><button class="btn grey darken-1 marginT30 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></th>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="n_idx" id="n_idx" value="<?= $this->uri->segment(3); ?>">
        </filedset>
     </form>
      <table class="tableStyle centered">
        <tbody>
         <?
          $ii = 1;
          foreach ($list as $lt)
          {
            $file_info = explode(".", $lt->file_name);
            $thumb_img = '/uploads/banner/'.$lt->file_name;
          ?>
          <tr>
            <td rowspan="2" class="width4P"><?= $ii; ?></td>
            <td rowspan="2" class=""><?php if ($lt->n_range > 0) {?><a href="#정렬위로" onclick="rangeEdit('<?=$lt->n_range;?>','<?=$lt->n_idx;?>','-1');return false;" class="btn marginT4 teal lighten-2">위로</a><?php } ?></td>
            <td rowspan="2" class=""><?php if (count($list) > 1 and count($list) != $ii) {?><a href="#정렬아래로" onclick="rangeEdit('<?=$lt->n_range;?>','<?=$lt->n_idx;?>','1');return false;" class="btn marginT4 teal lighten-2">아래로</a><?php } ?></td>
            <td rowspan="2" class="width40P padding0 line0"><img class="width100P" src="<?=$thumb_img; ?>" alt="<?=$lt->original_name; ?>"></td><td class="left-align">텍스트 : <?=$lt->n_text; ?></td><td rowspan="2" class="width15P"><a href="/admin/banner_l/<?=$lt->n_idx;?>" onclick="">수정</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#삭제" onclick="bannerDel('<?=$lt->n_idx;?>');return false;">삭제</a></td>
          </tr>
          <tr><td class="width40P left-align">주소 : <a href="<?=$lt->n_link; ?>"><?=$lt->n_link; ?></a></td></tr>
          <?
            $ii++;
            }
          if(@$error){
            echo $error."<br />";
          }
          ?>
          <?php echo validation_errors(); ?>
        </tbody>
      </table>
    </div>
    <script type="text/javascript">
    </script>
  </body>
</html>
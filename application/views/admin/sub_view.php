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
    <h2>페이지 기타</h2>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_title');
      echo form_open("/admin/sub_title" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_title">페이지 타이틀<br />상단 주소표시줄 부분에 표시되는 문구</label></th>
                <td rowspan="2"><input type="text" id="s_title" name="s_title" value="<?=isset($list->s_title) ? $list->s_title : '';?>" /><button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_description');
      echo form_open("/admin/sub_description" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_description">페이지에 관한 짧은 설명</label></th>
                <td><input type="text" id="s_description" name="s_description" value="<?=isset($list->s_description) ? $list->s_description : '';?>" /><button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_keyword');
      echo form_open("/admin/sub_keyword" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_keyword">검색 키워드</label></th>
                <td><input type="text" id="s_keyword" name="s_keyword" class="" value="<?=isset($list->s_keyword) ? $list->s_keyword : '';?>" /><button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_log');
      echo form_open("/admin/sub_log" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_log">페이지 로그스크립트</label></th>
                <td><textarea name="s_log" id="s_log" class="materialize-textarea" ><?=isset($list->s_log) ? $list->s_log : '';?></textarea><button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $logo_img = '/uploads/header/'.$list->s_logo;
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_logo');
      echo form_open_multipart("/admin/sub_logo" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="logoBox">메인 상단 로고</label></th>
                <td><input type="file" id="logoBox" name="userfile" value="<?=set_value('userfile'); ?>" />등록 버튼을 눌러야 이미지가 수정 됩니다.<br /><img src="<?=isset($logo_img) ? $logo_img : '';?>" alt="">
                <input type="hidden" id="s_logo" name="s_logo" value="<?=isset($list->s_logo) ? $list->s_logo : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_link">로고 링크</label></th>
                <td><input type="text" name="s_link" id="s_link" value="<?=isset($list->s_link) ? $list->s_link : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_text">이미지 텍스트</label></th>
                <td><input type="text" id="s_text" name="s_text" value="<?=isset($list->s_text) ? $list->s_text : '';?>" />이미지에 대한 설명을 적어주세요.<button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $footer_img = '/uploads/header/'.$list->s_Flogo;
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_footer');
      echo form_open_multipart("/admin/sub_footer" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_Flogo">하단 로고</label></th>
                <td><input type="file" id="FlogoBox" name="userfile" value="<?=isset($footer_img) ? $footer_img : '';?>" />등록 버튼을 눌러야 이미지가 수정 됩니다.<br /><img src="<?=isset($footer_img) ? $footer_img : '';?>" alt="">
                <input type="hidden" id="s_Flogo" name="s_Flogo" value="<?=isset($list->s_Flogo) ? $list->s_Flogo : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_Flink">로고 링크</label></th>
                <td><input type="text" name="s_Flink" id="s_Flink" value="<?=isset($list->s_Flink) ? $list->s_Flink : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_Ftext">이미지 텍스트</label></th>
                <td><input type="text" id="s_Ftext" name="s_Ftext" value="<?=isset($list->s_Ftext) ? $list->s_Ftext : '';?>" />이미지에 대한 설명을 적어주세요.<button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'upload_info');
      echo form_open("/admin/sub_info" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="30%">
             <col width="70%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="s_info">하단 사이트 정보</label></th>
                <td><textarea name="s_info" id="s_info" class="materialize-textarea"><?=isset($list->s_info) ? $list->s_info : '';?></textarea><button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button></td>
              </tr>
            </tbody>
          </table>
     </form>
    </div>
  </body>
</html>
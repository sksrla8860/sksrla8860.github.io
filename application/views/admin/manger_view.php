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
      echo form_open("/admin/manger_v" , $attributes);
      ?>
          <table class="tableStyle">
           <colgroup>
             <col width="15%">
             <col width="35%">
             <col width="15%">
             <col width="35%">
           </colgroup>
            <tbody>
              <tr>
                <th><label for="m_id">관리자 아이디</label></th>
                <td><input type="text" id="m_id" name="m_id" value="<?=isset($list->m_id) ? $list->m_id : '';?>" disabled /></td>
                <th><label for="m_cam">해당 캠퍼스</label></th>
                <td>
                  <select name="m_cam" id="m_cam" class="browser-default">
                    <option value="0" <?= set_select('0', $list->m_cam, $list->m_cam == 0 ? true : false); ?>> - 선 택 -</option>
                    <option value="1" <?= set_select('1', $list->m_cam, $list->m_cam == 1 ? true : false); ?>>강 남</option>
                    <option value="3" <?= set_select('3', $list->m_cam, $list->m_cam == 3 ? true : false); ?>>신 촌</option>
                    <option value="11" <?= set_select('11', $list->m_cam, $list->m_cam == 11 ? true : false); ?>>대 전</option>
                    <option value="12" <?= set_select('12', $list->m_cam, $list->m_cam == 12 ? true : false); ?>>대 구</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th><label for="s_title">관리자 이름</label></th>
                <td><input type="text" id="m_name" name="m_name" value="<?=isset($list->m_name) ? $list->m_name : '';?>" /></td>
                <th><label for="s_title">관리자 비밀번호</label></th>
                <td><input type="password" id="m_password" name="m_password" value="<?=isset($list->m_password) ? $this->encrypt->decode($list->m_password) : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_title">관리자 이메일</label></th>
                <td><input type="text" id="m_mail" name="m_mail" value="<?=isset($list->m_mail) ? $list->m_mail : '';?>" /></td>
                <th><label for="s_title">비밀번호 확인</label></th>
                <td><input type="password" id="ok_password" name="ok_password" value="<?=isset($list->m_password) ? $this->encrypt->decode($list->m_password) : '';?>" /></td>
              </tr>
              <tr>
                <th><label for="s_title">관리자 연락처<br />(문자송수신용)</label></th>
                <td><input type="text" id="m_phone" name="m_phone" value="<?=isset($list->m_phone) ? $list->m_phone : '';?>" maxlength="13" /></td>
                <th><label for="s_title">사이트 노출 번호<br />(배너연결용)</label></th>
                <td><input type="text" id="m_tell" name="m_tell" value="<?=isset($list->m_tell) ? $list->m_tell : '';?>" maxlength="13" /></td>
              </tr>
              <tr>
                <th><label for="s_title">상담관리(asd)코드</label></th>
                <td colspan="3"><input type="text" id="m_asdCode" name="m_asdCode" value="<?=isset($list->m_asdCode) ? $list->m_asdCode : '';?>" />ex)ASD상담관리 자동등록용</td>
              </tr>
            </tbody>
          </table>
          <button class="btn grey darken-1 marginT10 right" type="submit"><span class="btnText">등록</span><i class="material-icons">file_upload</i></button>
     </form>
    </div>
    <script>
      $(function(){
        $(".onlynum").keyup(function () {
          $(this).val($(this).val().replace(/[^0-9]/g, ""));
        });
      });
    </script>
  </body>
</html>
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('admin_m');
    $this->load->helper(array('url', 'date', 'form', 'alert', 'lib'));
    $this->load->library('session');
    $this->js_load = array('inquiry.js', 'banner.js');
    $this->css_load = array();
    
  }
  
  public function index()
  {
    $this->login();
  }
  function segment_explode($seg) { //세크먼트 앞뒤 '/' 제거후 uri를 배열로 반환
    $len = strlen($seg);
    if(substr($seg, 0, 1) == '/') {
        $seg = substr($seg, 1, $len);
    }
    $len = strlen($seg);
    if(substr($seg, -1) == '/') {
        $seg = substr($seg, 0, $len-1);
    }
    $seg_exp1 = explode("/", $seg);
 
        //쿼리스트링을 $seg_ext와 동일한 형태의 배열로 반환
        if($_SERVER["QUERY_STRING"]){
            $s_arr=array();
            $strings = explode("&", $_SERVER["QUERY_STRING"]);
            foreach ($strings as $strs) {
                $a_arr = explode("=", $strs);
                foreach ($a_arr as $atrs) {
                    array_push($s_arr, $atrs);
                }
            }
            //맨끝 쿼리스트링 제거
            array_pop($seg_exp1);
            //쿼리스트링을 제거한 배열과 쿼리스트링을 배열화한 것을 합쳐서 반환
            $seg_exp = array_merge($seg_exp1, $s_arr);
        } else {
            $seg_exp = $seg_exp1;
        }
    return $seg_exp;
}
  
  function url_explode($url, $key)
  {
    $cnt = count($url);
    for($i=0; $cnt>$i; $i++)
    {
      if($url[$i] == $key)
      {
        $k = $i+1;
        return $url[$k];
      }
    }
  }
  
  public function login()
  {
    $this->css_load = array('materialize.css', 'login.css');
    $data['css_load'] = $this->css_load;
    $this->load->library(array('form_validation', 'encrypt'));
    $this->load->helper('password');
    $this->form_validation->set_rules('m_id', '아이디', 'required|alpha_numeric');
    $this->form_validation->set_rules('m_password', '비밀번호', 'required');
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    if( $this->form_validation->run() == TRUE )
    {
      $password = password_hash($this->input->post('m_password'), PASSWORD_BCRYPT);
      echo ($password); exit;
      $auth_data = array(
          'm_id' => $this->input->post('m_id', TRUE),
          'm_password' => $password
      );
      
      $result = $this->admin_m->login($auth_data);
      
      if( $result )
      {
        // 세션생성
        $newdata = array(
          'm_id' => $result->m_id,
          'm_name' => $result->m_name,
          'logged_in' => TRUE
        );
        
        $this->session->set_userdata($newdata);
        
        if($newdata['m_name'] == '관리자'){
          alert('환영합니다. '.$newdata['m_name'].'님\n * 성함 및 정보를 수정 해주시기 바랍니다.', '/admin/manger_v');
        }else{
          alert('환영합니다. '.$newdata['m_name'].'님', '/admin/board');
        }
        
        exit;
      }
      else
      {
        // 실패
        alert('아이디 및 비밀번호를 확인해주세요.', '/join/login');
        exit;
      }
      
    }
    else
    {
      // 쓰기폼 view호출
      $this->load->view('/admin/LoginView', $data);
    }
  }
  
  public function logout()
  {
    $this->session->sess_destroy();
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    alert('로그아웃 되었습니다.', '/join/login');
    exit;
  }
  
}
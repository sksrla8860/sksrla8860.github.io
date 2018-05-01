<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicecenter extends CI_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->css_load = array('header.css');
    $this->load->model('admin_m');
    $this->load->helper(array('url', 'date', 'form', 'alert', 'lib'));
  }
  
  public function index()
  {
    $this->cust_pay();
  }
  
  public function _remap($method)
  {
    //$chk["aaa"] = $method->css;
    //$this->load->vars($chk);
    
    $data['sub'] = $this->admin_m->get_list_sub();
    $data['manger'] = $this->admin_m->get_manger();
    // 헤더 추가
    $this->load->view('inc/html_top', $data);
    $this->load->view('inc/header', $data);
    
    if( method_exists($this, $method) )
    {
      $this->{"{$method}"}();
    }
    // 푸터 추가
    $this->load->view('inc/quick', $data);
    $this->load->view('inc/footer', $data);
  }

  function cust_pay()
  {
    $data["menu_title"] = "온라인 결제";
    $data["menu_Etitle"] = "Online Payment";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('servicecenter/cust_pay');
  }


  public function online_consultation()
  {
    $data["menu_title"] = "온라인상담";
    $data["menu_Etitle"] = "Online Consultation";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      $prevPage = $_SERVER['HTTP_REFERER']; // 이전페이지 저장
      
      $this->load->helper('alert');
      
      if( !$this->input->post('i_writer', TRUE) AND !$this->input->post('i_num', TRUE) AND !$this->input->post('i_name', TRUE) )
      {
        alert('내용을 모두 작성 부탁드립니다.', '/servicecenter/online_consultation');
        exit();
      }
      
      $writer_data = array(
        'i_name' => $this->input->post('i_name', TRUE),
        'i_writer' => $this->input->post('i_writer', TRUE),
        'i_num' => $this->input->post('i_num', TRUE),
        'i_mail' => $this->input->post('email1', TRUE) + '@' + $this->input->post('email2', TRUE),
        'i_title' => $this->input->post('i_title', TRUE),
        'i_contents' => $this->input->post('i_contents', TRUE),
        'i_route' => '2'
      );
      
      $result = $this->admin_m->insert_inquiry($writer_data);
      
      if( $result )
      {
        alert('문의가 성공적으로 등록 되었습니다. 빠른 답변 드릴 수 있도록 노력하겠습니다.','/servicecenter/online_consultation');
      }
      else
      {
        alert('문의내용을 등록하지 못하였습니다. 다시 입력 부탁드립니다.', '/servicecenter/online_consultation');
      }
    }else{
        $this->load->view('servicecenter/online_consultation');
    }
  }


  public function tuition_fee()
  {
    $data["menu_title"] = "수강료조회";
    $data["menu_Etitle"] = "Tuition fee";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      $prevPage = $_SERVER['HTTP_REFERER']; // 이전페이지 저장
      
      $this->load->helper('alert');
      
      if( !$this->input->post('i_writer', TRUE) AND !$this->input->post('i_num', TRUE) AND !$this->input->post('i_name', TRUE) )
      {
        alert('내용을 모두 작성 부탁드립니다.', '/servicecenter/tuition_fee');
        exit();
      }
      
      $writer_data = array(
        'i_name' => $this->input->post('i_name', TRUE),
        'i_writer' => $this->input->post('i_writer', TRUE),
        'i_num' => $this->input->post('i_num', TRUE),
        'i_mail' => $this->input->post('email1', TRUE) + '@' + $this->input->post('email2', TRUE),
        'i_title' => $this->input->post('i_title', TRUE),
        'i_contents' => $this->input->post('i_contents', TRUE),
        'i_route' => '3'
      );
      
      $result = $this->admin_m->insert_inquiry($writer_data);
      
      if( $result )
      {
        alert('문의가 성공적으로 등록 되었습니다. 빠른 답변 드릴 수 있도록 노력하겠습니다.','/servicecenter/tuition_fee');
      }
      else
      {
        alert('문의내용을 등록하지 못하였습니다. 다시 입력 부탁드립니다.', '/servicecenter/tuition_fee');
      }
    }else{
        $this->load->view('servicecenter/tuition_fee');
    }
  }


  public function locationGuide()
  {
    $data["menu_title"] = "캠퍼스 위치안내";
    $data["menu_Etitle"] = "Campus Location Guide";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      $prevPage = $_SERVER['HTTP_REFERER']; // 이전페이지 저장
      
      $this->load->helper('alert');
      
      if( !$this->input->post('i_writer', TRUE) AND !$this->input->post('i_num', TRUE) )
      {
        alert('내용을 모두 작성 부탁드립니다.', '/servicecenter/locationGuide');
        exit();
      }
      
      $writer_data = array(
        'i_name' => '',
        'i_writer' => $this->input->post('i_writer', TRUE),
        'i_num' => $this->input->post('i_num', TRUE),
        'i_mail' => $this->input->post('email1', TRUE) + '@' + $this->input->post('email2', TRUE),
        'i_title' => $this->input->post('i_title', TRUE),
        'i_contents' => $this->input->post('i_contents', TRUE),
        'i_route' => '4'
      );
      
      $result = $this->admin_m->insert_inquiry($writer_data);
      
      if( $result )
      {
        alert('문의가 성공적으로 등록 되었습니다. 빠른 답변 드릴 수 있도록 노력하겠습니다.','/servicecenter/locationGuide');
      }
      else
      {
        alert('문의내용을 등록하지 못하였습니다. 다시 입력 부탁드립니다.', '/servicecenter/locationGuide');
      }
    }else{
        $this->load->view('servicecenter/locationGuide');
    }
  }

/*  function CorporateGroupTraining()
  {
    $data["menu_title"] = "기업 단체교육";
    $data["menu_Etitle"] = "Corporate Group Training";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('servicecenter/CorporateGroupTraining');
  }*/

  function CorporateGroupTraining()
  {
    $data["menu_title"] = "기업 단체교육";
    $data["menu_Etitle"] = "Corporate Group Training";
    $this->load->library('form_validation');
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    
    //폼 검증할 필드와 규칙 사전 정의
    $this->form_validation->set_rules('l_name', '회사명', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('l_writer', '작성자', 'trim|required|max_length[10]');
    $this->form_validation->set_rules('l_course', '과정', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_num', '연락처', 'trim|required|max_length[11]');
    $this->form_validation->set_rules('l_mail', '메일', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_contents', '내용', 'trim|required|max_length[10000]');
    $this->form_validation->set_rules('l_people', '인원', 'trim|required|max_length[1000]');
    $this->form_validation->set_rules('l_place', '장소', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_business', '사업분야', 'trim|required|max_length[100]');
    if ($this->form_validation->run() == TRUE) {
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
      if ($_POST) {
            $write_data = array(
              'l_division' => "기업",
              'l_name' => $this->input->post("l_name", true),
              'l_writer' => $this->input->post("l_writer", true),
              'l_course' => $this->input->post("l_course", true),
              'l_num' => $this->input->post("l_num", true),
              'l_mail' => $this->input->post("l_mail", true, 0),
              'l_contents' => $this->input->post("l_contents", true, 0),
              'l_people' => $this->input->post("l_people", true, 0),
              'l_place' => $this->input->post("l_place", true, 0),
              'l_business' => $this->input->post("l_business", true),
              'user_ip' => $this->input->ip_address()
            );
            $result = $this->admin_m->insert_lecture($write_data);
          if ($result) {
            alert("기업출강 신청이 완료 되었습니다.", "CorporateGroupTraining");
          } else {
            alert("기업출강 신청에 실패했습니다.", "CorporateGroupTraining"); 
          }
          exit;
      } else {
        $this->load->view('servicecenter/CorporateGroupTraining',$data);
      }
    } else {
      $this->load->view('servicecenter/CorporateGroupTraining',$data);
    }
  }

  function universityCustomizedEducation()
  {
    $data["menu_title"] = "대학맞춤교육";
    $data["menu_Etitle"] = "University Customized Education";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('servicecenter/universityCustomizedEducation');
  }

  function universityCustomizedEducation_Apply()
  {
    $data["menu_title"] = "대학맞춤교육";
    $data["menu_Etitle"] = "University Customized Education";
    $this->load->library('form_validation');
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    
    //폼 검증할 필드와 규칙 사전 정의
    $this->form_validation->set_rules('l_name', '학교명', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('l_writer', '작성자', 'trim|required|max_length[10]');
    $this->form_validation->set_rules('l_course', '과정', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_num', '연락처', 'trim|required|max_length[11]');
    $this->form_validation->set_rules('l_mail', '메일', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_contents', '내용', 'trim|required|max_length[10000]');
    $this->form_validation->set_rules('l_people', '인원', 'trim|required|max_length[1000]');
    $this->form_validation->set_rules('l_place', '장소', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('l_period', '기간', 'trim|required|max_length[30]');
    if ($this->form_validation->run() == TRUE) {
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
      if ($_POST) {
            $write_data = array(
              'l_division' => "대학",
              'l_name' => $this->input->post("l_name", true),
              'l_writer' => $this->input->post("l_writer", true),
              'l_course' => $this->input->post("l_course", true),
              'l_num' => $this->input->post("l_num", true),
              'l_mail' => $this->input->post("l_mail", true, 0),
              'l_contents' => $this->input->post("l_contents", true, 0),
              'l_people' => $this->input->post("l_people", true, 0),
              'l_place' => $this->input->post("l_place", true, 0),
              'l_business' => $this->input->post("l_business", true),
              'l_period' => $this->input->post("l_period", true),
              'user_ip' => $this->input->ip_address()
            );
            $result = $this->admin_m->insert_university($write_data);
          if ($result) {
            alert("대학맞춤교육 신청이 완료 되었습니다.", "universityCustomizedEducation_Apply");
          } else {
            alert("대학맞춤교육 신청에 실패했습니다.", "universityCustomizedEducation_Apply"); 
          }
          exit;
      } else {
        $this->load->view('servicecenter/universityCustomizedEducation_Apply',$data);
      }
    } else {
      $this->load->view('servicecenter/universityCustomizedEducation_Apply',$data);
    }
  }

  function policyPop()
  {
    $this->load->view('main/policyPop');
  }
    
}
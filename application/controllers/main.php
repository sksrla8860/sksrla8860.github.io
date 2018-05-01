<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
  
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
    $this->main();
  }
  
  public function _remap($method)
  {
    //$chk["aaa"] = $method->css;
    //$this->load->vars($chk);
    
    
    if( method_exists($this, $method) )
    {
      $this->{"{$method}"}();
    }
  }


  public function main()
  {
    $data['sub'] = $this->admin_m->get_list_sub();
    $data['manger'] = $this->admin_m->get_manger();
    
    $data['banner'] = $this->admin_m->get_list_banner();
    $this->load->library('simplexml'); //XML 라이브러리
    $fileName = "http://www.greenart.co.kr/xml/sbjt_main_xml.asp?cam_idx=".$data['manger']->m_cam; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    $fileName = "http://www.greenart.co.kr/xml/employList_xml.asp?pagesize=1&main=1"; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data["job"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    $fileName = "http://www.greenart.co.kr/xml/campusEvent_main_xml.asp"; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data["event"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    $data['board'] = $this->admin_m->get_list_board('board', '');
    
    // 헤더 추가
    $this->load->view('inc/html_top', $data);
    $this->load->view('inc/header', $data);
    $this->load->view('main_v', $data);
    // 푸터 추가
    $this->load->view('inc/quick', $data);
    $this->load->view('inc/footer', $data);
  }


  public function quick_writer()
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      $prevPage = $_SERVER['HTTP_REFERER']; // 이전페이지 저장
      
      $this->load->helper('alert');
      
      if( !$this->input->post('i_writer', TRUE) AND !$this->input->post('i_num', TRUE) AND !$this->input->post('i_name', TRUE) )
      {
        alert('내용을 모두 작성 부탁드립니다.', '/main/main');
        exit();
      }
      
      $writer_data = array(
        'i_name' => $this->input->post('i_name', TRUE),
        'i_writer' => $this->input->post('i_writer', TRUE),
        'i_num' => $this->input->post('i_num', TRUE),
        'i_mail' => '',
        'i_title' => '',
        'i_contents' => '',
        'i_route' => '1'
      );
      
      $result = $this->admin_m->insert_inquiry($writer_data);
      
      if( $result )
      {
        alert('문의가 성공적으로 등록 되었습니다. 빠른 답변 드릴 수 있도록 노력하겠습니다.','/main');
      }
      else
      {
        alert('문의내용을 등록하지 못하였습니다. 다시 입력 부탁드립니다.', '/main');
      }
    }
  }


  public function agreement()
  {
    $data["menu_title"] = "이용약관 & 개인정보취급방침";
    $data["menu_Etitle"] = "Terms & Privacy Policy";
    $data['sub'] = $this->admin_m->get_list_sub();
    $data['manger'] = $this->admin_m->get_manger();
    // 헤더 추가
    $this->load->view('inc/html_top', $data);
    $this->load->view('inc/header', $data);
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('agreement');
    // 푸터 추가
    $this->load->view('inc/quick', $data);
    $this->load->view('inc/footer', $data);
  }


  public function siteMap()
  {
    $data["menu_title"] = "사이트 맵";
    $data["menu_Etitle"] = "Site Map";
    $data['sub'] = $this->admin_m->get_list_sub();
    $data['manger'] = $this->admin_m->get_manger();
    // 헤더 추가
    $this->load->view('inc/html_top', $data);
    $this->load->view('inc/header', $data);
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('siteMap');
    // 푸터 추가
    $this->load->view('inc/quick', $data);
    $this->load->view('inc/footer', $data);
  }


  public function policyPop()
  {
    $this->load->view('policyPop');
  }
    
    
  
}
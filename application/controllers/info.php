<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller{
  
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
    $this->whyGreen();
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

  function whyGreen()
  {
    $data["menu_title"] = "왜 그린인가";
    $data["menu_Etitle"] = "Why";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/whyGreen');
  }

  function greenIntroduce()
  {
    $data["menu_title"] = "기관소개";
    $data["menu_Etitle"] = "Green Introduce";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/greenIntroduce');
  }

  function greenHistory()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    $homepage["list"] = file_get_contents('http://www.greenart.co.kr/green/greenHistory_i.asp');

    // echo $homepage;
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $data["menu_title"] = "기관연혁";
    $data["menu_Etitle"] = "Green History";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/greenHistory', $homepage);
  }

  function greenbusiness()
  {
    $data["menu_title"] = "사업영역";
    $data["menu_Etitle"] = "Field of business";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/greenbusiness');
  }

  function instructorintroduction()
  {
    $data["cam_idx"] = $this->admin_m->get_cam();
    $this->load->library('simplexml'); //XML 라이브러리

    //목록데이터
    $fileName = "http://www.greenart.co.kr/xml/teacherList_xml.asp?cam_idx=".$data["cam_idx"]->m_cam; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    /*var_dump($data["list"]);*/
    $data["menu_title"] = "강사 소개";
    $data["menu_Etitle"] = "Introduce a Lecturer";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/instructorintroduction', $data);
  }

  function teacherImgView($idx='')
  {
    
    $this->load->library('simplexml'); //XML 라이브러리

    //목록데이터
    $fileName = "https://www.greenart.co.kr/xml/teacherImgView_xml.asp?t_idx=".$idx; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["view"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    var_dump($data["view"]);
    return $data;
  }

  function affiliateUniversityBenefits()
  {
    $data["menu_title"] = "제휴대학 혜택";
    $data["menu_Etitle"] = "Affiliate University Benefits";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/affiliateUniversityBenefits');
  }

  function affiliationsSuggestions_list()
  {
    $data["menu_title"] = "제휴서비스";
    $data["menu_Etitle"] = "Affiliations service";
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/alliance_xml.asp?sortidx="; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('info/affiliationsSuggestions_list', $data);
  }
    
    
  
}
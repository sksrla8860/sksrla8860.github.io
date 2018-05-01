<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inner extends CI_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    //$this->css_load = array('header.css', 'subTitle.css');
    $this->load->model('admin_m');
    $this->load->helper(array('url', 'date', 'form', 'alert', 'lib'));
  }
  
  public function index()
  {
    $this->employList_inner();
  }

  function employList_inner()
  {
    $pageIndex = $this->input->post("page", true);
    // echo ($this->input->post("pageIndex", true));
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/employList_xml.asp?pagesize=24&main=0&page=".$pageIndex; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('jobcenter/employList_inner', $data);
    }else{
      return;
    }
    
  }

  function successStories_inner()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    /*$this->load->library("pagination"); // 페이지네이션 라이브러리*/
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["sch_type"] = $this->input->get("sch_type", true); //검색 파라미터
    $fileName = "http://www.greenart.co.kr/xml/std_jobinterview_xml.asp?page=".$data["page"]."&sch_val=".$data["sch_val"]."&sch_type=".$data["sch_type"]; // xml파싱용 파일호출
    /*echo($fileName);*/
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('jobcenter/successStories_inner', $data);
    }else{
      return;
    }
    
  }

  function student_review_inner()
  {
    $pageIndex = $this->input->get("page", true);
    $sch_type = $this->input->get("sch_type", true);
    $sch_val = $this->input->get("sch_val", true);
    $data['manger'] = $this->admin_m->get_manger();
    // echo ($this->input->post("pageIndex", true));
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/std_interview_xml.asp?sch_type=".$sch_type."&sch_val=".$sch_val."&cam_idx=".$data['manger']->m_cam."&page=".$pageIndex; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('community/student_review_inner', $data);
    }else{
      return;
    }
    
  }

  function campusEvents_inner()
  {
    $pageIndex = $this->input->post("page", true);
    $searchString = $this->input->post("searchString", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/campusEvent_xml.asp?page=".$pageIndex."&searchString=".$searchString; // xml파싱용 파일호출
    /*echo ($fileName);*/
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('community/campusEvents_inner', $data);
    }else{
      return;
    }
    
  }

  function portfolio_inner()
  {
    $page = $this->input->post("page", true);
    $s_kind = $this->input->post("s_kind", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/gallery_xml.asp?pagesize=16&s_part=&s_text=&s_kind=".$s_kind."&intnowpage=".$page; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('portfolio/portfolio_inner', $data);
    }else{
      return;
    }
    
  }

  function portfolio_inner_part()
  {
    $s_kind = $this->input->post("s_kind", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/gallery_xml.asp?pagesize=16&s_part=&s_text=&s_kind=".$s_kind."&intnowpage="; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('portfolio/portfolio_inner_part', $data, $s_kind);
    }else{
      return;
    }
    
  }

  function affiliationsSuggestions_list_inner()
  {
    $sortidx = $this->input->post("sortidx", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/alliance_xml.asp?sortidx=".$sortidx; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('info/affiliationsSuggestions_list_inner', $data, $sortidx);
    }else{
      return;
    }
    
  }

  function instructorintroduction_inner()
  {
    $cam_idx = $this->input->post("cam_idx", true);
    $thisId = $this->input->post("thisId", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/teacherList_xml.asp?cam_idx=".$cam_idx."&gp=".$thisId; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      $this->load->view('info/instructorintroduction_inner', $data);
    }else{
      return;
    }
    
  }

  function teacherImgView()
  {
    $t_idx = $this->input->post("t_idx", true);
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/teacherImgView_xml.asp?t_idx=".$t_idx; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    if(isset($xmlData['item'])){
      $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      
      $result = $data["list"];
      return $result;
    }else{
      return;
    }
    
  }

  function subjectGroupList()
  {
    $c_group = $this->input->post("c_group", true);
    $data['manger'] = $this->admin_m->get_manger();
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/sbjt_xml.asp?gp=".$c_group."&cam_idx=".$data['manger']->m_cam; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data['c_group'] = $c_group;
    if(isset($xmlData['item'])){
      $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      
      $this->load->view('curriculum/subjectGroupList', $data);
    }else{
      return;
    }
    
  }

  function subcode()
  {
    $c_group = $this->input->post("c_group", true);
    $data['manger'] = $this->admin_m->get_manger();
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/subcode_lv1_xml.asp?gc=".$c_group; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data['c_group'] = $c_group;
    if(isset($xmlData['item'])){
      $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      
      $this->load->view('subcode', $data);
    }else{
      return;
    }
    
  }

  function subjectMainList()
  {
    $c_group = $this->input->post("c_group", true);
    $c_idx = $this->input->post("c_idx", true);
    $data['manger'] = $this->admin_m->get_manger();
    $this->load->library('simplexml'); //XML 라이브러리
    
    $fileName = "http://www.greenart.co.kr/xml/sbjt_main_xml.asp?cam_idx=".$data['manger']->m_cam."&c_group=".$c_group."&c_id=".$c_idx."&name="; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item'])){
      $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
      // return $data;
      
      $this->load->view('subjectMainList', $data);
    }else{
      return;
    }
    
  }
    
}
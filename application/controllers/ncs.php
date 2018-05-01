<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ncs extends CI_Controller{
  
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
    $this->notice_list();
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


  function NationalCompetencyStandardsCenterV2()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $data["idx"] = $this->uri->segment(3);
    $this->site_title = "그린미디어";
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["lnkParam"] = "page=" . $data["page"] . "&sch_val=" . $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    
    //단일 데이터
    $fileName = "http://greenart.co.kr/xml/ncsBoard_view_xml.asp?b_idx=" . $data["idx"];
    $xmlRaw = file_get_contents($fileName);
    //echo var_dump($xmlRaw);
    $xmlData = $this->simplexml->xml_parse($xmlRaw);
    $data["view"] = $xmlData['item'];
    if (empty($data["view"])) alert("필요한 정보가 없습니다.", "/");


    //목록데이터
    $fileName = "http://www.greenart.co.kr/xml/ncsBoard_xml.asp?page=" . $data["page"]; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $config['num_links'] = 2; //페이징 처리 영역
    $config['use_page_numbers'] = true;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $data["idx"] . '?sch_val=' . $data["sch_val"];
    $totalRows = $xmlData["itemp"]["intrecordcount"];
    $config['total_rows'] = $totalRows;
    $config['per_page'] = 5;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    /*$data['intListNumber'] = $config['total_rows'] - ($start);*/
    $data['intListNumber'] = $config['total_rows'] - (($data['page'] - 1) * $config['per_page']);
    $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $data["menu_title"] = "NCS 소개";
    $data["menu_Etitle"] = "National Competency Standards Center";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('ncs/NationalCompetencyStandardsCenterV2', $data);
  }


  function GreenNationalCompetencyStandardsCenter()
  {
    $this->load->library(array('simplexml', 'curl'));
    $this->site_title = "그린미디어";
    $homepage["list"] = file_get_contents('http://www.greenart.co.kr/ncs/GreenNationalCompetencyStandardsCenter_i.asp');
    
    $data["menu_title"] = "그린 NCS 지원센터";
    $data["menu_Etitle"] = "Green National Competency Standards Center";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('ncs/GreenNationalCompetencyStandardsCenter', $homepage);
  }
    
    
  
}
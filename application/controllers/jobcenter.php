<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobcenter extends CI_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->css_load = array('header.css', 'subTitle.css');
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

  function GreenEmploymentSupportSystem()
  {
    $data["menu_title"] = "취업지원시스템";
    $data["menu_Etitle"] = "Green Employment Support System";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('jobcenter/GreenEmploymentSupportSystem');
  }

  function employmentManager()
  {
    $data["menu_title"] = "취업담당자";
    $data["menu_Etitle"] = "Job Manager";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('jobcenter/employmentManager');
  }

  function employList()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $data["page"] = $this->input->get("page", true); //페이지번호
    
    //단일 데이터
    $fileName = "http://www.greenart.co.kr/xml/employList_xml.asp?pagesize=1&main=1";
    $xmlRaw = file_get_contents($fileName);
    //echo var_dump($xmlRaw);
    $xmlData = $this->simplexml->xml_parse($xmlRaw);
    $data["view"] = $xmlData['item'];
    if (empty($data["view"])) alert("필요한 정보가 없습니다.", "/");
    
    $fileName = "http://www.greenart.co.kr/xml/employList_xml.asp?pagesize=24&main=0" ; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $data["menu_title"] = "취업현황";
    $data["menu_Etitle"] = "Current Condition of Employment";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('jobcenter/employList', $data);
  }


  function successStories()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    /*$this->load->library("pagination"); // 페이지네이션 라이브러리*/
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["sch_type"] = $this->input->get("sch_type", true); //검색 파라미터
    $data["lnkParam"] = $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://www.greenart.co.kr/xml/std_jobinterview_xml.asp?sch_val=" . $data["sch_val"] . "&sch_type=".$data["sch_type"]; // xml파싱용 파일호출
    /*echo ($fileName);*/
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
/*    $config['num_links'] = 2; //페이징 처리 영역
    $config['use_page_numbers'] = true;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/?sch_val=' . $data["sch_val"];
    $totalRows = $xmlData["item"]["intrecordcount"];
    $config['total_rows'] = $totalRows;
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();*/
    // $data['intListNumber'] = $config['total_rows'] - (($data['page'] - 1) * $config['per_page']);
    if(isset($xmlData['item']))
    {
        if (count($xmlData['item']) == count($xmlData['item'],1))
        {
          $arrData = Array();
          array_push($arrData,$xmlData['item']);
          $data["xml"] = $arrData;
        }else{
          $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
        }
    }
    else
    {
      $data["xml"] = '';
    }
    $data["menu_title"] = "취업후기";
    $data["menu_Etitle"] = "Success Stories";
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('jobcenter/successStories', $data);
  }

  function successStories_view()
  {
    $this->load->library('simplexml'); //XML 라이브러리
    $fileName = "http://www.greenart.co.kr/xml/std_jobinterview_view_xml.asp?idx=".$this->uri->segment(3); // xml파싱용 파일호출
    // echo ($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $data["menu_title"] = "취업후기";
    $data["menu_Etitle"] = "Success Stories";
   
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('jobcenter/successStories_view', $data);
  }
    
}
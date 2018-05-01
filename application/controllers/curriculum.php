<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum extends CI_Controller{
  
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


  function curriculum_list()
  {$this->output->enable_profiler(TRUE);
    $kategorie = $this->uri->segment(4);
    switch($kategorie){
      case 0 :
        $data["menu_title"] = "아트웍 과정";
        $data["menu_Etitle"] = "Artwork";
        break;
      case 1 :
        $data["menu_title"] = "웹디자인 과정";
        $data["menu_Etitle"] = "Web Design";
        break;
      case 2 :
        $data["menu_title"] = "편집디자인 과정";
        $data["menu_Etitle"] = "Design editor";
        break;
      case 3 :
        $data["menu_title"] = "실내/산업디자인 과정";
        $data["menu_Etitle"] = "Indoor/Industrial Design";
        break;
      case 4 :
        $data["menu_title"] = "게임/영상/마야 과정";
        $data["menu_Etitle"] = "Games/Video/Maya";
        break;
      case 5 :
        $data["menu_title"] = "SW개발 과정";
        $data["menu_Etitle"] = "SW Development";
        break;
      case 6 :
        $data["menu_title"] = "세무회계/OA 과정";
        $data["menu_Etitle"] = "Tax accounting/OA";
        break;
      case 7 :
        $data["menu_title"] = "단과/자격증 과정";
        $data["menu_Etitle"] = "Short courses/Certificate";
        break;
    }
    
    $this->load->library('simplexml'); //XML 라이브러리
    $this->site_title = "그린미디어";
    
    // 주소에 q가 있는지 검사
    $uri_array = $this->segment_explode($this->uri->uri_string());
    
    if( in_array('gp', $uri_array) ){
      //q가 있을경우 
      $search_word = urldecode($this->url_explode($uri_array, 'gp'));
      
      // 페이지네이션용 주소
      $page_url = '/gp/'.$search_word;
      $uri_segment = 4;
    }
   
    $cam_idx = $this->admin_m->get_cam();
   // var_dump();
    //목록데이터
    $fileName = "http://www.greenart.co.kr/xml/sbjt_xml.asp?sub_name=&gp=".$this->uri->segment(4)."&cam_idx=".$cam_idx->m_cam; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('curriculum/curriculum_list', $data);
  }


  function curriculum_detail()
  {
    
    $this->load->library('simplexml'); //XML 라이브러리
    $this->site_title = "그린미디어";
    $cam_idx = $this->admin_m->get_manger();
    
    //목록데이터
    $fileName = "http://www.greenart.co.kr/xml/sbjt_detail_xml.asp?idx=".$this->uri->segment(5); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    }
    //강사 데이터
    $fileName = "http://www.greenart.co.kr/xml/sbjt_detail_teacher_xml.asp?gp=".$this->uri->segment(4)."&sus_idx=".$this->uri->segment(5)."&cam_idx=".$cam_idx->m_cam; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        $data["teacher"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    }
    
    
    //포트폴리오
    $fileName = "http://www.greenart.co.kr/xml/sbjt_detail_port_xml.asp?gp=".$this->uri->segment(4)."&sus_idx=".$this->uri->segment(5); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        $data["portfolio"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    }
    
    //수강후기
    $fileName = "http://www.greenart.co.kr/xml/sbjt_detail_review_xml.asp?gp=".$this->uri->segment(4); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        $data["review"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    }
    
    //추천과정
    $fileName = "http://www.greenart.co.kr/xml/sbjt_detail_recommend_xml.asp?gp=".$this->uri->segment(4)."&cam_idx=".$cam_idx->m_cam; // xml파싱용 파일호출
    // echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        $data["recommend"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    }
    
    $this->load->view('curriculum/curriculum_detail', $data);
  }


  function supportSystem()
  {
    $data["menu_title"] = "지원제도 안내";
    $data["menu_Etitle"] = "Support System";
    
    
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('curriculum/supportSystem', $data);
  }
    
  
}
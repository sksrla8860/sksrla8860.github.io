<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller{
  
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
    $this->portfolio_list();
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


  function portfolio_list()
  {
    $data["menu_title"] = "수강생 포트폴리오";
    $data["menu_Etitle"] = "Students' Portfolio";
    
    $uri_segment = 4;
    
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
    
    // 페이지네이션
    $this->load->library('pagination');
    
    // 페이지네이션 설정
    $config['base_url'] = 'community/notice_l/page';
    $config['total_rows'] = $this->admin_m->get_list_board("board", 'count', '', '');
    $config['per_page'] = 5;
    $config['uri_segment'] = $uri_segment;
    
    // echo $config['total_rows'];
    $this->pagination->initialize($config);
    
    $data['pagination'] = $this->pagination->create_links();
    
    $page = $this->uri->segment($uri_segment, 1);
    
    if( $page > 1 )
    {
      $start = (($page/$config['per_page'])) * $config['per_page'];
    }
    else
    {
      $start = ($page-1) * $config['per_page'];
    }
    $limit = $config['per_page'];
    
    //목록데이터
    /*$fileName = "http://www.greenart.co.kr/xml/gallery_xml.asp?pagesize=16&cam_idx="&str_cam_idx&"&s_part="&s_part&"&s_text="&s_text&"&s_kind="&s_kind&"&intnowpage="&intnowpage; // xml파싱용 파일호출*/
    /*http://www.greenart.co.kr/xml/gallery_xml.asp?pagesize=16&s_part="&s_part&"&s_text="&s_text&"&s_kind="&s_kind&"&intnowpage="&intpage*/
    $fileName = "http://www.greenart.co.kr/xml/gallery_xml.asp?pagesize=16&s_part=&s_text=&s_kind=".$this->uri->segment(3)."&intnowpage="; // xml파싱용 파일호출
    // echo ($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    if(isset($xmlData['item']))
    {
        if (count($xmlData['item']) == count($xmlData['item'],1))
        {
          $arrData = Array();
          array_push($arrData,$xmlData['item']);
          $data["list"] = $arrData;
        }else{
          $data["list"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
        }
    }
    else
    {
      $data["list"] = '';
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('portfolio/portfolio_list', $data);
  }
    
  
}
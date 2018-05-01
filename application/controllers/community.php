<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller{
  
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

  public function notice_list()
  {
    $data["menu_title"] = "공지사항";
    $data["menu_Etitle"] = "NOTICE";
    // $this->output->enable_profiler(TRUE);
    
    $data["page"] = $this->input->get("page", true); //페이지번호
    // 검색어 초기회
    $search_word = $page_url = '';
    $uri_segment = 4;
    
    // 주소에 q가 있는지 검사
    $uri_array = $this->segment_explode($this->uri->uri_string());
    
    if( in_array('q', $uri_array) ){
      //q가 있을경우 
      $search_word = urldecode($this->url_explode($uri_array, 'q'));
      
      // 페이지네이션용 주소
      $page_url = '/q/'.$search_word;
      $uri_segment = 4;
    }
    
    // 페이지네이션
    $this->load->library('pagination');
    
    // 페이지네이션 설정
    $config['base_url'] = '/community/notice_list/page';
    $config['total_rows'] = $this->admin_m->get_list_board("board", 'count', '', '', $search_word);
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
    
    $data['intListNumber'] = $config['total_rows'] - ($start);
    /*$data['intListNumber'] = $config['total_rows'] - (($data['page'] - 1) * $config['per_page']);*/
    $data['list'] = $this->admin_m->get_list_board('board', '', $start, $limit, $search_word);
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/notice_l', $data);
  }


/*  function notice_view()
  {
    $data["menu_title"] = "공지사항";
    $data["menu_Etitle"] = "NOTICE";
    
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $this->site_title = "그린미디어";
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["lnkParam"] = "page=" . $data["page"] . "&sch_val=" . $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://www.greenart.co.kr/xml/std_interview_view_xml.asp?idx=".$this->uri->segment(3); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/?sch_val=' . $data["sch_val"];
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/student_view', $data);
  }*/
  
  function notice_view()
  {
    $data["menu_title"] = "공지사항";
    $data["menu_Etitle"] = "NOTICE";
    $data['views'] = $this->admin_m->get_view_board($this->uri->segment(3));
    // echo var_dump($data['views']);
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/notice_view', $data);
  }


/*  function notice_list()
  {
    $where='';
    $search_word = $page_url = '';
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $this->site_title = "공지사항";
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $config['num_links'] = 2; //페이징 처리 영역
    $config['use_page_numbers'] = true;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $data["lnkParam"] = "page=" . $data["page"] . "&sch_val=" . $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    if (empty(trim($data['page']))) $data['page'] = 1;
    $startPageNum = ($data['page'] - 1) * $config['per_page'];
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/?sch_val=' . $data["sch_val"];
    $config['total_rows'] = $this->admin_m->board_total('count', '', '', $search_word);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
	 $data['list'] = $this->admin_m->get_list_board($startPageNum, $config['per_page'], $where);
    $this->load->view('community/notice_l', $data);
  }*/


  function student_interview()
  {
    $data["menu_title"] = "수강후기";
    $data["menu_Etitle"] = "Student Stories";
    $this->load->library('simplexml'); //XML 라이브러리
    /*$this->load->library("pagination"); // 페이지네이션 라이브러리*/
    $data["sch_type"] = $this->input->get("sch_type", true); //검색 파라미터
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $fileName = "http://www.greenart.co.kr/xml/std_interview_xml.asp?sch_type=".$data["sch_type"]."&sch_val=".$data["sch_val"]."&cam_idx=&page=".$data["page"]; // xml파싱용 파일호출
    // echo ($fileName);
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
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/student_interview', $data);
  }


/*  function student_interview()
  {
    $data["menu_title"] = "수강후기";
    $data["menu_Etitle"] = "Student Stories";
    
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["lnkParam"] = "page=" . $data["page"] . "&sch_val=" . $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://www.greenart.co.kr/xml/std_interview_xml.asp?c_type=1&intnowpage=" . $data["page"] . "&searchstring=" . $data["sch_val"]; // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $config['num_links'] = 2; //페이징 처리 영역
    $config['use_page_numbers'] = true;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/?sch_val=' . $data["sch_val"];
    $totalRows = $xmlData["itemp"]["intrecordcount"];
    $config['total_rows'] = $totalRows;
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    // $data['intListNumber'] = $config['total_rows'] - ($start);
    $data['intListNumber'] = $config['total_rows'] - (($data['page'] - 1) * $config['per_page']);
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/student_interview', $data);
  }*/


  function student_view()
  {
    $data["menu_title"] = "수강후기";
    $data["menu_Etitle"] = "Student Stories";
    
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $this->site_title = "그린미디어";
    $data["sch_val"] = $this->input->get("sch_val", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["lnkParam"] = "page=" . $data["page"] . "&sch_val=" . $data["sch_val"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://www.greenart.co.kr/xml/std_interview_view_xml.asp?idx=".$this->uri->segment(3); // xml파싱용 파일호출
    echo($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $config['base_url'] = '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/?sch_val=' . $data["sch_val"];
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/student_view', $data);
  }


  function campusEvents()
  {
    $data["menu_title"] = "캠퍼스 행사";
    $data["menu_Etitle"] = "Compus Event's";
    $this->load->library('simplexml'); //XML 라이브러리
    /*$this->load->library("pagination"); // 페이지네이션 라이브러리*/
    $data["searchString"] = $this->input->get("searchString", true); //검색 파라미터
    $data["lnkParam"] = $data["searchString"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://www.greenart.co.kr/xml/campusEvent_xml.asp?searchString=".$data["lnkParam"]; // xml파싱용 파일호출
    
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
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/campusEvents', $data);
  }


  function campusEvents_view()
  {
    $data["menu_title"] = "캠퍼스 행사";
    $data["menu_Etitle"] = "Compus Event's";
    $this->load->library('simplexml'); //XML 라이브러리
    $fileName = "http://www.greenart.co.kr/xml/campusEvent_view_xml.asp?idx=".$this->uri->segment(3); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $totalRows = $xmlData["item"];
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/campusEvents_view', $data);
  }


  function greenMedia()
  {
    $data["menu_title"] = "그린미디어";
    $data["menu_Etitle"] = "Green Media";
    $this->load->library('simplexml'); //XML 라이브러리
    $this->load->library("pagination"); // 페이지네이션 라이브러리
    $data["schVal"] = $this->input->get("schVal", true); //검색 파라미터
    $data["page"] = $this->input->get("page", true); //페이지번호
    $data["lnkParam"] = "page=".$data["page"]."&sch_val=".$data["schVal"]; //뷰페이지에서 목록으로 보낼때 링크값
    $fileName = "http://greenart.co.kr/xml/designNews_xml.asp?c_type=1&intnowpage=" . $data["page"] . "&searchgubun=c_title&searchstring=".$data["schVal"]; // xml파싱용 파일호출
    // echo ($fileName);
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $config['num_links'] = 2; //페이징 처리 영역
    $config['use_page_numbers'] = true;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['base_url'] = '/'.$this->uri->segment(1).'/'.$this->uri->segment(2).'/?sch_val='. $data["schVal"];
    $totalRows = $xmlData["itemp"]["intrecordcount"];
    $config['total_rows'] = $totalRows;
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    
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
    }else
    {
      $data["xml"] = '';
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/media_list', $data);
  }


  function greenMedia_view()
  {
    $data["menu_title"] = "그린미디어";
    $data["menu_Etitle"] = "Green Media";
    $this->load->library('simplexml'); //XML 라이브러리
    $fileName = "http://www.greenart.co.kr/xml/designNews_v_xml.asp?seq=".$this->uri->segment(3); // xml파싱용 파일호출
    $xmlRaw = file_get_contents($fileName); //  파일 컨텐츠 가져옴
    $xmlData = $this->simplexml->xml_parse($xmlRaw); //파싱
    $data["xml"] = $xmlData['item']; //파싱한 데이터 List로 넘겨줌
    if($this->input->ip_address() == "125.131.187.80"){
      //echo var_dump($data["list"]);
      //echo "<br/>".get_magic_quotes_gpc();
    }
    $this->load->view('inc/pageTitle', $data);
    $this->load->view('inc/pageNavigation', $data);
    $this->load->view('community/media_view', $data);
  }
    
    
  
}
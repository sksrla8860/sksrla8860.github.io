<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('admin_m');
    $this->load->helper(array('url', 'date', 'form', 'alert', 'lib'));
    /*$this->load->library('encrypt');*/
    $this->load->library('session');
    $this->js_load = array('inquiry.js', 'banner.js');
    $this->css_load = array();
    $this->load->library('encryption');
  }
  
  public function index()
  {
    $this->board();
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
  
  public function _remap($method)
  {
    if( @$this->session->userdata('logged_in') == TRUE )
    {
        if( method_exists($this, $method) )
        {
          $this->{"{$method}"}();
        }
    }else
    {
      alert('관리자 페이지 입니다. 로그인 후 이용 바랍니다.', '/join/login');
    }

  }


  public function board()
  {
    $this->output->enable_profiler(TRUE);
    
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
    $config['base_url'] = '/admin/board/page';
    $config['total_rows'] = $this->admin_m->get_list_board('board', 'count', '', '', $search_word);
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
    $this->load->view('admin/headerA');
    $this->load->view('admin/board_list', $data);
  }
  
  function board_v()
  {
    $data['views'] = $this->admin_m->get_view_board($this->uri->segment(3));
    // echo var_dump($data['views']);
    $this->load->view('admin/headerA');
    $this->load->view('admin/board_view', $data);
  }


  public function board_w()
  {
    $data[] = '';
    if (!empty($this->uri->segment(3))) {
      $data['views'] = $this->admin_m->modify_board($this->uri->segment(3));
    }
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      // post시
      $b_idx = $this->input->post("b_idx", true);
      // 경고창
      $this->load->helper('alert');
      
      // page세그먼트 검사
      $uri_array = $this->segment_explode($this->uri->uri_string());
      
      if( in_array('page', $uri_array) )
      {
        $pages = urldecode($this->url_explode($uri_array, 'page'));
      }
      else
      {
        $pages = 1;
      }
      
      if( !$this->input->post('b_name', TRUE) AND !$this->input->post('b_contents', TRUE) )
      {
        // 글 내용 체크
        alert('비정상적인 접근입니다rrr.', '/admin/board/page/'.$pages);
        exit;
      }else{
        if(isset($b_idx) && !empty($b_idx))
        {
          $update_data = array(
            'b_idx' => $b_idx,
            'b_name' => $this->input->post('b_name', TRUE),
            'b_contents' => $this->input->post('b_contents', TRUE),
            'table' => 'board'
          );
          $result = $this->admin_m->board_update($update_data);
        }
        else
        {
          $write_data = array(
            'b_name' => $this->input->post('b_name', TRUE),
            'b_contents' => $this->input->post('b_contents', TRUE),
            'table' => 'board'
          );
          $result = $this->admin_m->insert_board($write_data);
        }
      }
      
      // echo var_dump($write_data);
      if( $result )
      {
        // 성공시
        alert('입력완료','/admin/board');
        exit;
      }
      else
      {
        // 실패시
        alert('다시 입력', '/admin/board_w');
        exit;
      }
    }
    else
    {
      
    }
      $this->load->view('admin/headerA');
      $this->load->view('admin/board_write', $data);
  }


  public function admin_m()
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    if( $_POST )
    {
      // post시
      
      // 경고창
      $this->load->helper('alert');
      
      // page세그먼트 검사
      $uri_array = $this->segment_explode($this->uri->uri_string());
      
      if( in_array('page', $uri_array) )
      {
        $pages = urldecode($this->url_explode($uri_array, 'page'));
      }
      else
      {
        $pages = 1;
      }
      
      if( !$this->input->post('b_name', TRUE) AND !$this->input->post('b_contents', TRUE) )
      {
        // 글 내용 체크
        alert('비정상적인 접근입니다rrr.', '/admin/board/page/'.$pages);
        exit;
      }
      
      $modify_data = array(
        'b_idx' => $this->uri->segment(3),
        'b_name' => $this->input->post('b_name', TRUE),
        'b_contents' => $this->input->post('b_contents', TRUE),
        'table' => 'board'
      );
      // echo var_dump($write_data);
      $result = $this->admin_m->modify_board($modify_data);
      
      if( $result )
      {
        // 성공시
        alert('입력완료','/admin/board_v/'.$modify_data['b_idx']);
        exit;
      }
      else
      {
        // 실패시
        alert('다시 입력', '/admin/admin_m');
        exit;
      }
    }
    else
    {
      $this->load->view('admin/headerA');
      $this->load->view('admin/board_write');
    }
  }
  
  function board_d()
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    $this->load->helper('alert');
    
    // 해당게시물 삭제
    
    $return = $this->admin_m->delete_board($this->uri->segment(3));
    
    // 게시물 목록으로 돌아가기
    if( $return )
    {
      // 삭제성공
      alert('삭제완료', '/admin/board');
    }
    else
    {
      // 삭제실패
      alert('삭제 실패!!!!', '/admin/board_v/'.$this->uri->segment(3));
    }
  }
    /*  공지사항  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  상담문의관리  */


  public function inquiry_l()
  {
    $this->output->enable_profiler(TRUE);
    $data["page"] = $this->input->get("page", true); //페이지번호
    
    // 검색어 초기회
    $search_word = $search_word_1 = $page_url = '';
    $uri_segment = 6;
    
    $uri_array = $this->segment_explode($this->uri->uri_string());
    
    $search_word_1 = urldecode($this->url_explode($uri_array, 'allList'));
    
    // 페이지네이션용 주소
    $page_url_1 = '/allList/'.$search_word_1;
    
    if( in_array('q', $uri_array) ){
      //q가 있을경우 
      $search_word = urldecode($this->url_explode($uri_array, 'q'));
      
      // 페이지네이션용 주소
      $page_url = '/q/'.$search_word;
      $uri_segment = 8;
    }
    
    // 페이지네이션
    $this->load->library('pagination');
    
    // 페이지네이션 설정
    $config['base_url'] = '/admin/inquiry_l/page/'.$data["page"].$page_url_1.$page_url;
    $config['total_rows'] = $this->admin_m->get_list_inquiry('count', '', '', $search_word, $search_word_1);
    $config['per_page'] = 5;
    $config['uri_segment'] = $uri_segment;
    
    // echo $config['total_rows'];
    $this->pagination->initialize($config);
    
    $data['pagination'] = $this->pagination->create_links();
    $page = $this->uri->segment(4, 1);
    
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
    $data['list'] = $this->admin_m->get_list_inquiry('', $start, $limit, $search_word, $search_word_1);
    $this->load->view('admin/headerA');
    $this->load->view('admin/inquiry_list', $data);
  }
  
  function inquiry_v()
  {
    $data['js_load'] = $this->js_load;
    $data['views'] = $this->admin_m->get_view_inquiry($this->uri->segment(3));
    $data['viewComment'] = $this->admin_m->get_memberCommentView($this->uri->segment(3));
    // echo var_dump($data['views']);
    $this->load->view('admin/headerA', $data);
    $this->load->view('admin/inquiry_view', $data);
  }

  function updateiChk()
  {
    $i_idx = $this->input->post('i_idx', true);
    $i_chk = $this->input->post('i_chk', true);
    if (empty($i_idx) || empty($i_chk)) exit;
    $update_data = array(
      'i_idx' => $i_idx,
      'i_chk' => $i_chk
    );
    $result = $this->admin_m->updateiChk($update_data);
    echo $result;
  }

  function ajaxCommentInsert()
  {
    $c_comment = $this->input->post('c_comment', true);
    $i_idx = $this->input->post('i_idx', true);
    if (empty($c_comment) || empty($i_idx)) exit;
    $rownsert_data = array(
      'i_idx' => $i_idx,
      'c_comment' => $c_comment,
      'user_ip' => $this->input->ip_address()
    );
    $data_row = $this->admin_m->insertComment($rownsert_data);
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data_row, JSON_UNESCAPED_UNICODE));
  }

  function ajaxCommentUpdate()
  {
    $c_idx = $this->input->post('c_idx', true);
    $c_comment = $this->input->post('c_comment', true);
    if (empty($c_idx) || empty($c_comment)) {
      echo "0";
      exit;
    }
    $update_data = array(
      'c_idx' => $c_idx,
      'c_comment' => $c_comment
    );
    $data_row = $this->admin_m->updateComment($update_data);
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data_row, JSON_UNESCAPED_UNICODE));
  }

  function ajaxCommentDelete()
  {
    $c_idx = $this->input->post('c_idx', true);
    if (empty($c_idx)) {
      echo "0";
      exit;
    }
    $update_data = array(
      'c_idx' => $c_idx
    );
    $result = $this->admin_m->deleteComment($update_data);
    echo $result;
  }
  
  function inquiry_d()
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    $this->load->helper('alert');
    
    // 해당게시물 삭제
    
    $return = $this->admin_m->delete_inquiry($this->uri->segment(3));
    
    // 게시물 목록으로 돌아가기
    if( $return )
    {
      // 삭제성공
      alert('삭제완료', '/admin/inquiry_l');
    }
    else
    {
      // 삭제실패
      alert('삭제 실패!!!!', '/admin/inquiry_v/'.$this->uri->segment(3));
    }
  }
  /*  상담문의관리  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /* 기업/대학 단체교육  */

  public function lecture_l()
  {
    $this->output->enable_profiler(TRUE);
    $data["page"] = $this->input->get("page", true); //페이지번호
    
    // 검색어 초기회
    $search_word = $search_word_1 = $page_url = '';
    $uri_segment = 4;
    
    $uri_array = $this->segment_explode($this->uri->uri_string());
    
    $search_word_1 = urldecode($this->url_explode($uri_array, 'allList'));
    
    // 페이지네이션용 주소
    $page_url_1 = '/allList/'.$search_word_1;
    $uri_segment_1 = 5;
    
    if( in_array('q', $uri_array) ){
      //q가 있을경우 
      $search_word = urldecode($this->url_explode($uri_array, 'q'));
      
      // 페이지네이션용 주소
      $page_url = '/q/'.$search_word;
      $uri_segment = 7;
    }
    
    // 페이지네이션
    $this->load->library('pagination');
    
    // 페이지네이션 설정
    $config['base_url'] = '/admin/lecture_l/page';
    $config['total_rows'] = $this->admin_m->get_list_lecture('count', '', '', $search_word, $search_word_1);
    $config['per_page'] = 5;
    $config['uri_segment'] = $uri_segment;
    
    // echo $config['total_rows'];
    $this->pagination->initialize($config);
    
    $data['pagination'] = $this->pagination->create_links();
    $page = $this->uri->segment(4, 1);
    
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
    $data['list'] = $this->admin_m->get_list_lecture('', $start, $limit, $search_word, $search_word_1);
    $this->load->view('admin/headerA');
    $this->load->view('admin/lecture_list', $data);
  }
  
  function lecture_v()
  {
    $data['js_load'] = $this->js_load;
    $data['views'] = $this->admin_m->get_view_lecture($this->uri->segment(3));
    // echo var_dump($data['views']);
    $this->load->view('admin/headerA', $data);
    $this->load->view('admin/lecture_view', $data);
  }

  function updateLChk()
  {
    $l_idx = $this->input->post('l_idx', true);
    $l_chk = $this->input->post('l_chk', true);
    if (empty($l_idx) || empty($l_chk)) exit;
    $update_data = array(
      'l_idx' => $l_idx,
      'l_chk' => $l_chk
    );
    $result = $this->admin_m->updateLChk($update_data);
    echo $result;
  }
  
  /*  기업/대학 단체교육  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  메인 중앙 배너  */

  public function banner_l()
  {
    $this->output->enable_profiler(TRUE);
    
    $data['js_load'] = $this->js_load; // js 로드
    
    $this->load->library('form_validation');
    
    $data['list'] = $this->admin_m->get_list_banner();
    $this->load->view('admin/headerA', $data);

    $this->form_validation->set_rules('n_link', '링크', 'required');
    $this->form_validation->set_rules('n_text', '텍스트', 'required');
    
    if(!$this->uri->segment(3)) // 만약 수정버튼을 안눌렀을때 리스트
    {
      if($this->form_validation->run() == FALSE) // 폼전송을 누른게 아닐때 - 그냥 리스트
      {
        $this->load->view('admin/banner_list', $data);
      }
      else // 폼전송을 한경우
      {
        
        $config = array(
          'upload_path' => 'uploads/banner/',
          'allowed_types' => 'gif|jpg|png',
          'encrypt_name' => TRUE,
          'max_size' => '10000'
          );

        $this->load->library('upload', $config);

        
        $oldFile = $this->uri->segment(3);
        
        
        if(empty($oldFile)) // 새로 등록할때
        {
            if(!$this->upload->do_upload())
            {
              $data['error'] = $this->upload->display_errors();
              alert ('업로드 실패');
              // $data['list'] = $this->admin_m->get_list('');
              $this->load->view('admin/banner_list', $data);
            }
            else
            {
              $upload_data = $this->upload->data();
              $upload_data['n_link'] = $this->input->post('n_link', true);
              $upload_data['n_text'] = $this->input->post('n_text', true);
              $result = $this->admin_m->insert_banner($upload_data);

              redirect('/admin/banner_l'); exit;
            }
        }
        else // 수정할 때
        {
          
            if(!$this->upload->do_upload())
            {
              $uri_seg = $this->input->post("n_idx", true);
              $upload_data['n_link'] = $this->input->post('n_link', true);
              $upload_data['n_text'] = $this->input->post('n_text', true);
              
              $result = $this->admin_m->updata_banner($upload_data, $uri_seg);

              redirect('/admin/banner_l'); exit;
            }
            else
            {

              $upload_data = $this->upload->data();
              $upload_data['n_idx'] = $this->input->post('n_idx', true);
              $upload_data['n_link'] = $this->input->post('n_link', true);
              $upload_data['n_text'] = $this->input->post('n_text', true);
              
              $result = $this->admin_m->updata_banner($upload_data);

              redirect('/admin/banner_l'); exit;
            }
        }
      };
    }
    else{ // 수정 버튼을 눌렀을때 리스트
      
      $data['modify'] = $this->admin_m->modify_banner($this->uri->segment(3));

      $this->load->view('admin/banner_list', $data);
    
    }
  }
  
  
  function partRangeUpdate()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('n_range', '정렬값', 'trim|required|numeric');
    $this->form_validation->set_rules('n_idx', '고유코드', 'trim|required|numeric');
    $this->form_validation->set_rules('n_type', '변경값', 'trim|required|numeric');
    if ($this->form_validation->run() == TRUE) {
      if ($_POST) {
        if (!$this->input->post("n_idx", true)) {
          echo "0";
          exit;
        } else {
          $update_data = array(
            'n_range' => $this->input->post("n_range", true, '0'),
            'n_idx' => $this->input->post("n_idx", true),
            'n_type' => $this->input->post("n_type", true)
          );
          //echo var_dump($update_data);
          $result = $this->admin_m->update_bannerRange($update_data);
          echo $result;
          exit;
        }
      }
    } else {
      $this->output->enable_profiler(false);
      $this->output->set_status_header('500');
      $this->output->set_content_type('application/json');
      echo json_encode(array(
        'error_msg' => validation_errors(),
      ));
    }
  }
  
    function bannerDel()
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    $return = $this->admin_m->delete_banner($this->uri->segment(3));
    
    if( $return )
    {
      // 삭제성공
      alert('삭제했습니다.', '/admin/banner_l');
    }
    else
    {
      // 삭제실패
      alert('삭제 실패했습니다.', '/admin/banner_l');
    }
  }
  
    function bannerModi($idx)
  {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    $modify_data = array(
        'n_idx' => $idx,
        'n_text' => $this->input->post('n_text', TRUE),
        'n_link' => $this->input->post('n_link', TRUE),
        'table' => 'banner'
      );
    
    $result = $this->admin_m->modify_banner($modify_data);
    
    if( $return )
    {
      // 삭제성공
      alert('수정 완료 했습니다.', '/admin/banner_l');
    }
    else
    {
      // 삭제실패
      alert('수정에 실패했습니다.', '/admin/banner_l');
    }
  }
  /*  메인 중앙 배너  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  서브  */


  public function sub_v()
  {
    $this->output->enable_profiler(TRUE);
    
    
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
    
  }
  
  function sub_title()
  {
    $this->output->enable_profiler(TRUE);
    if( $_POST )
    {
      $s_title = $this->input->post("s_title", true);
      $result = $this->admin_m->updata_title($s_title);
      if( $result )
      {
        alert("수정하였습니다.", '/admin/sub_v'); exit;
      }
      else
      {
        alert("수정에 실패하였습니다.", '/admin/sub_v'); exit;
      }
    }
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
  }
  
  function sub_description()
  {
    $this->output->enable_profiler(TRUE);
    if( $_POST )
    {
      $s_description = $this->input->post("s_description", true);
      $result = $this->admin_m->updata_description($s_description);
      if( $result )
      {
        alert("수정하였습니다.", '/admin/sub_v'); exit;
      }
      else
      {
        alert("수정에 실패하였습니다.", '/admin/sub_v'); exit;
      }
    }
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
  }
  
  function sub_keyword()
  {
    $this->output->enable_profiler(TRUE);
    if( $_POST )
    {
      $s_keyword = $this->input->post("s_keyword", true);
      $result = $this->admin_m->updata_keyword($s_keyword);
      if( $result )
      {
        alert("수정하였습니다.", '/admin/sub_v'); exit;
      }
      else
      {
        alert("수정에 실패하였습니다.", '/admin/sub_v'); exit;
      }
    }
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
  }
  
  function sub_log()
  {
    $this->output->enable_profiler(TRUE);
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('s_logo', '상단로고', 'trim|required|numeric');
    $this->form_validation->set_rules('s_link', '로고링크', 'trim|required|numeric');
    $this->form_validation->set_rules('s_text', '로고텍스트', 'trim|required|numeric');
    
    if( $_POST )
    {
      $s_log = $this->input->post("s_log", true);
      $result = $this->admin_m->updata_log($s_log);
      if( $result )
      {
        alert("수정하였습니다.", '/admin/sub_v'); exit;
      }
      else
      {
        alert("수정에 실패하였습니다.", '/admin/sub_v'); exit;
      }
    }
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
  }
  
  function sub_logo()
  {
    $this->output->enable_profiler(TRUE);
    
    
    $this->load->library('form_validation');
    
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    
    $this->form_validation->set_rules('s_link', '링크', 'required');
    $this->form_validation->set_rules('s_text', '텍스트', 'required');
      
    if($this->form_validation->run())
    {
      $config = array(
        'upload_path' => 'uploads/header/',
        'allowed_types' => 'gif|jpg|png',
        'encrypt_name' => TRUE,
        'max_size' => '10000'
        );

      $this->load->library('upload', $config);

      $oldFile = $this->input->post('s_logo', true);

      if(empty($oldFile)) // 새로 등록할때
      {
          if(!$this->upload->do_upload())
          {
            $data['error'] = $this->upload->display_errors();
            alert ('업로드 실패');
            // $data['list'] = $this->banner_m->get_list('');
            $this->load->view('admin/sub_view', $data);
          }
          else
          {

            $upload_data = $this->upload->data();
            $upload_data['s_link'] = $this->input->post('s_link', true);
            $upload_data['s_text'] = $this->input->post('s_text', true);
            $result = $this->admin_m->insert_logo($upload_data);

            redirect('/admin/sub_v'); exit;
          }
      }
      else // 수정할 때
      {

          if(!$this->upload->do_upload()) // 새파일을 등록하지 않았을 때
          {
            $uri_seg = $this->input->post("s_logo", true);
            $upload_data['s_link'] = $this->input->post('s_link', true);
            $upload_data['s_text'] = $this->input->post('s_text', true);

            $result = $this->admin_m->updata_logo($upload_data, $uri_seg);

            redirect('/admin/sub_v'); exit;
          }
          else // 새파일을 등록했을때
          {

            $upload_data = $this->upload->data();
            $upload_data['s_link'] = $this->input->post('s_link', true);
            $upload_data['s_text'] = $this->input->post('s_text', true);

            $result = $this->admin_m->updata_logo($upload_data);

            redirect('/admin/sub_v'); exit;
          }
      }
    }
    else
    {
      $this->load->view('admin/sub_view', $data);
    }
  }
  
  function sub_footer()
  {
    $this->output->enable_profiler(TRUE);
    
    $this->load->library('form_validation');
    
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    
    $this->form_validation->set_rules('s_Flink', '링크', 'required');
    $this->form_validation->set_rules('s_Ftext', '텍스트', 'required');
      
    if($this->form_validation->run())
    {
      $config = array(
        'upload_path' => 'uploads/header/',
        'allowed_types' => 'gif|jpg|png',
        'encrypt_name' => TRUE,
        'max_size' => '10000'
        );

      $this->load->library('upload', $config);

      $oldFile = $this->input->post('s_Flogo', true);

      if(empty($oldFile)) // 새로 등록할때
      {
          if(!$this->upload->do_upload())
          {
            $data['error'] = $this->upload->display_errors();
            alert ('업로드 실패');
            // $data['list'] = $this->banner_m->get_list('');
            $this->load->view('admin/sub_view', $data);
          }
          else
          {

            $upload_data = $this->upload->data();
            $upload_data['s_Flink'] = $this->input->post('s_Flink', true);
            $upload_data['s_Ftext'] = $this->input->post('s_Ftext', true);
            $result = $this->admin_m->updata_footer($upload_data);

            redirect('/admin/sub_v'); exit;
          }
      }
      else // 수정할 때
      {

          if(!$this->upload->do_upload()) // 새파일을 등록하지 않았을 때
          {
            $uri_seg = $this->input->post("s_Flogo", true);
            $upload_data['s_Flink'] = $this->input->post('s_Flink', true);
            $upload_data['s_Ftext'] = $this->input->post('s_Ftext', true);

            $result = $this->admin_m->updata_footer($upload_data, $uri_seg);

            redirect('/admin/sub_v'); exit;
          }
          else // 새파일을 등록했을때
          {

            $upload_data = $this->upload->data();
            $upload_data['s_Flink'] = $this->input->post('s_Flink', true);
            $upload_data['s_Ftext'] = $this->input->post('s_Ftext', true);

            $result = $this->admin_m->updata_footer($upload_data);

            redirect('/admin/sub_v'); exit;
          }
      }
    }
    else
    {
      $this->load->view('admin/sub_view', $data);
    }
  }
  
  function sub_info()
  {
    $this->output->enable_profiler(TRUE);
    if( $_POST )
    {
      $s_info = $this->input->post("s_info", true);
      $result = $this->admin_m->updata_info($s_info);
      if( $result )
      {
        alert("수정하였습니다.", '/admin/sub_v'); exit;
      }
      else
      {
        alert("수정에 실패하였습니다.", '/admin/sub_v'); exit;
      }
    }
    $data['list'] = $this->admin_m->get_list_sub();
    $this->load->view('admin/headerA');
    $this->load->view('admin/sub_view', $data);
  }
  /*  사이트 정보  */
  /*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/
  /*  전체 공지  */
  


  public function common()
  {
    $this->output->enable_profiler(TRUE);
    
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
      $uri_segment = 5;
    }
    
    // 페이지네이션
    $this->load->library('pagination');
    
    // 페이지네이션 설정
    $config['base_url'] = '/admin/common/page';
    $config['total_rows'] = $this->admin_m->get_list_common('count', '', '', $search_word);
    $config['per_page'] = 15;
    $config['uri_segment'] = $uri_segment;
    
    // echo $config['total_rows'];
    $this->pagination->initialize($config);
    
    $data['pagination'] = $this->pagination->create_links();
    $page = $this->uri->segment(4, 1);
    
    if( $page > 1 )
    {
      $start = (($page/$config['per_page'])) * $config['per_page'];
    }
    else
    {
      $start = ($page-1) * $config['per_page'];
    }
    $limit = $config['per_page'];
    
    $data['list'] = $this->admin_m->get_list_common('', $start, $limit, $search_word);
    $this->load->view('admin/headerA');
    $this->load->view('admin/common', $data);
  }
  /*  공통 공지  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /* 관리자 정보 */


  public function manger_v()
  {
    $this->load->library(array('form_validation', 'encrypt'));
    $data['list'] = $this->admin_m->get_manger();
    
    $this->form_validation->set_rules('m_id', '아이디', 'required|alpha_numeric');
    $this->form_validation->set_rules('m_password', '비밀번호', 'required');
    
    if($_POST)
    {
      $password = password_hash($this->input->post('m_password'), PASSWORD_BCRYPT);
      $update_data = array(
        'm_name' => $this->input->post("m_name", true, '0'),
        'm_password' => $password,
        'm_mail' => $this->input->post("m_mail", true, '0'),
        'm_phone' => $this->input->post("m_phone", true, '0'),
        'm_tell' => $this->input->post("m_tell", true, '0'),
        'm_asdCode' => $this->input->post("m_asdCode", true, '0'),
        'm_cam' => $this->input->post("m_cam", true, '0')
      );
      
      $result = $this->admin_m->update_manger($update_data);
      alert('수정 완료했습니다.', '/admin/manger_v');
      
    }
    
    $this->load->view('admin/headerA');
    $this->load->view('admin/manger_view', $data);
    
  }


  public function manger_vvv()
  {
    $this->load->library(array('form_validation', 'encrypt'));
    $data['list'] = $this->admin_m->get_manger();
    
    ///echo ($this->input->post('m_password', 'aaa') );
    echo (hash('sha512', md5('aaa')));
      $password = password_hash('aaa', PASSWORD_BCRYPT);
      $password2 = $this->encrypt->encode('aaa');
      $password3 = $this->encrypt->decode($password2);
    //echo($password."<br />".$password2."<br />".$password3); 
    exit;
    $this->form_validation->set_rules('m_id', '아이디', 'required|alpha_numeric');
    $this->form_validation->set_rules('m_password', '비밀번호', 'required');
    
    if($_POST)
    {
      $update_data = array(
        'm_name' => $this->input->post("m_name", true, '0'),
        'm_password' => $password,
        'm_mail' => $this->input->post("m_mail", true, '0'),
        'm_phone' => $this->input->post("m_phone", true, '0'),
        'm_tell' => $this->input->post("m_tell", true, '0'),
        'm_asdCode' => $this->input->post("m_asdCode", true, '0'),
        'm_cam' => $this->input->post("m_cam", true, '0')
      );
      
      $result = $this->admin_m->update_manger($update_data);
      alert('수정 완료했습니다.', '/admin/manger_v');
      
    }
    
    $this->load->view('admin/headerA');
    $this->load->view('admin/manger_view', $data);
    
  }

  public function upload_file()
  {
    //개인별 최대용량
    $allow_user_capacity = TRUE;
    $allowedExtensions = array(
      "gif", "jpg", "png", "GIF", "JPG", "PNG"
    );
    $uploadDirectory = './upload/editor/' . date('Ymd') . '/';
    $uploader = new qqFileUploader($allowedExtensions);
    if (file_exists($uploadDirectory) == FALSE) {
      @mkdir($uploadDirectory, 0777, TRUE);
    }
    $result = $uploader->handleUpload($uploadDirectory);
    // to pass data through iframe you will need to encode all html tags
    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
  }
  
}



class qqUploadedFileXhr
{
  /**
   * Save the file to the specified path
   * @return boolean TRUE on success
   */
  function save($path)
  {
    $input = fopen('php://input', 'r');
    $temp = tmpfile();
    $realSize = stream_copy_to_stream($input, $temp);
    fclose($input);

    if ($realSize != $this->getSize()) {
      return FALSE;
    }

    $target = fopen($path, 'w');
    fseek($temp, 0, SEEK_SET);
    stream_copy_to_stream($temp, $target);
    fclose($target);

    return TRUE;
  }

  function getName()
  {
    return $_GET['qqfile'];
  }

  function getSize()
  {
    if (isset($_SERVER['CONTENT_LENGTH'])) {
      return (int)$_SERVER['CONTENT_LENGTH'];
    } else {
      throw new Exception("컨텐츠의 길이를 알 수 없습니다.");
    }
  }
} // 파일업로드 qqUploadedFileXhr 클래스 끝

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm
{
  /**
   * Save the file to the specified path
   * @return boolean TRUE on success
   */
  function save($path)
  {
    if (!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)) {
      return FALSE;
    }

    return TRUE;
  }

  function getName()
  {
    return $_FILES['qqfile']['name'];
  }

  function getSize()
  {
    return $_FILES['qqfile']['size'];
  }
} // 파일업로드 qqUploadedFileForm 클래스 끝

class qqFileUploader
{
  private $allowedExtensions = array();
  private $sizeLimit = 10485760;
  private $file;

  function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760)
  {
    $allowedExtensions = array_map('strtolower', $allowedExtensions);

    $this->allowedExtensions = $allowedExtensions;
    $this->sizeLimit = $sizeLimit;

    $this->checkServerSettings();

    if (isset($_GET['qqfile'])) {
      $this->file = new qqUploadedFileXhr();
    } else if (isset($_FILES['qqfile'])) {
      $this->file = new qqUploadedFileForm();
    } else {
      $this->file = FALSE;
    }
  }

  private function checkServerSettings()
  {
    $postSize = $this->toBytes(ini_get('post_max_size'));
    $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

    if ($postSize < $this->sizeLimit OR $uploadSize < $this->sizeLimit) {
      $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
      die("{'error':'" . "서버에서 허용된 용량을 초과했습니다." . "'}");
    }
  }

  private function toBytes($str)
  {
    $val = trim($str);
    $last = strtolower($str[strlen($str) - 1]);

    switch ($last) {
      case 'g':
        $val *= 1024;
      case 'm':
        $val *= 1024;
      case 'k':
        $val *= 1024;
    }

    return $val;
  }

  /**
   * Returns array('success'=>true) or array('error'=>'error message')
   */
  function handleUpload($uploadDirectory, $replaceOldFile = FALSE)
  {
    if (!is_writable($uploadDirectory)) {
      return array('error' => "파일을 쓸 수 없습니다.");
    }

    if (!$this->file) {
      return array('error' => "파일이 없습니다.");
    }

    $size = $this->file->getSize();

    if ($size == 0) {
      return array('error' => "파일이 없습니다.");
    }

    if ($size > $this->sizeLimit) {
      return array('error' => "업로드 허용용량을 초과했습니다.");
    }

    $pathinfo = pathinfo($this->file->getName());
    $filename = $pathinfo['filename'];
    $filename = md5(uniqid()); //암호화된 강제 파일명으로 한다. 활성화
    $ext = $pathinfo['extension'];

    if ($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)) {
      $these = implode(',', $this->allowedExtensions);

      return array('error' => "허용하는 파일형식은 다음과 같습니다." . ' ' . $these);
    }

    if (!$replaceOldFile) {
      /// don't overwrite previous files that were uploaded
      while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
        $filename .= rand(10, 99);
      }
    }

    if ($this->file->save($uploadDirectory . $filename . '.' . $ext)) {
      $temp = explode('/', $uploadDirectory);
      unset($temp[0]);
      $uploadDirectory = join('/', $temp);

      return array(
        'success' => TRUE,
        'base_url' => base_url(),
        'real_file_name' => $uploadDirectory . $filename . '.' . $ext
      );
    } else {
      return array('error' => "파일 업로드 실패");
    }

  }
} // 파일업로드 qqFileUploader 클래스 끝
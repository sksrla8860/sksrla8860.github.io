<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model{
  function __construct()
  {
    parent::__construct();
  }
  
  function login($auth)
  {
    $sql = "SELECT m_id, m_name FROM manger WHERE m_id = '".$auth['m_id']."' AND m_password = '".$auth['m_password']."' ";
    $query = $this->db->query($sql);
    
    if( $query->num_rows() > 0 )
    {
      // 맞지 않는 데이터가 있다면 해당 내용 반환
      return $query->row();
    }
    else
    {
      // 맞는 데이터가 없을경우
      return FALSE;
    }
  }
  
  function get_list_board($table='board', $type='', $offset='', $limit='', $search_word='')
  {
    
    $sword = ' WHERE b_del="N" ';
    if($search_word != ''){
      $sword = ' WHERE (b_name like "%'.$search_word.'%" or b_contents like "%'.$search_word.'%") AND b_del="N" ';
    }
    
    $limit_query = '';
    
    if( $limit != '' OR $offset != '' )
    {
      // 페이징 있을경우 처리
      $limit_query = ' LIMIT '.$offset.', '.$limit;
    }
    
    // echo $sword;
    $sql = "SELECT * FROM ".$table.$sword." ORDER BY b_date DESC".$limit_query;// .$sword;
    $query = $this->db->query($sql);
    
    if( $type == 'count' )
    {
      // 리스트를 반환하는 것이 아니라 전체 게시물의 개수를 반환
      $result = $query->num_rows();
      
      // $this->db->count_all($table);
    }
    else
    {
      // 게시물 리스트 반환
      $result = $query->result();
    }
    
    return $result;
  }
  
/*  function board_total($type='', $offset='', $limit='', $search_word='')
  {
    $limit_query = '';
    
    if( $limit != '' OR $offset != '' )
    {
      // 페이징 있을경우 처리
      $limit_query = ' LIMIT '.$offset.', '.$limit;
    }
    
    $sword = 'WHERE b_del="N" ORDER BY b_date desc'.$limit_query;
    if( $search_word != '')
    {
      $sword = 'WHERE b_name like "%'.$search_word.'%" or b_contents like "%'.$search_word.'%" and b_del="N" ORDER BY b_date desc'.$limit_query;
    }
    
    // echo $sword;
    $sql = "SELECT * FROM board ".$sword;
    $query = $this->db->query($sql);
    
    if( $type == 'count' )
    {
      // 리스트를 반환 X 전체 개시물수를 반환
      $result = $query->num_rows();
    }
    else
    {
      //게시물 리스트 반환
      $result = $query->result();
    }
    
    return $result;
  }*/
  
  function get_view_board($id)
  {
    // 조회 증가
    $sql0 = "update board set b_count=b_count+1 where b_idx='".$id."'";
    $this->db->query($sql0);
    
    $sql = "select * from board where b_idx='".$id."'";
    $query = $this->db->query($sql);
    
    // 게시물 내용 반환
    $result = $query->row();
    
    return $result;
  }
  
  function modify_board($id)
  {
    $sql = "select * from board where b_idx='".$id."'";
    $query = $this->db->query($sql);
    
    // 게시물 내용 반환
    $result = $query->result();
    
    // echo var_dump($result);
    return $result;
  }
  
  function insert_board($arrays)
  {
    $insert_array = array(
      'stf_idx' => '1',
      'b_name' => $arrays['b_name'],
      'b_contents' => $arrays['b_contents'],
      'b_date' => date('Y-m-d H:i:s')
    );
    $result = $this->db->insert($arrays['table'], $insert_array);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function board_update($arrays)
  {
    $update_array = array(
      'b_name' => $arrays['b_name'],
      'b_contents' => $arrays['b_contents']
    );
    $where = array(
      'b_idx' => $arrays['b_idx']
    );
    $result = $this->db->update($arrays['table'], $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function delete_board($arrays)
  {
    $update_array = array(
      'b_del' => 'Y'
    );
    $where = array(
      'b_idx' => $arrays
    );
    $result = $this->db->update('board', $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  /*  공지사항  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  상담문의관리  */
  
  
  function get_list_inquiry($type='', $offset='', $limit='', $search_word='', $all_list='')
  {
    $limit_query = '';
    
    if( $limit != '' OR $offset != '' )
    {
      // 페이징 있을경우 처리
      $limit_query = ' LIMIT '.$offset.', '.$limit;
    }
    $sword = 'WHERE i_del="N" and i_chk="X" ORDER BY i_idx desc'.$limit_query;
    if( $all_list == 'on')
    {
      if($search_word != ''){
        $sword = 'WHERE (i_writer like "%'.$search_word.'%" or i_name like "%'.$search_word.'%") ORDER BY i_idx desc'.$limit_query;
      }else{
        $sword = 'WHERE i_del="N" or i_del="Y" ORDER BY i_idx desc'.$limit_query;
      };
    }else{
      if($search_word != ''){
        $sword = 'WHERE (i_writer like "%'.$search_word.'%" or i_name like "%'.$search_word.'%") and i_chk="X" and i_del="N" ORDER BY i_idx desc'.$limit_query;
      }else{
        $sword = 'WHERE i_del="N" and i_chk="X" ORDER BY i_idx desc'.$limit_query;
      };
    }
    
    $sql = "SELECT * FROM inquiry ".$sword;
    $query = $this->db->query($sql);
    
    if( $type == 'count' )
    {
      // 리스트를 반환 X 전체 개시물수를 반환
      $result = $query->num_rows();
    }
    else
    {
      //게시물 리스트 반환
      $result = $query->result();
    }
    
    return $result;
  }
  
  function insert_inquiry($array_data)
  {
    $insert_array = array(
      'i_name' => $array_data['i_name'],
      'i_writer' => $array_data['i_writer'],
      'i_route' => $array_data['i_route'],
      'i_num' => $array_data['i_num'],
      'i_mail' => $array_data['i_mail'],
      'i_title' => $array_data['i_title'],
      'i_contents' => $array_data['i_contents'],
      'i_date' => gmdate('Y-m-d h:m:s', time()),
      'user_ip' => $this->input->ip_address()
    );
    $result = $this->db->insert("inquiry", $insert_array);
    return $result;
  }
  
  function get_view_inquiry($id)
  {
    // 조회 증가
    // $sql0 = "update inquiry set b_count=b_count+1 where b_idx='".$id."'";
    // $this->db->query($sql0);
    
    $sql = "select * from inquiry where i_idx='".$id."'";
    $query = $this->db->query($sql);
    
    // 게시물 내용 반환
    $result = $query->row();
    
    return $result;
  }

  function updateiChk($array_data)
  {
    $update_array = array(
      'i_chk' => $array_data['i_chk']
    );
    $where = array(
      'i_idx' => $array_data['i_idx']
    );
    $result = $this->db->update('inquiry', $update_array, $where);
    return $result;
  }

  function get_memberCommentView($i_idx = '')
  {
    $this->db->select('i_idx,c_idx,c_comment,c_date');
    $this->db->from('i_comment i');
    // $this->db->join('tb_staff stf', 'c.stf_idx = stf.stf_idx');
    $this->db->where('c_del', 'N');
    $this->db->where('i_idx', $i_idx);
    $this->db->order_by('c_idx', 'desc');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  function get_topCommentView($c_idx = '')
  {
    $this->db->select('i_idx,c_idx,c_comment,c_date');
    $this->db->from('i_comment i');
    // $this->db->join('tb_staff stf', 'c.stf_idx = stf.stf_idx');
    $this->db->where('c_del', 'N');
    $this->db->where('c_idx', $c_idx);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  
  function insertComment($array_data)
  {
    $insert_array = array(
      'i_idx' => $array_data['i_idx'],
      'c_comment' => $array_data["c_comment"],
      'user_ip' => $this->input->ip_address()
    );
    $this->db->insert("i_comment", $insert_array);
    $result = $this->get_topCommentView($this->db->insert_id('i_idx'));
    return $result;
  }

  function updateComment($array_data)
  {
    $update_array = array(
      'c_comment' => $array_data['c_comment'],
      'c_date' => gmdate('Y-m-d h:m:s', time())
    );
    $where = array(
      'c_idx' => $array_data['c_idx']
    );
    $this->db->update('i_comment', $update_array, $where);
    $result = $this->get_topCommentView($array_data['c_idx']);
    return $result;
  }
  
  
  function deleteComment($array_data)
  {
    $update_array = array(
      'c_del' => 'Y'
    );
    $where = array(
      'c_idx' => $array_data['c_idx']
    );
    $result = $this->db->update('i_comment', $update_array, $where);
    return $result;
  }
  
  function modify_inquiry($id)
  {
    $sql = "select * from board where b_idx='".$id."'";
    $query = $this->db->query($sql);
    
    // 게시물 내용 반환
    $result = $query->result();
    
    // echo var_dump($result);
    return $result;
  }
  
  function delete_inquiry($arrays)
  {
    $update_array = array(
      'i_del' => 'Y'
    );
    $where = array(
      'i_idx' => $arrays
    );
    $result = $this->db->update('inquiry', $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  /*  상담문의관리  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  기업/대학 단체교육문의  */
  
  function get_list_lecture($type='', $offset='', $limit='', $search_word='', $search_word_1='')
  {
    $limit_query = '';
    
    if( $limit != '' OR $offset != '' )
    {
      // 페이징 있을경우 처리
      $limit_query = ' LIMIT '.$offset.', '.$limit;
    }
    
    
    if( $search_word_1 == 'on')
    {
      if($search_word != ''){
        $sword = 'WHERE (l_writer like "%'.$search_word.'%" or l_name like "%'.$search_word.'%") ORDER BY l_idx desc'.$limit_query;
      }else{
        $sword = 'ORDER BY l_idx desc'.$limit_query;
      };
    }else{
      if($search_word != ''){
        $sword = 'WHERE (l_writer like "%'.$search_word.'%" or l_name like "%'.$search_word.'%") and l_chk="X" ORDER BY l_idx desc'.$limit_query;
      }else{
        $sword = 'WHERE l_chk="X" ORDER BY l_idx desc'.$limit_query;
      };
    }
    
    // echo $sword;
    $sql = "SELECT * FROM lecture ".$sword;
    $query = $this->db->query($sql);
    
    if( $type == 'count' )
    {
      // 리스트를 반환 X 전체 개시물수를 반환
      $result = $query->num_rows();
    }
    else
    {
      //게시물 리스트 반환
      $result = $query->result();
    }
    
    return $result;
  }
  
  function get_view_lecture($id)
  {
    
    $sql = "select * from lecture where l_idx='".$id."'";
    $query = $this->db->query($sql);
    
    // 게시물 내용 반환
    $result = $query->row();
    
    return $result;
  }

  function updateLChk($array_data)
  {
    $update_array = array(
      'l_chk' => $array_data['l_chk']
    );
    $where = array(
      'l_idx' => $array_data['l_idx']
    );
    $result = $this->db->update('lecture', $update_array, $where);
    return $result;
  }
  
  
  function insert_corporate($array_data)
  {
    $insert_array = array(
      'l_division' => $array_data["l_division"],
      'l_name' => $array_data["l_name"],
      'l_writer' => $array_data["l_writer"],
      'l_course' => $array_data["l_course"],
      'l_num' => $array_data["l_num"],
      'l_mail' => $array_data["l_mail"],
      'l_contents' => $array_data["l_contents"],
      'l_people' => $array_data["l_people"],
      'l_place' => $array_data["l_place"],
      'l_business' => $array_data["l_business"],
      'user_ip' => $array_data["user_ip"],
      'l_date' => gmdate('Y-m-d h:m:s', time())
    );
    $this->db->insert('lecture', $insert_array);
    
    $result = $this->db->insert_id();
    
    return $result;
    
    /*$result = $this->get_topCommentView($this->db->insert_id('i_idx'));*/
  }
  
  
  function insert_university($array_data)
  {
    $insert_array = array(
      'l_division' => $array_data["l_division"],
      'l_name' => $array_data["l_name"],
      'l_writer' => $array_data["l_writer"],
      'l_course' => $array_data["l_course"],
      'l_num' => $array_data["l_num"],
      'l_mail' => $array_data["l_mail"],
      'l_contents' => $array_data["l_contents"],
      'l_people' => $array_data["l_people"],
      'l_place' => $array_data["l_place"],
      'l_period' => $array_data["l_period"],
      'user_ip' => $array_data["user_ip"],
      'l_date' => gmdate('Y-m-d h:m:s', time())
    );
    $this->db->insert('lecture', $insert_array);
    
    $result = $this->db->insert_id();
    
    return $result;
    
    /*$result = $this->get_topCommentView($this->db->insert_id('i_idx'));*/
  }
  /*  기업/대학 단체교육 문의  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /*  메인 중앙 배너  */
  
  function get_list_banner()
  {
    $limit_query = '';
    
    $sword = 'ORDER BY n_range asc'.$limit_query;
    
    // echo $sword;
    $sql = "SELECT * FROM banner ".$sword;
    $query = $this->db->query($sql);
    
    $result = $query->result();
    return $result;
  }
  
  function modify_banner($idx = '')
  {
    
    // echo $sword;
    $sql = "SELECT * FROM banner where n_idx =".$idx;
    $query = $this->db->query($sql);
    
    $result = $query->result();
    return $result;
  }
  
  function insert_banner($arrays)
  {
    $this->db->select_max('n_range');
    $query = $this->db->get('banner');
    $maxRange = $query->row()->n_range;
    
    if(is_null($maxRange)){
      $maxRange = 0;
    }else{
      $maxRange++;
    }
    $detail = array(
      'file_size' => (int)$arrays['file_size'],
      'image_width' => $arrays['image_width'],
      'image_height' => $arrays['image_height'],
      'file_ext' => $arrays['file_ext']
    );
    
    $insert_array = array(
      'n_text' => $arrays['n_text'],
      'n_link' => $arrays['n_link'],
      'n_range' => $maxRange,
      'file_name' => $arrays['file_name'],
      'file_path' => $arrays['file_path'],
      'original_name' => $arrays['orig_name'],
      'detail_info' => serialize($detail),
      'n_date' => date("Y-m-d H:i:s")
    );
    $this->db->insert('banner', $insert_array);
    
    $result = $this->db->insert_id();
    
    return $result;
  }
  
  function updata_banner($arrays, $idx='')
  {
    if($idx != '')
    {
      $update_array = array(
        'n_text' => $arrays['n_text'],
        'n_link' => $arrays['n_link'],
        'n_date' => date("Y-m-d H:i:s")
      );
      
      $where = array(
        'n_idx' => $idx
      );
    }
    else
    {
      $detail = array(
        'file_size' => (int)$arrays['file_size'],
        'image_width' => $arrays['image_width'],
        'image_height' => $arrays['image_height'],
        'file_ext' => $arrays['file_ext']
      );
      
      $update_array = array(
        'n_text' => $arrays['n_text'],
        'n_link' => $arrays['n_link'],
        'file_name' => $arrays['file_name'],
        'file_path' => $arrays['file_path'],
        'original_name' => $arrays['orig_name'],
        'detail_info' => serialize($detail),
        'n_date' => date("Y-m-d H:i:s")
      );
      $where = array(
        'n_idx' => $arrays['n_idx']
      );
    };

    $result = $this->db->update('banner', $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  
   function update_bannerRange($array_data)
  {
    $SQL = "update banner set n_range = " . $array_data['n_range'] . "+" . $array_data['n_type'] . " where n_idx = '" . $array_data['n_idx'] . "'";
    $this->db->query($SQL);
    //echo $SQL."<br/";
    $nextSort = intval($array_data['n_range']) + intval($array_data['n_type']);
    $SQL = "update banner set n_range = n_range + (" . $array_data['n_type'] . "*-1) where n_idx <> '" . $array_data['n_idx'] . "' and n_range = '" . $nextSort . "'";
    $this->db->query($SQL);
    //echo $SQL;
  }
  
  
   function delete_banner($no)
  {
    $table = "banner";
    $delete_array = array(
      'n_idx' => $no
    );
    
    $result = $this->db->delete($table, $delete_array);
    
    // 결과반환
    return $result;
  }
  /*  메인 중앙 배너  */
  /*  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  */
  /*  서브  */
  
  function get_list_sub()
  {
    
    // echo $sword;
    $sql = "SELECT * FROM sub";
    $query = $this->db->query($sql);
    
    $result = $query->row();
    
    return $result;
  }
  
  function updata_title($s_title)
  {
    $update_array = array(
      's_title' => $s_title
    );
    $where = array(
      's_idx' => 1
    );
    $result = $this->db->update("sub", $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function updata_description($s_description)
  {
    $update_array = array(
      's_description' => $s_description
    );
    $where = array(
      's_idx' => 1
    );
    $result = $this->db->update("sub", $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function updata_keyword($s_keyword)
  {
    $update_array = array(
      's_keyword' => $s_keyword
    );
    $where = array(
      's_idx' => 1
    );
    $result = $this->db->update("sub", $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function updata_log($s_log)
  {
    $update_array = array(
      's_log' => $s_log
    );
    $where = array(
      's_idx' => 1
    );
    $result = $this->db->update("sub", $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function insert_logo($arrays)
  {
    $query = $this->db->get('sub');
    
    $detail = array(
      'file_size' => (int)$arrays['file_size'],
      'image_width' => $arrays['image_width'],
      'image_height' => $arrays['image_height'],
      'file_ext' => $arrays['file_ext']
    );
    
    $insert_array = array(
      's_text' => $arrays['s_text'],
      's_link' => $arrays['s_link'],
      's_logo' => $arrays['file_name'],
      'logo_path' => $arrays['file_path'],
      'logo_original' => $arrays['orig_name'],
      'logo_detail' => serialize($detail)
    );
    $this->db->insert('sub', $insert_array);
    
    $result = $this->db->insert_id();
    
    return $result;
  }
  
  function updata_logo($arrays, $new = '')
  {
    
    if($new['s_logo'] != '')
    {
      $update_array = array(
        's_text' => $arrays['s_text'],
        's_link' => $arrays['s_link']
      );
      
      $where = array(
        's_idx' => 1
      );
    }
    else
    {
      $detail = array(
        'file_size' => (int)$arrays['file_size'],
        'image_width' => $arrays['image_width'],
        'image_height' => $arrays['image_height'],
        'file_ext' => $arrays['file_ext']
      );
      
      $update_array = array(
        's_text' => $arrays['s_text'],
        's_link' => $arrays['s_link'],
        's_logo' => $arrays['file_name'],
        'logo_path' => $arrays['file_path'],
        'logo_original' => $arrays['orig_name'],
        'logo_detail' => serialize($detail)
      );
      $where = array(
        's_idx' => 1
      );
    };

    $result = $this->db->update('sub', $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function insert_footer($arrays)
  {
    $query = $this->db->get('sub');
    
    $detail = array(
      'file_size' => (int)$arrays['file_size'],
      'image_width' => $arrays['image_width'],
      'image_height' => $arrays['image_height'],
      'file_ext' => $arrays['file_ext']
    );
    
    $insert_array = array(
      's_Ftext' => $arrays['s_Ftext'],
      's_Flink' => $arrays['s_Flink'],
      's_Flogo' => $arrays['file_name'],
      'footer_path' => $arrays['file_path'],
      'footer_original' => $arrays['orig_name'],
      'footer_detail' => serialize($detail)
    );
    $this->db->insert('sub', $insert_array);
    
    $result = $this->db->insert_id();
    
    return $result;
  }
  
  function updata_footer($arrays, $new = '')
  {
    
    if($new['s_Flogo'] != '')
    {
      $update_array = array(
        's_Ftext' => $arrays['s_Ftext'],
        's_Flink' => $arrays['s_Flink']
      );
      
      $where = array(
        's_idx' => 1
      );
    }
    else
    {
      $detail = array(
        'file_size' => (int)$arrays['file_size'],
        'image_width' => $arrays['image_width'],
        'image_height' => $arrays['image_height'],
        'file_ext' => $arrays['file_ext']
      );
      
      $update_array = array(
        's_Ftext' => $arrays['s_Ftext'],
        's_Flink' => $arrays['s_Flink'],
        's_Flogo' => $arrays['file_name'],
        'footer_path' => $arrays['file_path'],
        'footer_original' => $arrays['orig_name'],
        'footer_detail' => serialize($detail)
      );
      $where = array(
        's_idx' => 1
      );
    };

    $result = $this->db->update('sub', $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function updata_info($s_info)
  {
    $update_array = array(
      's_info' => $s_info
    );
    $where = array(
      's_idx' => 1
    );
    $result = $this->db->update("sub", $update_array, $where);
    
    //echo var_dump($insert_array);
    return $result;
  }
  
  function get_list_common($type='', $offset='', $limit='', $search_word='')
  {
    $limit_query = '';
    
    if( $limit != '' OR $offset != '' )
    {
      // 페이징 있을경우 처리
      $limit_query = ' LIMIT '.$offset.', '.$limit;
    }
    
    $sword = 'WHERE b_del="N" ORDER BY b_date desc'.$limit_query;
    if( $search_word != '')
    {
      $sword = 'WHERE b_name like "%'.$search_word.'%" or b_contents like "%'.$search_word.'%" and b_del="N" ORDER BY b_date desc'.$limit_query;
    }
    
    // echo $sword;
    $sql = "SELECT * FROM board ".$sword;
    $query = $this->db->query($sql);
    
    if( $type == 'count' )
    {
      // 리스트를 반환 X 전체 개시물수를 반환
      $result = $query->num_rows();
    }
    else
    {
      //게시물 리스트 반환
      $result = $query->result();
    }
    
    return $result;
  }
  /*  사업부 공통 공지  */
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  /* 관리자 정보 */
  
  function get_manger()
  {
    
    // echo $sword;
    $sql = "SELECT * FROM manger";
    $query = $this->db->query($sql);
    
    $result = $query->row();
    
    return $result;
  }
  
  
  function get_cam()
  {
    
    // echo $sword;
    $sql = "SELECT m_cam FROM manger WHERE m_idx=0";
    $query = $this->db->query($sql);
    
    $result = $query->row();
    
    return $result;
  }
  
  function update_manger($arrays)
  {
    $update_array = array(
      'm_name' => $arrays["m_name"],
      'm_password' => $arrays["m_password"],
      'm_mail' => $arrays["m_mail"],
      'm_phone' => $arrays["m_phone"],
      'm_tell' => $arrays["m_tell"],
      'm_asdCode' => $arrays["m_asdCode"],
      'm_cam' => $arrays["m_cam"]
    );
    
    $where = array(
      'm_idx' => '0'
    );
    
    $result = $this->db->update('manger', $update_array, $where);
    
    return $result;
  }
  
}
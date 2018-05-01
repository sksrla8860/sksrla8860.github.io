<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: DevJS
 * Date: 2017-05-17
 * Time: 오후 8:06
 */

function subMenu($navName)
{
  if (isset($navName) && !empty($navName)) {
    return '_nav/nav_' . $navName;
  } else {
    return '_nav/nav_none';
  }
}

function getCampusName($cam_idx)
{
  $result = '';
  switch ($cam_idx) {
    case "1" :
      $result = "강남";
      break;
    case "2" :
      $result = "종로";
      break;
    case "3" :
      $result = "신촌";
      break;
    case "4" :
      $result = "신도림";
      break;
    case "5" :
      $result = "아카데미";
      break;
    case "7" :
      $result = "안양";
      break;
    case "8" :
      $result = "인천";
      break;
    case "9" :
      $result = "수원";
      break;
    case "10" :
      $result = "청주";
      break;
    case "11" :
      $result = "대전";
      break;
    case "12" :
      $result = "대구";
      break;
    case "13" :
      $result = "부산";
      break;
    case "15" :
      $result = "천안";
      break;
    case "16" :
      $result = "안산";
      break;
    case "17" :
      $result = "의정부";
      break;
    case "18" :
      $result = "성남";
      break;
    case "19" :
      $result = "부천";
      break;
    case "22" :
      $result = "전주";
      break;
    case "23" :
      $result = "일산";
      break;
    case "24" :
      $result = "울산";
      break;
    case "25" :
      $result = "대전중앙";
      break;
    case "33" :
      $result = "신촌";
      break;
  }
  return $result;
}

function inquiry_route($route)
{
  $result = '';
  switch ($route) {
    case "1" :
      $result = "퀵 문의";
      break;
    case "2" :
      $result = "온라인 상담";
      break;
    case "3" :
      $result = "수강료 조회";
      break;
    case "4" :
      $result = "위치조회";
      break;
    case "5" :
      $result = "기타";
      break;
  }
  return $result;
}

function inquiry_title($title_num)
{
  $result = '';
  switch ($title_num) {
    case "1" :
      $result = "일반 과정";
      break;
    case "2" :
      $result = "내일배움카드";
      break;
    case "3" :
      $result = "재직자 과정";
      break;
    case "4" :
      $result = "국기 과정";
      break;
    case "5" :
      $result = "기타";
      break;
  }
  return $result;
}


function toOutput($p_value)
{  
  if(empty($p_value)) $p_value = "";
  $p_value = str_replace("＇", "'", $p_value);
  $p_value = str_replace('＂', "\"", $p_value);
  $p_value = str_replace("―", "-", $p_value);
  $p_value = str_replace("；", ";", $p_value);
  $p_value = str_replace("＝", "=", $p_value);
  $p_value = preg_replace('/｛(select)｝/', "$1", $p_value);
  $p_value = preg_replace("/｛(insert)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(update)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(delete)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(drop)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(union)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(sp_)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(xp_)｝/", "$1", $p_value);
  $p_value = preg_replace("/｛(sysobject)｝/", "$1", $p_value);
  return $p_value;
}
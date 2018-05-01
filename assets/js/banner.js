function rangeEdit(range,idx,type){
  //alert(sort+' '+idx+' '+type);
  if (range == "" || idx == "" || type == "") return false;
  jQuery.ajax({
    type: "post",
    url: "/admin/partRangeUpdate",
    data: "n_range=" + range + "&n_idx=" + idx + "&n_type=" + type,
    datatype: 'text',
    success: function (data) {
      location.reload(true);
    }
  });
}

  function bannerDel(n_idx) {
    if (confirm("정말 삭제 하시겠습니까?")) {
      location.href = "/admin/bannerDel/"+n_idx;
    }
  }
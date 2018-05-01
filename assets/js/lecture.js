
function updateLChk(l_idx,obj)
{
  var state = $(obj).val();
  if (l_idx)
  {
    $.ajax({
      type: "POST",
      url: "/admin/updateLChk",
      data: 'l_idx='+l_idx+'&l_chk='+state,
      dataType: "text",
      success: function(data){
        alert('상담여부 변경 완료');
      },
      error: function (response) {
        alert(response.d);
      }
    });
  }
}
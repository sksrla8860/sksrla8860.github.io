
function updateiChk(i_idx,obj)
{
  var  state = $(obj).val();
  if (i_idx)
  {
    $.ajax({
      type: "POST",
      url: "/admin/updateiChk",
      data: 'i_idx='+i_idx+'&i_chk='+state,
      dataType: "text",
      success: function(data){
        alert('상태변경 완료');
      },
      error: function (response) {
        alert(response.d);
      }
    });
  }
}
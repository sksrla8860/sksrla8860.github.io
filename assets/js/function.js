//전화번호 체크
checkPhoneNumber = function(value) {
	var Phonepattern = "/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/";
	value = value.replace(/[-\s]+/g, "");
	return (eval(Phonepattern).test(value)) ;
}
//이메일 체크
checkEmail = function(value){
	var pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
	value = value.replace(/[-\s]+/g, "");
	return (eval(pattern).test(value)) ;
}
//공백제거
Trim = function(string){
	for(;string.indexOf(" ")!= -1;){
		string=string.replace(" ","");
	}
	return string;
}
$('.num_only').css('imeMode','disabled').keyup(function(){
	if( $(this).val() != null && $(this).val() != '' ) {
		$(this).val( $(this).val().replace(/[^0-9]/g, '') );
	}
});

//길이체크
lengCheck = function(val1,val2){
	if (val1 < val2){
		return false;
	}
	return true;
}

isCharChk = function(strTxt){
	var str = strTxt;
	if (str.length == 0) return false;
	str = str.toUpperCase();
	for(var i=1;i < str.length;i++) {
  if(!(('A' <= str.charAt(i) && str.charAt(i) <= 'Z') || ('0' <= str.charAt(i) && str.charAt(i) <= '9') || str.charAt(i) == '_')){
		return false;
	}
 }
 return true;
}


function forRowspan(tableID,blockNumber){
	$('#'+tableID).each(function() {
		var table = this;
		blockNumber = eval(blockNumber);
		$.each(blockNumber /* 합칠 칸 번호 */, function(c, v) {
			var tds = $('>tbody>tr>td:nth-child(' + v + ')', table).toArray(), i = 0, j = 0;
			for(j = 1; j < tds.length; j ++) {
				if(tds[i].innerHTML != tds[j].innerHTML) {
					$(tds[i]).attr('rowspan', j - i);
					i = j;
					continue;
				}
				$(tds[j]).hide();
			}
			j --;
			if(tds[i].innerHTML == tds[j].innerHTML) {
				$(tds[i]).attr('rowspan', j - i + 1);
			}
		});
	});
}

jQuery.fn.rowspan = function(colIdx) {
	return this.each(function(){
		var that;
		$('tr', this).each(function(row) {
			$('td:eq('+colIdx+')', this).filter(':visible').each(function(col) {
				if ($(this).html() == $(that).html()) {
					if ($(that).attr("rowSpan") == "undifined" || $(that).attr("rowSpan") == window.undifined){
						rowspan = that.getAttribute("rowSpan");
					}else{
						rowspan = $(that).attr("rowSpan");
					}
					if (rowspan == undefined) {
						$(that).attr("rowSpan",1);
						rowspan = $(that).attr("rowSpan");
					}
					rowspan = parseInt(rowspan)+1;
					if ($(that).attr("rowSpan") == "undifined" || $(that).attr("rowSpan") == window.undifined){
						that.setAttribute("rowSpan",rowspan);
					}else{
						$(that).attr("rowSpan",rowspan); // do your action for the colspan cell here
					}
					$(this).hide(); // .remove(); // do your action for the old cell here
				} else {
					that = this;
				}
				that = (that == null) ? this : that; // set the that if not already set
			});
		});
	});
}

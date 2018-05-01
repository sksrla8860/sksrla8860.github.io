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
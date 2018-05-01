$(function () {
			var w = $(window).width();
			var iframe = $('.section2 iframe');
			var b_wh = iframe.width();
			if(w < 1080){
					iframe.height(b_wh*0.6);
					$('.notice_info').height(b_wh*0.47);
			}else{
					iframe.height("100%");
					$('.notice_info').height("100%");
			};

			$(window).on("resize",function(){
							var iframe = $('.section2 iframe');
							var b_wh = iframe.width();
							var w = $(window).width();
							if(w < 1080){
											iframe.height(b_wh*0.6);
											$('.notice_info').height(b_wh*0.47);
							}else{
											iframe.height("100%");
											$('.notice_info').height("100%");
							};

					});

	});


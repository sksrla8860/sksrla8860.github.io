    $(function () {

            var w = $(window).width();
            if(w < 641){
                var ncs_wh = $(".img_box").width();
                $(".img_box").height(ncs_wh*0.5);
            }else if(w > 640, w < 1080){
                var ncs_wh = $(".img_box").width();
                $(".img_box").height(ncs_wh*0.45);
            }else if(w > 1079){
                $(".img_box").height('267px');
            };

        $(window).on("resize",function(){
            var w = $(window).width();
            if(w < 641){
                var ncs_wh = $(".img_box").width();
                $(".img_box").height(ncs_wh*0.5);
            }else if(w > 640, w < 1080){
                var ncs_wh = $(".img_box").width();
                $(".img_box").height(ncs_wh*0.45);
            }else if(w > 1079){
                $(".img_box").height('267px');
            };

        });
});
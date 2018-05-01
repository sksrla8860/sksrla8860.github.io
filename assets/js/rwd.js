    $(function () {

        var p_wh = $(".picture_box > li").width();
        $(".picture_box").height(p_wh * 0.57);

        var t_wh = $(".top_icon > li").width();
        $(".top_icon").height(p_wh * 1);

        var b_wh = $(".img_box").width();
        $(".img_box").height(b_wh * 0.473);

        var w = $(window).width();
        if (w > 1079) {
            $(".img_box").height('360px');
        };

        if (w > 639, w < 1080) {
            var articlewh = $('.article02 > div').width();
            $('.article02 > div').height(articlewh * 0.234426);
        };

        if (w < 1080) {
            var numBox = $('.numberBox div').width();
            $('.numberBox div').height(numBox * 0.882759 + " !important");
        };

        if (w < 640) {
            $('.article02 > div').height(350);
        };

        $(window).on("resize", function () {

            var w = $(window).width();
            var p_wh = $(".picture_box > li").width();
            $(".picture_box").height(p_wh * 0.57);
            var t_wh = $(".top_icon > li").width();
            $(".top_icon").height(p_wh * 1);
            var b_wh = $(".img_box").width();
            $(".img_box").height(b_wh * 0.473);

            if (w > 1079) {
                $(".img_box").height('360px');
            };

            if (w > 639, w < 1080) {
                var articlewh = $('.article02 > div').width();
                $('.article02 > div').height(articlewh * 0.234426);
            };

            if (w < 1080) {
                var numBox = $('.numberBox div').width();
                $('.numberBox div').height(numBox * 0.882759);
            };

            if (w < 640) {
                $('.article02 > div').height(350);
            };
        });
    });
$(function(){
//    var curriculum_list = $('.curriculum_list');
//    var i = 0;
//
//    for(; i<op.length; i++){
//        curriculum_list.append('<li class="curriculum">');
//        list(i);
//    };
//
//    function list(i){
//        var curriculum = $('.curriculum');
//        curriculum.eq(i).append('<h4 class="ellipsisStyle">'+op[i].name);
//
//        curriculum.eq(i).append('<ul>');
//        curriculum.eq(i).append('<div class="table_box">');
//        var curriculum_ul = curriculum.children('ul'),
//            curriculum_div = curriculum.children('div');
//        curriculum_ul.eq(i).append('<li class="curriculum_show"><a href="#">'+"자세히보기");
//        curriculum_ul.eq(i).append('<li class="online_counselling"><a href="#">'+"온라인상담");
//        curriculum_ul.eq(i).append('<li class="curriculum_plus"><span>'+"자세히");
//        curriculum_div.eq(i).append('<ul class="title_table"><li class="days">'+'교육기간'+'</li><li class="week">'+'교육일'+'</li><li class="time">'+'시간'+'</li><li class="count">'+'인원'+'</ul>');
//
//        for(d=0; d<op[i].curriculum.length; d++){
//            curriculum_div.eq(i).append('<ul><li class="days">'+op[i].curriculum[d].days+'</li><li class="week">'+op[i].curriculum[d].week+'</li><li class="time">'+op[i].curriculum[d].time+'</li><li class="count">'+op[i].curriculum[d].count+"/"+op[i].curriculum[d].capacity+'</li><li class="situation"><img><span>'+'접수중'+'</span></li><li class="reservation"><a><img><span>'+'사전예약'+'</span></a></li></ul>');
//            curriculum_div.eq(i).children('ul').find('a').attr({"href":op[i].curriculum[d].link});
//            curriculum_div.eq(i).children('ul').find('.situation img').attr({"src":op[i].curriculum[d].img});
//            curriculum_div.eq(i).children('ul').find('.reservation img').attr({"src":op[i].curriculum[d].reservation});
//        }
//    }


        $('.curriculum_plus').on('click', function(){
            $(this).parents('.curriculum').toggleClass('on');
            $(this).toggleClass('curriculum_up');
        });
});
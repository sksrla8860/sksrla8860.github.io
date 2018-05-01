    $(function () {

    $(".tab_content").hide();
    $(".tab_content:first").show();

    $(".tab_silde li").click(function () {
        $(".tab_silde li").removeClass("on");
        $(this).addClass("on");
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).show();
        var history = $(this).text();
        $(".history_1").text(history);
    });
});
$(window).load(function () {

    //商品图左右滚动
    $(".slider").sliderRoll({
        time: 300,
        mouseover: true
    });

    //大图放大镜效果
    $(".compare-detail .jqzoom").jqueryzoom({xzoom: 150, yzoom: 150});

    //修改预览图地址
    $("#spec-list").find("li").live('mouseover', function () {
        var parent = $(this).closest(".preview");
        parent.find(".jqzoom img").attr("src", $(this).children("img").attr("src"));
    });

    $(".compare-tab .list-item").click(function () {
        var _switch = $(this).parent().siblings(".switch-panel");
        _switch = _switch.find(".tab-switch")
        var index = $(this).index();
        if (!$(this).hasClass("current")) {
            $(this).addClass("current").siblings().removeClass("current");
            _switch.eq(index).removeClass("hidden").siblings().addClass("hidden");
        }
    })
    var _width = $(window).width();
    var _comp = $(".compare");
    var _top = $(".hd-toolbar-footer");
    _comp.css("left", -_width + 'px')
    $(".join-comp-btn,.comp-shrick").click(function () {
        _comp.show();
        _comp.stop().animate({"left": 0}, function () {
            $(".comp-shrick").addClass("hidden");
            if (_top.css("display") == 'block') {
                _top.addClass("hidden");
            }
        });
    })

    $(".join-comp-btn").click(function () {
        sku_id = $(this).data('id');
        $.get('plugin.php?id=compare:comparing&action=join&sku_id=' + sku_id, function (res) {
            if (res.status == 0) {
                alert(res.message);
            }else{
                $('.compare-switch').html(res);
            }

        })
    })

    $(".comp-hiden").click(function () {
        _comp.stop().animate({"left": -_width + 'px'}, function () {
            var scrollTop = $(window).scrollTop;
            $(".comp-shrick").removeClass("hidden");
            _top.removeClass("hidden");
        });
    })

    var comp_li = $(".compare-switch .list")
    var comp_item = $(".compare-switch .list .comp-content")
    $(".clear-comp").click(function () {
        $.get('plugin.php?id=compare:comparing&action=clear&sku_id=' + sku_id, function (res) {
            if (res.status == 0) return false;
            $('.compare-switch').html(res);
        })
        /*if (comp_item.length < 1) return false;
        for (i = 0; i < comp_li.length; i++) {
            var elem = comp_li.eq(i).find(".comp-content");
            if (elem.length > 0) {
                elem.remove();
                comp_li.eq(i).find(".comp-num").removeClass("hidden");
            }
        }*/
    })
    var elem_lig=$("input[name=light_def]");
    com_light(elem_lig)
    $("input[name=light_def]").change(function(){
        com_light($(this));
    })
    function com_light(elem){
        var data=compare();
        if(elem.attr("checked")){
            for(i=0;i<data.length;i++){
                if(data[i]==1){
                    $(".compare-detail").find("tr").eq(i+1).addClass("text-blue-pare");
                }
            }
        }else{
            $(".compare-detail").find("tr").removeClass("text-blue-pare");
        }
    }

    $("input[name=hide_same]").change(function(){
        com_hide($(this));
    })
    var elem_hide=$("input[name=hide_same]");
    com_hide(elem_hide);
    function com_hide(elem){
        var data=compare();
        if(elem.attr("checked")){
            for(i=0;i<data.length;i++){
                if(data[i]==0){
                    $(".compare-detail").find("tr").eq(i+1).addClass("hidden");
                }
            }
        }else{
            $(".compare-detail").find("tr").removeClass("hidden");
        }
    }

    function compare(){
        var aTr=$(".compare-detail").find("tr").not(':first');
        var data=[];
        aTr.each(function(){
            var aSpan=$(this).find("td span");
            var dtext=[]
            for(var i=0;i<aSpan.length;i++){
                if(aSpan.eq(i).html()){
                    dtext.push(aSpan.eq(i).html())
                }
            }
            var b=key(dtext);
            data.push(b);
        })
        return data;
    }

    function key(dtext){
        for(var i=0;i<dtext.length;i++){
            for(var j=1;j<dtext.length;j++){
                if(i!=j && dtext[i]!=dtext[j]){
                    return 1;
                }
            }
        }
        return 0;
    }


})

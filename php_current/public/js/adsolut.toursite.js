wizard = {
    next: function() {
        wizard.show(options)
    },
    show : function (options){
        wizard.execute(options);
        options.start++;
        if(options.start == options.nodelist.length)  {
            $(window).trigger('wizard.end',[options.page]);
        }
        options.start = options.start % options.nodelist.length;
        return this;
    },
    create : function () {
        $(window).bind('resize', function() {
            wizard.execute(options);
        })
        $(window).bind('wizard.next', function() {
            wizard.next();
        })
        binded_listener = true;
        return this;
    },
    execute : function(options) {
        wizard.clear();
        options.hole.id = options.nodelist[options.start].nodeid;
        options.tooltip.content = $('#'+options.nodelist[options.start].tipid);
        wizard.overlayHole(options.hole);
        wizard.tooltip(options.tooltip);
    },
    clear : function (userended){
        if (userended) {
            $(window).trigger('wizard.end',[options.page]);
        }
        $('#tooltip-wiz').remove();
        $('#overlay-top').remove();
        $('#overlay-left').remove();
        $('#overlay-right').remove();
        $('#overlay-bottom').remove();
        $('#overlay-hole').remove();
    },
    tooltip : function (options) {
                
        var tooltip_dim_x = options.dimx;
        var tooltip_dim_y = options.dimy;
        var tooltip_bgColor = options.bgcolor;
                
        var left = $('#overlay-hole').offset().left;
        var top = $('#overlay-hole').offset().top;
        var width = $('#overlay-hole').outerWidth(true);
        var height = $('#overlay-hole').outerHeight(true);
        var w_w = $(document).width();
        var w_h = $(document).height();
                
        var dt = top;
        var db = w_h - height - top;
        var dr = w_w - width - left;
        var dl = left;
                
        var t_top,t_left;
        if ( dt > tooltip_dim_y) {
            t_top = top - options.margin - tooltip_dim_y;
            t_left = left;
        } else if(dr > tooltip_dim_x) {
            t_top = top
            t_left = left + width + options.margin;
        } else if(db > tooltip_dim_y) {
            t_top = top + height + options.margin;
            t_left = left;
        } else if (dl > tooltip_dim_y) {
            t_top = top;
            t_left = dl - tooltip_dim_y - options.margin;
        } else {
            t_top = top - options.margin;
            t_left = left;
        }
        $('<div></div>').attr('id','tooltip-wiz').css({
            position:'absolute',
            width:tooltip_dim_x+"px",
            height:tooltip_dim_y+"px",
            backgroundColor:tooltip_bgColor,
            zIndex: 1001,
            top:t_top,
            left: t_left
        })
        .appendTo($('body'))
        .html(options.content.html());
    },
    overlayHole : function (options){
        var base_style = {
            margin: 0, 
            padding: 0,
            position:'absolute',
            zIndex: 1000
        }
        var left = $('#'+options.id).offset().left-parseInt($('#'+options.id).css('margin-left'));
        var top = $('#'+options.id).offset().top-parseInt($('#'+options.id).css('margin-top'));
        var width = $('#'+options.id).outerWidth(true);
        var height = $('#'+options.id).outerHeight(true);
        var left_3 = left+width;
        var top_4 = top+height;
        var width_3 = $(document).width() - width - left
        var height_4 = $(document).height() - height - top;
        $('<div></div>').attr('id','overlay-top')
        .css(options.frame_style)
        .css(base_style)
        .css({
            top:0,
            left:0,
            height:top+'px',
            width:'100%'
        }).appendTo($('body'));
        $('<div></div>').attr('id','overlay-left')
        .css(options.frame_style)
        .css(base_style)
        .css({
            top:top+'px',
            left:0,
            height:height+'px',
            width:left+'px'
        }).appendTo($('body'));
        $('<div></div>').attr('id','overlay-right')
        .css(options.frame_style)
        .css(base_style)
        .css({
            top:top+'px',
            left:left_3+'px',
            height:height+'px',
            width:width_3+'px'
        }).appendTo($('body'));
        $('<div></div>').attr('id','overlay-bottom')
        .css(options.frame_style)
        .css(base_style)
        .css({
            top:top_4+'px',
            left:0,
            height:height_4+'px',
            width:100+'%'
        }).appendTo($('body'));
        $('<div></div>').attr('id','overlay-hole')
        .css(base_style)
        .css({
            top:top+'px',
            left:left+'px',
            height:height+'px',
            width:width+'px'
        })
        .css(options.hole_style)
        .appendTo($('body'));
    }
}
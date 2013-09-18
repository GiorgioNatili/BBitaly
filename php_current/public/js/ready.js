console = console || {
    log:function(arg){},
    error:function(arg){}
};

(function($){
    $.actionBlocker = function(){
        var tmp=arguments;
        var settings = {
            message: '',
            unloadMessage:false,
            bindToUnload : true,
            blockSelector : "a[data-block]",
            blockHandler : function(){
                var href =  $(this).attr("href");
                $('#canvas,#footer').addClass('blur');
                $.confirm({
                    'title'     : 'Conferma navigazione',
                    'message'   : options.message,
                    'buttons'   : {
                        'Conferma'   : {
                            'class' : 'confirm',
                            'action': function(){
                                window.onbeforeunload=null;
                                window.location.href=href;
                            }
                        },
                        'Annulla'    : {
                            'class' : 'diniego',
                            'action': function(){
                                $('#canvas,#footer').removeClass('blur');
                            }
                        }
                    }
                });
                return false;
            }
        }
        var B = {
            block:false,
            initialized : false,
            unloadHandler : function(){
                return options.unloadMessage || options.message;
            }
        }
        var options = {};
            
        if ( $("body").data("actionBlocker")) {
            options = $("body").data("actionBlocker-options");
            B = $("body").data("actionBlocker-b")
            var args = Array.prototype.slice.apply(tmp);
            if (args.length > 0) {
                instanceMethods[args[0]].apply(this,args.slice(1,args.length));
            }
        } else {
            $("body").data("actionBlocker",true)
            options = Array.prototype.slice.apply(tmp);
            options = $.extend({}, settings, $("body").data("actionBlocker-options"), options[0]);
            $("body").data("actionBlocker-options",options)
            $("body").data("actionBlocker-b",B);
                
        }
        instanceMethods = {
            enable : function(){
                if ( !B.block){
                    B.block = true;
                    $(options.blockSelector).bind("click",options.blockHandler);
                    window.onbeforeunload=B.unloadHandler;
                }
            },
            disable : function(){
                if (B.block){
                    B.block = false;
                    $(options.blockSelector).unbind("click",options.blockHandler);
                    window.onbeforeunload=null;
                }
            }
        }
    };
})(jQuery);
    
(function($) {
    $.fn.flip = function() {
        var settings = {
            side2: '',
            flipClass: 'flip',
            side1Class: 'flip flip-side-1',
            side2Class: 'flip flip-side-2',
            ieDegradation : true,
            ieDegradationAnimation : 'fade',
            ieDegradationAnimationDuration : 500
        };
        var options;
        var element = $(this);
        var tmp=arguments;
        
        var instanceMethods = {
            start : function() {
                var side1 = element;
                var side2 = $(options.side2);
                if (0 === side1.length) {
                    return;
                }
                if (0 === side2.length) {
                    return;
                }
                if ($.browser.msie && options.ieDegradation) {
                    if (options.ieDegradationAnimation == 'fade') {
                        side1.fadeOut(options.ieDegradationAnimationDuration);
                        side2.fadeIn(options.ieDegradationAnimationDuration);
                    } else if (options.ieDegradationAnimation == 'slide') {
                        side1.slideUp(options.ieDegradationAnimationDuration);
                        side2.slideDown(options.ieDegradationAnimationDuration);
                    }
                } else {
                    side2.addClass(options.side1Class);
                    side1.addClass(options.side2Class);
                }
                var swap = options.side1;
                options.side1 = options.side2;
                options.side2 = options.swap;
            }
        }
        
        if (element.data('myplugin-defined')) {
            var args = Array.prototype.slice.apply(tmp);
            options = element.data('myplugin-options');
            if (args.length > 0) {
                instanceMethods[args[0]].apply(this,args.slice(1,args.length));
            }
        } else {
            element.data('myplugin-defined', true);
            setOptions();
            init();
        }
        
        function init() {
            element.addClass(options.flipClass);
            $(options.side2).addClass(options.flipClass);
            if ($.browser.msie && settings.ieDegradation) {
                $(options.side2).hide();
            }
        }
        
        function setOptions() {
            options = Array.prototype.slice.apply(tmp);
            options = $.extend({}, settings, element.data('myplugin-options'), options[0]);
            element.data('myplugin-options', options);
        }
        
    }
})(jQuery);

(function($){
    $.fn.languageMenu = function(options) {
        return this.each(function(i, val){
            var settings = $.extend({
                flagContainer : '#lang-baloon',
                menuItem : 'a',
                switchEvent : 'click',
                switchAnimation : 'fade',
                switchAnimationEasing : 'linear',
                switchAnimationDuration : 500,
                itemContainer : '#language-menu',
                showMenuEvent: 'click',
                showMenuAnimation: 'slide',
                showMenuAnimationEasing: 'easeOutElastic',
                showMenuAnimationDuration: 500,
                onSelection: function(e) {
                    return false;
                },
                onBeforeMenuShow: function(e) {
                    return false;
                },
                onAfterMenuShow: function(e) {
                    return false;
                }
            },options);
            $(settings.itemContainer + ' ' + settings.menuItem).live(settings.switchEvent,settings.onSelection);
            $(this).live(settings.showMenuEvent, function(e) {
                settings.onBeforeMenuShow(e);
                if (settings.showMenuAnimation == 'slide') {
                    $(settings.itemContainer).slideToggle(settings.showMenuAnimationDuration, settings.showMenuAnimationEasing);
                } else if (settings.showMenuAnimation == 'fade') {
                    $(settings.itemContainer).fadeToggle(settings.showMenuAnimationDuration, settings.showMenuAnimationEasing);
                }
                if (settings.switchAnimation == 'slide') {
                    $(settings.flagContainer).fadeToggle(settings.switchAnimationDuration, settings.switchAnimationEasing);
                } else if (settings.switchAnimation == 'fade') {
                    $(settings.flagContainer).fadeToggle(settings.switchAnimationDuration, settings.switchAnimationEasing);
                }
                settings.onAfterMenuShow(e);
                return false;
            })
        });
    }
})(jQuery);

(function($){
    $.fn.forms = function(options) {
        var _self = $(this);
        var settings = $.extend({
            select : true,
            checkbox : true,
            radio: true,
            textarea : true,
            validate : true,
            wrapTag : 'span',
            checkboxWrapClass: 'checkwrap',
            radioWrapClass: 'radiowrap',
            loader:"#loader",
            preSubmitCallback : function(e,form) {
                return true;
            },
            postSubmitCallback : function(e,form) {
                return true;
            },
            isValidCallback : function(e,form) {
                if (_self.hasClass('flipper')) {
                    if (e.errors) {
                        $('#canvas,#footer').addClass('blur');
                        _self.removeClass('sent');
                        $.confirm({
                            'title'     : 'Conferma navigazione',
                            'message'   : showError(e.errors),
                            'buttons'   : {
                                'Conferma'   : {
                                    'class' : 'diniego',
                                    'action': function(){
                                        $('#canvas,#footer').removeClass('blur');
                                    }
                                }
                            }
                        });
                    } else {
                        $('#owner-form').flip("start");
                    }
                }
                if (_self.hasClass('cr-flip')) {
                    $('#summary').flip("start");
                }
                return true;
            },
            ajaxComplete: function(data, xhr, _self) {
                var data = $.parseJSON(data.responseText);
                if (_self.attr('id') == 'ownerSignUp') {
                    if (data.errors) {
                    } else {
                        $('#next-step').attr('href',$('#next-step').attr('href')+"?m="+data.email+"&p="+data.pass);
                    }
                }
                return true;
            },
            onErrorCallback : function(e,form) {
                return true;
            }
        }, options);
        var forms = {
            init : function()  {
                if (_self.hasClass("styled")) {
                    return;
                } else {
                    _self.addClass("styled");
                }
                if (settings.select) {
                    this.initSelect();
                }
                if (settings.checkbox) {
                    this.initCheckbox();
                }
                if (settings.radio) {
                    this.initRadio();
                }
                if (settings.textarea) {
                    this.initTextArea();
                }
            },
            initSelect : function() {
                $('select', _self).on('change', function(){
                    forms.initDynamicElements($(this));
                    $(this).next().find('.sbSelector').html($(this).find(':selected').html());
                }).css({
                    position: 'absolute',
                    width: '100%',
                    height: '100%',
                    zIndex: '1',
                    opacity: '0',
                    cursor: 'pointer'
                }).parent().css("position","relative");
                $('<div class="sbHolder">\n\
                       <a href="#" class="sbToggle"></a>\n\
                       <a href="#" class="sbSelector"></a>\n\
                  </div>', _self).insertAfter($('select', _self));
            },
            initCheckbox : function() {
                this.initClickableEleme("checkbox", settings.checkboxWrapClass);
            },
            initRadio : function() {
                this.initClickableEleme("radio", settings.radioWrapClass);
            },
            initTextArea : function() {
        
            },
            initClickableEleme : function(type, wrap_class) {
                var elemen = $('input[type="'+type+'"]');
                var wrap = $("<"+settings.wrapTag+"></"+settings.wrapTag+">").addClass(wrap_class).addClass(elemen.attr('class'))
                elemen.wrap(wrap);
                elemen.filter(":checked").parent().addClass('checked');
                elemen.filter(":disabled").parent().addClass('disabled');
                elemen.bind('click', function() {
                    elemen.parent().removeClass('checked');
                    elemen.filter(":checked").parent().addClass('checked');
                })
            },
            initDynamicElements : function(el) {
                if (el != undefined && el.attr('data-target')) {
                    $.ajax({
                        type: 'GET',
                        url: el.attr('data-source'),
                        dataType: 'json',
                        data: {
                            regionid: el.val(),
                            format: 'json'
                        },
                        success: function(data) {
                            var target = $(el.attr('data-target'));
                            target.find('option').remove();
                            var holder = $(target.attr('data-holder'));
                            var option = "<option value=\"\">- Seleziona -</option>";
                            for (index in data['cities']) {
                                option += "<option value=\""+data['cities'][index].id + "\">" + data['cities'][index].name+"</option>";
                            }
                            target.html(option);
                        },
                        error: function(error) {
                            $.error('error', error);
                        }
                    });
                }
            },
            ajaxSubmit : function() {
                var method = _self.attr('method') ? $('form').attr('method') : 'GET';
                $.ajax({
                    url: _self.attr('action')+"/format/json",
                    type: method,
                    loader: false,
                    dataType : 'json',
                    data:$('form').serializeArray(),
                    success : function(data) {
                        settings.isValidCallback(data, _self);
                    },
                    complete: function(data, xhr) {
                        settings.ajaxComplete(data, xhr, _self);
                    },
                    error : function(error) {
                        $.error(error);
                    }
                });
            }
        }
        forms.init();
        $(this).bind('submit', function(e) {
            if ($(this).hasClass('sent')) {
                return false;
            }
            settings.preSubmitCallback(e, this);
            var _is_valid = true;
            if (settings.validate) {
                _is_valid = _self.valid();
            }
            if (_is_valid) {
                console.log('valid');
                if (_self.attr('data-send')) {
                    e.preventDefault();
                    console.log('ajax send');
                    $(this).addClass("sent"),
                    forms.ajaxSubmit();
                } else {
                    $('#loader').loader('start');
                    console.log('standard send');
                    return true;
                }
            } else {
                console.log('not valid');
                settings.onErrorCallback(e, _self);
            }
            e.preventDefault();
            settings.postSubmitCallback(e, _self);
            return false;
        })
    };
})(jQuery);

(function($) {
    $.fn.loader = function(options) {
        return this.each(function(i, val){
            var _holder = $(this);
            var instanceMethod = {
                init: function(options) {
                    var settings = $.extend({
                        overlayClass:"overlay",
                        overlayTag:'div',
                        id: "overlay",
                        no_of_frames : 0,
                        oldDisableValue : null
                    },options);
                    if ($('#'+settings.id).length == 0) {
                        $("<"+settings.overlayTag+"></"+settings.overlayTag+">")
                        .attr('id', settings.id)
                        .addClass(settings.overlay).appendTo('body');
                    }
                    _holder.css('background-image', 'url(' + _holder.attr('data-img') + ')');
                    settings.no_of_frames = Math.ceil(parseInt(_holder.attr('data-width'))/parseInt(_holder.attr('data-frame-width')));
                    _holder.parent().hide();
                    $('#'+settings.id).hide();
                    _holder.data('plugin-data', settings);
                },
                start : function(overlay) {
                    var settings = _holder.data('plugin-data');
                    if (overlay) {
                        $('#'+settings.id).show();
                    }
                    _holder.parent().show();
                    _holder.css('background-image', 'url(' + _holder.attr('data-img') + ')');
                    _holder.sprite({
                        fps:12,
                        no_of_frames : settings.no_of_frames
                    });
                    _holder.data('plugin-data',settings);
                }, 
                end : function() {
                    var settings = _holder.data('plugin-data');
                    _holder.parent().hide();
                    $('#'+settings.id).hide();
                    _holder.destroy();
                }
            }
            if ( instanceMethod[options] ) {
                return instanceMethod[ options ].apply( this, Array.prototype.slice.call( arguments, 1 ));
            } else if ( typeof method === 'object' || ! options ) {
                return instanceMethod.init.apply( this, arguments );
            } else {
                $.error( 'Method ' +  options + ' does not exist on jQuery.loader' );
            } 
        })
    }
})(jQuery);

(function($) {
    $.fn.tab = function() {
        return this.each(function(i, val){
            var settings = {
                child : '> div',
                containerAttr: 'data-tab-container',
                firstSelector: '.first',
                labelSelector: '*[data-tab]',
                tabRef: 'data-tab',
                changeEvent: 'click',
                changeAnimation:'fade',
                animationSpeed: 'slow',
                doneClass:'done',
                nextButtonSelector: '#next',
                nextButtonEvent: 'click',
                prevButtonSelector: '#prev',
                prevButtonEvent: 'click',
                disableButtonClass:'disabled',
                activeClass: 'active',
                fitToContent : true,
                callback : function(holder, item) {
                    var is_valid = true;
                    console.log(item);
                    var tab = $(item.attr("data-tab"));
                    $(":input",tab).each(function(i, val){
                        var valid = $(this).valid();
                        if (!valid) {
                            is_valid = false;
                        }
                    });
                    if (is_valid) {
                        return true;
                    }
                    return false;
                }
            }
            var options;
            var tmp = arguments;
            var _holder = $(this);
            
            if (_holder.data('myplugin-defined')) {
                var args = Array.prototype.slice.apply(tmp);
                options = _holder.data('myplugin-options');
                if (args.length > 0) {
                    instanceMethods[args[0]].apply(this,args.slice(1,args.length));
                }
            } else {
                _holder.data('myplugin-defined', true);
                setOptions();
                init();
            }
            instancemethods = {}
            function animateHeight(nextTab) {
                if (options.fitToContent) {
                    $(_holder.attr(options.containerAttr)).animate({
                        height:nextTab.outerHeight(true)
                    });
                }
            }
            function updateArrow(nextTab) {
                if (nextTab.index() == ($(options.child,_holder.attr(options.containerAttr)).length-1)) {
                    $(options.nextButtonSelector).addClass(options.disableButtonClass);
                } else {
                    $(options.nextButtonSelector).removeClass(options.disableButtonClass);
                }
                if (nextTab.index() != 0) {
                    $(options.prevButtonSelector).removeClass(options.disableButtonClass);
                } else {
                    $(options.prevButtonSelector).addClass(options.disableButtonClass);
                }
            }
            function setOptions() {
                console.log(tmp);
                options = Array.prototype.slice.apply(tmp);
                options = $.extend({}, settings, _holder.data('myplugin-options'), options[0]);
                _holder.data('myplugin-options', options);
            }
            function init() {
                $(_holder.attr(options.containerAttr)).css('position','relative');
                $(options.child,_holder.attr(options.containerAttr)).css({
                    position:'absolute',
                    top:0,
                    left:0
                }).hide();
                animateHeight($(options.child+options.firstSelector,_holder.attr(options.containerAttr)));
                $(options.child+options.firstSelector,_holder.attr(options.containerAttr)).show();
                $(options.labelSelector,_holder).bind(options.changeEvent, function() {
                    var tab = $($(this).attr(options.tabRef));
                    if((($(this).index()-1)!=$("."+options.activeClass,_holder).index() 
                        && !$(this).hasClass(options.doneClass)) 
                    || (!options.callback(_holder, $("."+options.activeClass,_holder)))) {
                        return false;
                    }
                    $(options.labelSelector,_holder).removeClass(options.activeClass);
                    $(this).addClass(options.doneClass+" "+options.activeClass);
                    $(options.child,_holder.attr(options.containerAttr)).filter(':visible').fadeOut(options.animationSpeed);
                    tab.fadeIn(options.animationSpeed);
                    updateArrow($(this));
                    animateHeight(tab);
                    return false;
                });
                $(options.nextButtonSelector).bind(options.nextButtonEvent, function() {
                    var currentTab = $("."+options.activeClass,_holder);
                    var nextTab = currentTab.next();
                    if (nextTab.length == 0 || !options.callback(_holder, currentTab)) {
                        return false;
                    }
                    $(options.labelSelector,_holder).removeClass(options.activeClass);
                    nextTab.addClass(options.doneClass+" "+options.activeClass);
                    $(currentTab.attr(options.tabRef)).fadeOut(options.animationSpeed);
                    $(nextTab.attr(options.tabRef)).fadeIn(options.animationSpeed);
                    updateArrow(nextTab);
                    animateHeight($(nextTab.attr(options.tabRef)));
                    return false;
                });
                $(options.prevButtonSelector).bind(options.prevButtonEvent, function() {
                    var currentTab = $("."+options.activeClass,_holder);
                    var prevTab = currentTab.prev();
                    if (prevTab.length == 0 || !options.callback(_holder, currentTab)) {
                        return false;
                    }
                    $(options.labelSelector,_holder).removeClass(options.activeClass);
                    prevTab.addClass(options.activeClass)
                    $(currentTab.attr(options.tabRef)).fadeOut(options.animationSpeed);
                    $(prevTab.attr(options.tabRef)).fadeIn(options.animationSpeed);
                    updateArrow(prevTab);                
                    animateHeight($(prevTab.attr(options.tabRef)));
                    return false;
                });
            }
        });
    }
})(jQuery);

$.validator.setDefaults({
    ignore: ''
});
$(function() {
    $('#canvas').on('click','a[rel="ajax"]', function(e) {
       e.preventDefault();
       $.ajax({
           method: $(this).attr('rel-method'),
           url:$(this).attr('href'),
           data : { format : 'json' },
           dataType: 'json',
           success: function(data) {
               if (data.response) {
                   eval(data.response);
               }
           },
           error: function() {}
       })
       return false;
    })
    $('.addmore').bind('click', function() {
        var input = $('<span class="upload-area-cli clearfix" style="display:none;margin-top:20px;"> \
                        <span class="filename"></span>\
                        <span class="browse">sfoglia...</span>\
                        <input id="cv" class="required" type="file" name="gallery[]" accept="png,jpg" style="top: 0px; left: 0px;"/>\
                    </span>');
        $('#tabContent').animate({
            height:$('#tabContent').height()+60
            })
        input.insertBefore(this).fadeIn("slow");
    })
    $.validator.addMethod("phone", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, ""); 
        return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(039|\+39)?[- ]?([0-9]\d{2})[- ]?([0-9]+)$/g);
    }, "Per favore inserisci un numero di telefono valido");
    
    $.actionBlocker({
        message:'Non hai ancora completato la pre-registrazione.<br />Vuoi uscire senza prima inviare la tua richiesta?',
        unloadMessage:'Non hai ancora completato la pre-registrazione.'
    });
    $('#canvas').on("change",':input', function() {
        $.actionBlocker("enable");
    }).on("click",'input[type="submit"]', function(){
        $.actionBlocker("disable");
    }).on('submit', 'form[data-submit-type="ajax"]', function(event){
        var _this = $(this);
        var method = $(this).attr('method');
        var data = $(this).serialize();
        var url  = $(this).attr('action');
        var successMex  = $(this).attr('data-success-message');
        var errorContainer  = $('#'+$(this).attr('data-error-container'));
        console.log(errorContainer);
        $.ajax({
            type: method,
            data : data,
            url : url,
            dataType: 'json',
            success : function(data) {
                console.log('evaluating form: ', _this);
                if (data.isError) {
                    console.log('is error');
                    if (errorContainer.length == 0) {
                        console.log('creating error container');
                        errorContainer = $('<fieldset class="error"></fieldset>').insertBefore(_this.children(':first'));
                        errorContainer.attr('id',_this.attr('data-error-container'));
                    }
                    for (var index in data.errors) {
                        $(errorContainer).html("<p>"+adsolutCoreTranslation[data.errors[index]]+"</p>");
                    }
                } else {
                    console.log("no errors");
                    if (typeof data.js == "undefined") {
                        console.log("no js to evaluate");
                        $.facebox(successMex);
                    } else {
                        console.log("no errors");
                        if (data.eval == 1) {
                            console.log("evaluate js");
                            eval(data.js);
                        } else {
                            console.log("message in facebox");
                            $.facebox(data.js);
                        }
                    }
                }
            },
            error : function(errors, text_status) {
                $.facebox("Unknown Error");
            }
        });
        return false;
    })
    $('#owner-form').flip({
        side2:'#confirm'
    });
    $('#summary').flip({
        side2 : '#congratulation'
    });
    //    $('#save').click(function() {
    //        $('#summary').flip("start");
    //    });
    $('#lang-menu-item').languageMenu();
    //    $('form').forms();
    $('#ownerSignUp').forms();
    $('.cr-flip').forms();
    $('.cr-flip').validate({
        rules: {
            passwd : "required",
            c_passwd : {
                equalTo : '#passwd'
            }
        }
    });
    $('#loader').loader();
    $(document).bind('ajaxStart', function(e) {
        $('#loader').loader('start');
    })
    $(document).bind('ajaxComplete', function(e, xhr) {
        $('#loader').loader('end');
    })
    $(".upload-area-cli input[type='file']").live("change",function(){
        var filename = $(this).val().match(/[^\/\\]+$/);
        if (filename){
            $(this).parent().find(".filename").html("<sup>&nbsp;</sup>"+filename[0].substring(0, 33));
        }
        else{
            $(this).parent().find(".filename").html(""); 
        }
        $(this).trigger("blur").valid();
    })
    $(".upload-area-cli").live("mousemove",function(e){
        var file = $(this).find("input[type='file']");
        file.css({
            top:e.pageY-$(this).offset().top-file.height()/2,
            left:e.pageX-$(this).offset().left-file.width()+10
        });
    }).live("dragenter",function(){ 
        var file = $(this).find("input[type='file']");
        file.css({
            top:-file.height(),
            left:-file.width()
        });
    }).live("mouseout",function(){
        var file = $(this).parent().find("input[type='file']");
        file.css({
            top:0,
            left:0
        });
    });
    $('*[data-tab-container]').tab();
    $('.descriptions-lang ul').idTabs();
    $('#vertTabContLabel ul').idTabs({
        first:1,
        click:function(idTab){
            if ($('#services').hasClass('active')) {
//                console.log(idTab);
//                console.log($('#servicesTab').outerHeight(true));
//                var h = Math.max($('#servicesTab').outerHeight(true)+75,$('#vertTabContLabel').outerHeight(true)+75);
                var h = $(idTab).attr("data-height");
                console.log('height:',h);
                $('#tabContent').animate({
                    'height':((1*h)+150)
                },'slow');
            }
            return true;
        }
    });
    if ($.fn.editable) {
        $(document).editable();
    }
})

function showError(errArr){
    var messages = {
        401 : "L'email che hai scelto &egrave; gi&agrave; in uso"
    }
    var m = "";
    for (index in errArr) {
        m += messages[errArr[index]]+"<br />";
    }
    return m;
}
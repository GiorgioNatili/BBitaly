(function($)
    {
        $.fn.editable = function(options)
        {
            return this.each( function( el )
            {
                var defaults = {
                    toolbar_classname : 'editable_toolbar',
                    dialog_options : {
                        resizable:true,
                        draggable:true,
                        modal:true,
                        width:600
                    },
                    dialog_template : '<div class="dialog"><div class="ajax_loading"></div></div>',
                    dialog_loaded : function(){},
                    show_dialog_event : 'click',
                    element_callback_attribute : 'data-edit-href',
                    element_entity_type : 'data-edit-type',
                    element_field : 'data-edit-field',
                    element_id : 'data-edit-id',
                    dialog_form_selector : '.form form',
                    edit_callback : 'data-edit-callback'
                };
                var element = $(this);
                var instance = this;
                var form_data = [];
                setOptions();
                initialize();
            
                function setOptions()
                {
                    options = $.extend({}, defaults, element.data('editable:options'), options);
                    element.data('editable:options', options);
                }
            
                function initialize()
                {
                    $.each( $( "*["+options.element_callback_attribute+"]" ),function(i,val){
                        var toolbar = getToolbar(val);
                        $(val).append(toolbar).mouseenter(function(){
                            toolbar.css("left",getNodeWidth($(val))-toolbar.width()).stop().fadeIn("fast");
                        }).mouseleave(function(){
                            toolbar.stop().fadeOut("fast");
                        });
                    });
                }
            
                function showDialog()
                {
                    var dialog = getDialog();
                    var call_back_attribute = $(this).attr(options.element_callback_attribute);
                    var entity_type = $(this).attr(options.element_entity_type);
                    var field = $(this).attr(options.element_field);
                    var id = $(this).attr(options.element_id);
                    var edit_callback = $(this).attr(options.edit_callback);
                    dialog.load($(this).attr(options.element_callback_attribute),function(){
                        dialog.find(options.dialog_form_selector).bind("submit",function(event){
                            event.preventDefault();
                            if ( form_data[entity_type] === undefined )
                            {
                                form_data[entity_type] = [];
                            }
                            if ( form_data[entity_type][id] === undefined )
                            {
                                form_data[entity_type][id] = [];
                            }
                            form_data[entity_type][id][field] = $(this).serialize();
                            $(this).unbind("submit");
                            dialog.dialog( "close" );
                            callbacks[edit_callback](form_data);
                            return false;
                        });
                        options.dialog_loaded();
                    });
                    return false;
                }
            
                function getDialog()
                {
                    return $(options.dialog_template).dialog(options.dialog_options);
                }
            
                function getToolbar(val)
                {
                    return $('<div class="'+options.toolbar_classname+'" />')
                    .attr(options.element_callback_attribute,$(val).attr(options.element_callback_attribute))
                    .attr(options.element_entity_type,$(val).attr(options.element_entity_type))
                    .attr(options.element_field,$(val).attr(options.element_field))
                    .attr(options.element_id,$(val).attr(options.element_id))
                    .attr(options.edit_callback,$(val).attr(options.edit_callback))
                    .bind(options.show_dialog_event,showDialog);
                }
            
                function getNodeWidth(node)
                {
                    var clone = node.clone().css("position","absolute").css("visibility","hidden").appendTo($("body").eq(0));
                    var width = clone.outerWidth();
                    clone.remove();
                    return Math.min(width*1+node.find("."+options.toolbar_classname).outerWidth(),node.width());
                }
            });
        }
    })(jQuery);
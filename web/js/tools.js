(function($, win, undef) {
    var tools = {
        "init" : function() {
            // $("#tool_main").on("click", "[data-action=ChangeJson]", tools.getResult);
            // $("#tool_main").on("click", "[data-action=ShowTime]", tools.getResult);
            // $("#tool_main").on("click", "[data-action=DiffData]", tools.getResult);
            // $("#tool_main").on("click", "[data-action=Qrcode]", tools.getResult);
            // $("#tool_main").on("click", "[data-action=LinkChange]", tools.getResult);
            // $("#tool_main").on("click", "[data-action=ClearSame]", tools.getResult);

            var bottons = [
                "ChangeJson",
                "ShowTime",
                "DiffData",
                "Qrcode",
                "LinkChange",
                "ClearSame",
                "Sort",
                "KSort",
            ];

            for(var action in bottons) {
                $("#tool_main").on("click", "[data-action=" + bottons[action] + "]", tools.getResult);
            }
        },
        "getResult" : function() {
            var actionName = $(this).data('action');
            var action = CONFIG[actionName];

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    'texta' : $('#texta').val(),
                    'textb' : $('#textb').val(),
                },
                async: false,
                dataType: 'text',
                success: function(data){
                    if(actionName == 'LinkChange'
                    ) {
                        tools.result_both(data);
                    } else if(actionName == 'ChangeJson') {
                        tools.result('<pre>' + data + "</pre>");
                    } else if(actionName == 'ClearSame'
                        || actionName == 'Sort'
                        || actionName == 'KSort'
                    ) {
                        tools.result_t(data);
                    } else {
                        tools.result(data);
                    }
                }
            });

            return false;
        },
        "result" : function(data) {
            $("#result-content").html(data);
        },
        "result_t" : function(data) {
            $("#textb").val(data);
        },
        "result_both" : function(data) {
            $("#textb").val(data);
            $("#result-content").html(data);
        },
    };

    var init = function() {
        if(typeof(CONFIG) != "undefined" && CONFIG.type == 'funs') {
            tools.init();
        }
    };

    $(init);
}(jQuery, window));

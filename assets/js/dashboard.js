
/* NAVBAR */



/* NAVBTNS */
$('#dashboard-navbar-btn').click(function(){
    $('#dashboard-navbar-col').slideToggle( "slow");
    return false;
});

/* TODOS */
//onclickTodo
$(".todoComponent-element").click(function(){
    var id = $(this).attr('id');
    var targetDescPanel = ".todoComponent-element-desc-"+id;
    var targetToolsBoxPanel = ".todoComponent-element-toolsbox-"+id;
    $(targetDescPanel).slideToggle( "slow");
    $(targetToolsBoxPanel).fadeToggle( "slow", "linear" );
});

$("#todoComponent-input-submit-btn").click(function(){
    $.ajax({
        method: "get",
        url: '/dashboard/refresh/todos',
        dataType: "json",
    }).done( function(response) {
        alert(123);
    }).fail(function(jxh,textmsg,errorThrown){
        console.log(textmsg);
        console.log(errorThrown);
    });
});
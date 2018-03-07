
/* NAVBAR */



/* NAVBTNS */
$('#dashboard-navbar-btn').click(function(){
    $('#dashboard-navbar-col').slideToggle( "slow");
    return false;
});

/* TODOS */
//onclickTodo
// $('.todoComponent-element').click(function(){
//     $('.todoComponent-element-desc').slideToggle( "slow");
//     $('.todoComponent-element-toolsbox').slideToggle( "slow");
//     return false;
// });

$(".todoComponent-element").click(function(){
    var id = $(this).attr('id');
    var targetDescPanel = ".todoComponent-element-desc-"+id;
    var targetToolsBoxPanel = ".todoComponent-element-toolsbox-"+id;
    $(targetDescPanel).slideToggle( "slow");
    $(targetToolsBoxPanel).fadeToggle( "slow", "linear" );
});
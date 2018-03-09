
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
        var todoCol = document.getElementById('todoComponent-elements');
        $('.todoComponent-element').remove();
        for ( var i = 0; i < response['todos']['count']; i++ ) {
            console.log(response['todos']['entities'][i]);
            var parsed_response = JSON.parse(response['todos']['entities'][i]);

            var elementCol = document.createElement('div');
            elementCol.id = i;
            if ( i === response['todos']['count'] ) {
                elementCol.className = 'col-12 todoComponent-element border-0 border-bottom-0 bg-secondary';
            } else {
                elementCol.className = 'col-12 todoComponent-element bg-secondary';
            }
            var elementRow = document.createElement('div');
            elementRow.className = 'row';

            var elementIconCol = document.createElement('div');
            elementIconCol.className = 'col-2 todoComponent-element-icon todoComponent-element-icon-'+i+' text-center';
            var elementIconSpan = document.createElement('span');
            var elementIcon = document.createElement('i');
            elementIcon.className = 'fas fa-angle-right fa-2x mt-1';

            var elementLibelleCol = document.createElement('div');
            elementLibelleCol.className = 'col-10 todoComponent-element-libelle todoComponent-element-libelle-'+i;
            var elementLibelleH6 = document.createElement('h6');
            elementLibelleH6.className = 'p-0 font-weight-bold mt-1';

            var elementToolboxCol = document.createElement('div');
            elementToolboxCol.className = 'col-10 todoComponent-element-toolsbox todoComponent-element-toolsbox-'+i+' bg-danger';
            var elementToolboxRow = document.createElement('div');
            elementToolboxRow.className = 'row';

            var elementToolboxTool1 = document.createElement('div');
            elementToolboxTool1.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool toolsbox-'+i+'-tool1';
            var elementTool1IconSpan = document.createElement('span');
            var elementTool1Icon = document.createElement('i');
            elementTool1Icon.className = 'fas fa-angle-left fa-2x mt-1';

            var elementToolboxTool2 = document.createElement('div');
            elementToolboxTool2.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool toolsbox-'+i+'-tool2';
            var elementTool2IconSpan = document.createElement('span');
            var elementTool2Icon = document.createElement('i');
            elementTool2Icon.className = 'fas fa-angle-double-right fa-2x mt-1';

            var elementToolboxTool3 = document.createElement('div');
            elementToolboxTool3.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool toolsbox-'+i+'-tool3';
            var elementTool3IconSpan = document.createElement('span');
            var elementTool3Icon = document.createElement('i');
            elementTool3Icon.className = 'fas fa-check fa-2x mt-1';

            var elementToolboxTool4 = document.createElement('div');
            elementToolboxTool4.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool toolsbox-'+i+'-tool4';
            var elementTool4IconSpan = document.createElement('span');
            var elementTool4Icon = document.createElement('i');
            elementTool4Icon.className = 'fas fa-times fa-2x mt-1';

            var elementDescCol = document.createElement('div');
            elementDescCol.className = 'col-12 todoComponent-element-desc todoComponent-element-desc-'+i;
            var elementDesc = document.createElement('p');

            todoCol.appendChild(elementCol);
            elementCol.appendChild(elementRow);
            elementRow.appendChild(elementIconCol);
            elementIconCol.appendChild(elementIconSpan);
            elementIconSpan.appendChild(elementIcon);
            elementRow.appendChild(elementLibelleCol);
            elementLibelleCol.appendChild(elementLibelleH6);
            elementRow.appendChild(elementToolboxCol);
            elementToolboxCol.appendChild(elementToolboxRow);
            elementToolboxRow.appendChild(elementToolboxTool1);
            elementToolboxTool1.appendChild(elementTool1IconSpan);
            elementTool1IconSpan.appendChild(elementTool1Icon);
            elementToolboxRow.appendChild(elementToolboxTool2);
            elementToolboxTool2.appendChild(elementTool2IconSpan);
            elementTool2IconSpan.appendChild(elementTool2Icon);
            elementToolboxRow.appendChild(elementToolboxTool3);
            elementToolboxTool3.appendChild(elementTool3IconSpan);
            elementTool3IconSpan.appendChild(elementTool3Icon);
            elementToolboxRow.appendChild(elementToolboxTool4);
            elementToolboxTool4.appendChild(elementTool4IconSpan);
            elementTool4IconSpan.appendChild(elementTool4Icon);
            elementRow.appendChild(elementDescCol);
            elementDescCol.appendChild(elementDesc);
        }
    }).fail(function(jxh,textmsg,errorThrown){
        console.log(textmsg);
        console.log(errorThrown);
    });
});
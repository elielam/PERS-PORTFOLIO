
/* NAVBAR */



/* NAVBTNS */
$(`#dashboard-navbar-btn`).off('click').click(function(){
    $(`#dashboard-navbar-col`).slideToggle( "slow");
    return false;
});

/* TODOS */
// INIT
$('#todoComponent-input-libelle').val("");
$('#todoComponent-input-description').val("");

// onclickAdd
$(`#todoComponent-input-submit-btn`).off('click').click(function(){
    let todoTitle = $('#todoComponent-input-libelle').val();
    let todoDescription = $('#todoComponent-input-description').val();
    $.ajax({
        method: "post",
        url: '/dashboard/add/todos',
        data: {newTitle: todoTitle, newDescription: todoDescription },
        dataType: "json",
    }).done( function(response) {
        reconstructTodoDom(response);
    }).fail(function(jxh,textmsg,errorThrown){
        console.log(textmsg);
        console.log(errorThrown);
    });
});

//onclickTodo
function initTodoElementComportement() {
    $(".todoComponent-element").fadeToggle(1000);
    $(".todoComponent-element").off('click').click(function () {
        let id = $(this).attr('id');
        let targetDescPanel = ".todoComponent-element-desc-" + id;
        let targetToolsBoxPanel = ".todoComponent-element-toolsbox-" + id;
        $(targetDescPanel).slideToggle("slow");
        $(targetToolsBoxPanel).fadeToggle("slow", "linear");
    });
}

// onclickDelete
function deleteTodoAction() {
    $('.todoComponent-element-toolsbox-tool-delete').off('click').click(function () {
        let id = $(this).attr('id');
        $.ajax({
            method: "post",
            url: '/dashboard/delete/todos',
            data: {todoId: id},
            dataType: "json",
        }).done( function(response) {
            reconstructTodoDom(response);
        }).fail(function(jxh,textmsg,errorThrown){
            console.log(textmsg);
            console.log(errorThrown);
        });
    });
}

// onclickUpdate
function updateTodoAction() {
    $('.todoComponent-element-toolsbox-tool-update').off('click').click(function () {
        let id = $(this).attr('id');
        let toolbox = $(this).parent().parent();
        let tmplibelle = toolbox.prev().children(0).text();
        let tmpdescription = toolbox.next().children(0).text();

        $('#todoComponent-input-libelle').val(tmplibelle);
        $('#todoComponent-input-description').val(tmpdescription);
        $('#todoComponent-input-submit-btn').hide();
        $('#todoComponent-input-update-btns').fadeIn(800);

        $('#todoComponent-input-submit-update-btn').off('click').click(function () {
            let libelle = $('#todoComponent-input-libelle').val();
            let description = $('#todoComponent-input-description').val();
            $.ajax({
                method: "post",
                url: '/dashboard/update/todos',
                data: {todoId: id, libelle: libelle, description: description},
                dataType: "json",
            }).done( function(response) {
                reconstructTodoDom(response);
                $('#todoComponent-input-libelle').val("");
                $('#todoComponent-input-description').val("");
                $('#todoComponent-input-submit-btn').show(800);
                $('#todoComponent-input-update-btns').hide();
            }).fail(function(jxh,textmsg,errorThrown){
                console.log(textmsg);
                console.log(errorThrown);
            });
        });
    });

    $('#todoComponent-input-close-update-btn').off('click').click(function () {
        $('#todoComponent-input-libelle').val("");
        $('#todoComponent-input-description').val("");
        $('#todoComponent-input-submit-btn').show(800);
        $('#todoComponent-input-update-btns').hide();
    });
}

function stateTodoAction() {
    $('.todoComponent-element-toolsbox-tool-plan').off('click').click(function () {
        let id = $(this).attr('id');
        let state = 1;
        ajaxCall(id, state);
    });

    $('.todoComponent-element-toolsbox-tool-report').off('click').click(function () {
        let id = $(this).attr('id');
        let state = 2;
        ajaxCall(id, state);
    });

    $('.todoComponent-element-toolsbox-tool-check').off('click').click(function () {
        let id = $(this).attr('id');
        let state = 3;
        ajaxCall(id, state);
    });

    function ajaxCall(id, state) {
        $.ajax({
            method: "post",
            url: '/dashboard/state/todos',
            data: {todoId: id, todoState: state},
            dataType: "json",
        }).done( function(response) {
            reconstructTodoDom(response);
        }).fail(function(jxh,textmsg,errorThrown){
            console.log(textmsg);
            console.log(errorThrown);
        });
    }
}

initTodoElementComportement();
updateTodoAction();
deleteTodoAction();
stateTodoAction();

function reconstructTodoDom(response) {
    let todoCol = document.getElementById('todoComponent-elements');
    $(`.todoComponent-element`).remove();
    for ( let i = 0; i < response['todos']['count']; i++ ) {
        let parsed_response = JSON.parse(response['todos']['entities'][i]);
        let elementCol = document.createElement('div');
        elementCol.id = i;
        if ( parsed_response.state === 3 ) {
            if ( i === response['todos']['count']-1 ) {
                elementCol.className = 'col-12 todoComponent-element border-0 border-bottom-0 bg-success';
            } else {
                elementCol.className = 'col-12 todoComponent-element bg-success';
            }
        } else {
            if ( i === response['todos']['count']-1 ) {
                elementCol.className = 'col-12 todoComponent-element border-0 border-bottom-0 bg-secondary';
            } else {
                elementCol.className = 'col-12 todoComponent-element bg-secondary';
            }
        }
        let elementRow = document.createElement('div');
        elementRow.className = 'row';

        let elementIconCol = document.createElement('div');
        elementIconCol.className = 'col-2 todoComponent-element-icon todoComponent-element-icon-'+i+' text-center';
        let elementIconSpan = document.createElement('span');
        let elementIcon = document.createElement('i');

        if ( parsed_response.state === 1 ) {
            elementIcon.className = 'fas fa-angle-right fa-2x';
        } else if ( parsed_response.state === 2 ) {
            elementIcon.className = 'fas fa-angle-double-right fa-2x';
        } else if ( parsed_response.state === 3 ) {
            elementIcon.className = 'fas fa-check fa-2x';
        } else {
            elementIcon.className = 'fas fa-angle-right fa-2x';
        }


        let elementLibelleCol = document.createElement('div');
        elementLibelleCol.className = 'col-10 todoComponent-element-libelle todoComponent-element-libelle-'+i;
        let elementLibelleP = document.createElement('p');
        elementLibelleP.className = 'p-0 m-0';
        elementLibelleP.textContent = parsed_response.libelle;

        let elementToolboxCol = document.createElement('div');
        elementToolboxCol.className = 'col-10 todoComponent-element-toolsbox todoComponent-element-toolsbox-'+i+' bg-dark';
        let elementToolboxRow = document.createElement('div');
        elementToolboxRow.className = 'row';

        if (parsed_response.state === 2 || parsed_response.state === 3) {
            var elementToolboxTool1 = document.createElement('div');
            elementToolboxTool1.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-plan toolsbox-'+i+'-tool1';
            elementToolboxTool1.id = parsed_response.id;
            var elementTool1IconSpan = document.createElement('span');
            var elementTool1Icon = document.createElement('i');
            elementTool1Icon.className = 'fas fa-angle-right fa-2x';
        } else {
            var elementToolboxTool1 = document.createElement('div');
            elementToolboxTool1.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-report toolsbox-'+i+'-tool1';
            elementToolboxTool1.id = parsed_response.id;
            var elementTool1IconSpan = document.createElement('span');
            var elementTool1Icon = document.createElement('i');
            elementTool1Icon.className = 'fas fa-angle-double-right fa-2x';
        }

        if (parsed_response.state === 3) {
            var elementToolboxTool2 = document.createElement('div');
            elementToolboxTool2.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-report toolsbox-' + i + '-tool2';
            elementToolboxTool2.id = parsed_response.id;
            var elementTool2IconSpan = document.createElement('span');
            var elementTool2Icon = document.createElement('i');
            elementTool2Icon.className = 'fas fa-angle-double-right fa-2x';
        } else {
            var elementToolboxTool2 = document.createElement('div');
            elementToolboxTool2.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-update toolsbox-' + i + '-tool2';
            elementToolboxTool2.id = parsed_response.id;
            var elementTool2IconSpan = document.createElement('span');
            var elementTool2Icon = document.createElement('i');
            elementTool2Icon.className = 'far fa-edit fa-2x';
        }

        if (parsed_response.state === 3) {
            var elementToolboxTool3 = document.createElement('div');
            elementToolboxTool3.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-update toolsbox-' + i + '-tool3';
            elementToolboxTool3.id = parsed_response.id;
            var elementTool3IconSpan = document.createElement('span');
            var elementTool3Icon = document.createElement('i');
            elementTool3Icon.className = 'far fa-edit fa-2x';
        } else {
            var elementToolboxTool3 = document.createElement('div');
            elementToolboxTool3.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-check toolsbox-' + i + '-tool3';
            elementToolboxTool3.id = parsed_response.id;
            var elementTool3IconSpan = document.createElement('span');
            var elementTool3Icon = document.createElement('i');
            elementTool3Icon.className = 'fas fa-check fa-2x';
        }

        let elementToolboxTool4 = document.createElement('div');
        elementToolboxTool4.className = 'col-3 text-center bg-dark text-white todoComponent-element-toolsbox-tool todoComponent-element-toolsbox-tool-delete last toolsbox-'+i+'-tool4';
        elementToolboxTool4.id = parsed_response.id;
        let elementTool4IconSpan = document.createElement('span');
        let elementTool4Icon = document.createElement('i');
        elementTool4Icon.className = 'fas fa-times fa-2x';

        let elementDescCol = document.createElement('div');
        elementDescCol.className = 'col-12 todoComponent-element-desc todoComponent-element-desc-'+i;
        let elementDesc = document.createElement('p');
        elementDesc.className = 'pl-2 mt-2';
        elementDesc.textContent = parsed_response.description;

        todoCol.appendChild(elementCol);
        elementCol.appendChild(elementRow);
        elementRow.appendChild(elementIconCol);
        elementIconCol.appendChild(elementIconSpan);
        elementIconSpan.appendChild(elementIcon);
        elementRow.appendChild(elementLibelleCol);
        elementLibelleCol.appendChild(elementLibelleP);
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

    $('#todoComponent-input-libelle').val("");
    $('#todoComponent-input-description').val("");

    initTodoElementComportement();
    updateTodoAction();
    deleteTodoAction();
    stateTodoAction();
}
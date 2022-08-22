$(document).on( "click", ".column-sorter" , function() {
    let column = $(this).data('column');
    let active = $(this).data('active');
    let desc = $(this).data('desc');
    if (active) {
        if (!desc) {
            desc = true;
        } else {
            active = false;
            desc = false;
        }
    } else {
        desc = false;
        active = true;
    }

    window.location = `/tasks?column=${column}&active=${active}&desc=${desc}`;
});

$(document).on( "submit", ".new-task-form" , function(event) {

    event.preventDefault();

    let requestData = {};
    $('.new-task-form__form-element').each(function () {
        requestData[$(this).attr('name')] = $(this).val();
    });

    let url = `api/tasks`;

    let requestParams = {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    };

    fetch(url, requestParams)
        .then(async (response) => {
            $('.tasks-table-with-paginator').html(await response.text());
        })
        .then((data) => {});

    return false;
});

$(document).on( "click", ".task-table__edit-button" , function(event) {
    $(this).parents('tr').addClass('editing');
    $(this).parents('tr').removeClass('not-editing');

    if (!$(this).parents('tr').find('.task-table__text-editing').length) {
        let text = $(this).parents('tr').find('.task-table__text-static').html();
        let newElementHTML = `<textarea class="task-table__text-editing hide-on-not-edit">${text}</textarea>`;
        $(this).parents('tr').find('.task-table__text').append(newElementHTML);
    }

    return false;
});

$(document).on( "click", ".task-table__stop-edit-button" , function(event) {
    $(this).parents('tr').removeClass('editing');
    $(this).parents('tr').addClass('not-editing');

    return false;
});

$(document).on( "click", ".task-table__save-button" , function(event) {
    $(this).parents('tr').removeClass('editing');
    $(this).parents('tr').addClass('not-editing');

    let newVal = $(this).parents('tr').find('.task-table__text-editing').val();
    $(this).parents('tr').find('.task-table__text-static').html(newVal);

    let url = `api/tasks/${$(this).parents('tr').data('id')}?token=${$('.api-token').val()}`;

    let requestData = {text: newVal};

    let requestParams = {
        method: 'PATCH',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    };

    $(this).parents('tr').find('.task-table__edit-message').html('Saving...');

    fetch(url, requestParams)
        .then(async (response) => {
            let result = await response.json();

            let newMessage = 'Saving error';
            if (result.success) {
                newMessage = 'Saved';
            } else {
                if (result.need_login) {
                    window.location = `/login`;
                }
            }

            $(this).parents('tr').find('.task-table__edit-message').html(`<span class="temp-message">${newMessage}</span>`);
            setTimeout(() => {
                $('.task-table__edit-message .temp-message').remove();
            }, 5000);

            $(this).parents('tr').find('.task-table__edited_by_admin').prop('checked', true);
        })
        .then((data) => {});

    return false;
});

/**
 * Handling changing tasks' status
 */
$(document).on( "change", ".task-table__status-changer" , function(event) {
    let done = $(this).is(":checked")
    let url = `api/tasks/${$(this).parents('tr').data('id')}?token=${$('.api-token').val()}`;

    let requestData = {done: done? 1: 0};

    let requestParams = {
        method: 'PATCH',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    };

    fetch(url, requestParams)
        .then(async (response) => {
            let result = await response.json();
            let newMessage = 'Status change error';
            if (result.success) {
                newMessage = 'Status changed';
            } else {
                if (result.need_login) {
                    window.location = `/login`;
                }
            }

            $(this).parents('tr').find('.task-table__edit-message').html(`<span class="temp-message">${newMessage}</span>`);
            setTimeout(() => {
                $('.task-table__edit-message .temp-message').remove();
            }, 5000);

        }) .then((data) => {});;

    return false;
});




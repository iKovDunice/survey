$(document).ready(function () {

    /**
     * Sending AJAX with FormData formed from input fields
     */
    $('#submit button').on('click', function () {
        let names = [
            'name',
            'goal1',
            'goal2',
            'goal3',
        ];
        let data = new FormData();
        for (let name of names) {
            data.append(name, $("input[name='"+name+"']").val());
        }
        $.ajax({
            url: '',
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            statusCode: {
                200: function () {
                    setMessage(`Thanks for your answers`);
                },
                400: function () {
                    setErrorMessage(`Please fill in all the fields`);
                },
                404: function () {
                    genericErrorMessage();
                },
                405: function () {
                    genericErrorMessage();
                },
                500: function () {
                    genericErrorMessage();
                }
            }
        });
    })
});

/**
 * Custom message
 *
 * @param message
 * @param icon
 */
function setMessage(message, icon = 'success') {
    swal({
        text: message,
        icon: icon
    });
}

/**
 * Error with custom message
 *
 * @param message
 */
function setErrorMessage(message) {
    setMessage(message, 'error');
}

/**
 * Error method in case if something goes wrong with application.
 */
function genericErrorMessage() {
    setErrorMessage('Something went wrong');
}
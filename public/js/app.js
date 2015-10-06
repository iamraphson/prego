/**
 * Created by Raphson on 9/25/15.
 */
$(document).ready(function() {
    $("button.delete").on('click', function(e){
        e.preventDefault();
        if ( ! confirm('Are you sure?')) {
            return false;
        }
        var action = $(this).data("action");
        var returnAction = $(this).data("return");
        //var parent = $(this).parent();
        var token  = $(this).data("token");
        //var
        $.ajax({
            type: 'POST',
            url: action,
            data: { _token: token, _method: 'delete' },
            error: function(msg) {
                alert(msg);
            },
            success: function() {
                window.location.href = returnAction;
            }
        });
    });
});
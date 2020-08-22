$(document).ready(function() {
    $("#add-answer").click(function() {
        answers_count = $( ".answers > div" ).length;
        answer = $( "#answer" ).clone();
        answer.find('label > span').html(answers_count);
        answer.appendTo( ".answers" ).show();
    });

    $('body').on('click', '#remove-answer', function() {
        $(this).parents("#answer").remove();
    });

    if($("#result").length > 0) {
        setTimeout(function () {
            update();
        }, 1000);
    }
});

function update() {
    $.ajax({
        method: "GET",
        url: "?result",
        success: function(data){
            $("#result").html(data);
            setTimeout(function() {
                update();
            }, 1000);
        },
    });
}
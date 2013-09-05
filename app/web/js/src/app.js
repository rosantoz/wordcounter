$('#inputForm').submit(function () {

    $(".result").html('counting words ...');

    var valid = $("#inputForm").valid();

    if (valid === true) {

        var request = $.post("counter.php", $("#input").serialize());

        request.done(function (result) {
            $(".result").html(result + ' words');
        });

    }

    return false;
});

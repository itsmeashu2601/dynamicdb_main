$("#databaseForm").on("submit", function (e) {
    e.preventDefault();
    var databaseNameValue = $('#databaseName').val();
    var userName = $('#userName').val();
    var userPassword = $('#userPassword').val();

    $.ajax({
        url: "createDatabase/" + databaseNameValue + "/" + userName + "/" + userPassword,
        type: "POST",

        cache: false,

        contentType: false,

        processData: false,

        dataType: "json",

        success: function (response) {
            if (response.status == 200) {
                swal("Good job!", response.message, "success");
                setTimeout(function () {
                    $(location).attr("href", "/");
                }, 2000);
            } else {
                swal("Good job!", response.message, "success");
                setTimeout(function () {
                    $(location).attr("href", "/");
                }, 2000);
            }
        },
    });
});

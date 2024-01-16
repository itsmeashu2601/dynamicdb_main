$("#databaseForm").on("submit", function (e) {
    e.preventDefault();
    
    var base_url = "https://dynamicdb.soulsoftsks.in/";
    var databaseNameValue = $('#databaseName').val();
    var userName = $('#userName').val();
    var userPassword = $('#userPassword').val();

    $.ajax({
        url: base_url + "createDatabase/" + databaseNameValue + "/" + userName + "/" + userPassword,
        type: "POST",
        dataType: "json",
        success: function (response) {
            if (response.status === 200) {
                swal("Success", response.message, "success");
                setTimeout(function () {
                    window.location.href = base_url;
                }, 2000);
            } else {
                swal("Error", response.message, "error");
            }
        },
        error: function (xhr, status, error) {
            swal("Error", "An error occurred while processing your request.", "error");
            console.error(xhr.responseText);
        }
    });
});

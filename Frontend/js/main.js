$(function () {
    $('#registration-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../backend/handler.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status === "Success") {
                    $("#registration-form").hide();
                    $('#formTitle').hide();
                    alert(response.message);
                } else
                    alert(response.message);
            }
        })
    })
})
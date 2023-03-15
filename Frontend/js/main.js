$(function () {
    $('#registration-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../backend/handler.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    $("#registration-form").hide();
                    $('#formTitle').hide();
                    alert('Успешно!');
                } else {
                    alert('Ошибка регистрации');
                }
            }
        })
    })
})
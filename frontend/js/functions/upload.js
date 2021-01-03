// Preview Escudo
$('#escudo_upload').change(function () {
    const fileReader = new FileReader()
    const file = $(this)[0].files[0]

    fileReader.onloadend = function () {
        $('#escudo_view').attr('src', fileReader.result)
    }

    fileReader.readAsDataURL(file)
});
$(document).ready(() => {
    $('#submitBtn').click(() => {
        let patient_name = $('#name').val();
        let id_num = $('#id_num').val();
        let email_address = $('#email').val();
        let doc_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'book',
            method: 'createBook',
            parameter: {
                patient_name: patient_name,
                id_num: id_num,
                email_address: email_address,
                doc_id: doc_id
            }
        };
        let json = JSON.stringify(data);
        $.ajax({
            url: '/clinic-system/controller/core.php',
            method: 'POST',
            data: json,
            success: function(res) {
                console.log(res);
            }
        });
    });
});
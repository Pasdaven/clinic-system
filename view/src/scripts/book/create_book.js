$(document).ready(() => {
    $('#submitBtn').click(() => {
        let patient_name = $('#name').val();
        let id_num = $('#id_num').val();
        let email_address = $('#email').val();
        let schedule_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'book_ctrl',
            method: 'createBook',
            parameter: {
                patient_name: patient_name,
                id_num: id_num,
                email_address: email_address,
                schedule_id: schedule_id
            }
        };
        let json = JSON.stringify(data);
        $.ajax({
            url: '/clinic-system/controller/core.php',
            method: 'POST',
            data: json,
            success: res => showBookUrl(res)
        });
    });
});

let showBookUrl = url => {
    let showUrl = document.getElementById('showUrl');
    let data = '<a href="/clinic-system/view/book_history.html?url=' + url + '" target="_blank">Link</a>';
    showUrl.innerHTML = data;
}
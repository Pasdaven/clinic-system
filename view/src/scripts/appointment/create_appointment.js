$(() => {
    $('#submitBtn').click(() => {
        let patient_name = $('#name').val();
        let id_num = $('#id_num').val();
        let email_address = $('#email').val();
        $('#modal_email').html(email_address);
        let schedule_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'appointment_ctrl',
            method: 'createAppointment',
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
            success: res => showModal(res)
        });
    });
});

const showModal = url => {
    let data = '<a href="/clinic-system/view/appointmentHistory/index.html?u=' + url + '" target="_blank">Link</a>';
    $('#link').html(data);
    $('#modal').modal('show');
}
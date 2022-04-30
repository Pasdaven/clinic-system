$(document).ready(() => {
    $(".sortable").disableSelection();
    $(".sortable").sortable({
        revert: true,
        connectWith: ".sortable",
        receive: (e) => {
            let appointment_id = e.originalEvent.target['id'];
            let appointment_state = e.target['id'];

            let data = {
                controller: 'appointment_ctrl',
                method: 'updateAppointmentState',
                parameter: {
                    appointment_id: appointment_id,
                    appointment_state: appointment_state
                }
            };

            let json = JSON.stringify(data);
            $.ajax({
                url: '/clinic-system/controller/core.php',
                method: 'POST',
                data: json,
                success: res => console.log(res)
            });
        }
    });
});
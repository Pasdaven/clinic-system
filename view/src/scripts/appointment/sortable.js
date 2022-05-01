$(document).ready(() => {
    $(".sortable").disableSelection();
    $(".sortable").sortable({
        revert: true,
        connectWith: ".sortable",
        receive: (event, ui) => {
            let appointment_id = ui.item.attr('id');
            let appointment_state = event.target['id'];

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
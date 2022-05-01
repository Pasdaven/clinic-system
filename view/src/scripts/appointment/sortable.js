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
                success: res => displayToast(res)
            });
        }
    });
});

let displayToast = res => {
    let state_color;
    if (res.state == "waiting") {
        state_color = "text-primary";
    } else if (res.state == "inProgress") {
        state_color = "text-warning";
    } else {
        state_color = "text-success";
    }
    let html = `You have change patient <strong>${res.name}</strong>'s state to <a class="${state_color}" style="text-decoration:none;">${res.state}</a>.`;
    $("#toast-message").html(html);
    let toastLive = $("#liveToast");
    let toast = new bootstrap.Toast(toastLive);
    toast.show();
}
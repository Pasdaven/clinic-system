$(document).ready(() => {
    let data = {
        controller: 'appointment_ctrl',
        method: 'getTodayAppointmentInfo',
    }
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => displayCurrentInfo(res)
    });
});

let displayCurrentInfo = data => {

    for (i = 0; i < data['waiting'].length; i++) {
        let obj = data['waiting'][i];
        let html = `
            <div class="card my-2 p-3" id="${obj.appointment_id}">
                Name: <h3>${obj.patient_name}</h3>
                Queue: ${obj.queue_num}
            </div>
        `
        $('#waiting').append(html);
    }
    for (i = 0; i < data['inProgress'].length; i++) {
        let obj = data['inProgress'][i];
        let html = `
            <div class="card my-2 p-3" id="${obj.appointment_id}">
                Name: <h3>${obj.patient_name}</h3>
                Queue: ${obj.queue_num}
            </div>
        `
        $('#inProgress').append(html);
    }
    for (i = 0; i < data['finish'].length; i++) {
        let obj = data['finish'][i];
        let html = `
            <div class="card my-2 p-3" id="${obj.appointment_id}">
                Name: <h3>${obj.patient_name}</h3>
                Queue: ${obj.queue_num}
            </div>
        `
        $('#finish').append(html);
    }
}
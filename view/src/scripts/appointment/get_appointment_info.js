$(() => {
    appointment_url = getUrl();
    let data = {
        controller: 'appointment_ctrl',
        method: 'getAppointmentInfo',
        parameter: {
            appointment_url: appointment_url
        }
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => displayInfo(res)
    });
});

const getUrl = () => {
    let param = new URLSearchParams(window.location.search);
    return param.get('u');
}

const displayInfo = data => {
    let html = 'Current queue number: ' + data.current_queue_num;
    $('#currentQueueNum').html(html);
    html = 'Name: ' + data.patient_name + '<br>' + 'state: ' + data.appointment_state + '<br>' + 'Queue Number: ' + data.queue_num + '<br>' + 'Doctor: ' + data.doc_name;
    $('#info').html(html);
}
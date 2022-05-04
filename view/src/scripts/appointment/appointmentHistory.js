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

const displayCancel = () => {
    $('#info').html('');
    let html = `
        <div class="info-row py-3 mb-3">
            <div class="col-lg-12 text-center">
                <h3>You have canceled the appointment</h3>
            </div>
        </div>
        <div class="info-row text-center">
            <div class="col-lg-12">
                <button class="appointment-btn" onclick="location.href = '../appointment';">Appointment again</button>
            </div>
        </div>
    `;
    $('#info').append(html);
}

const displayUrlError = () => {
    $('#info').html('');
    let html = `
        <div class="info-row py-3">
            <div class="col-lg-12 text-center">
                <h3>The URL is incorrect</h3>
            </div>
        </div>
    `;
    $('#info').append(html);
}

const displayFinish = () => {
    $('#info').html('');
    let html = `
        <div class="info-row py-3">
            <div class="col-lg-12 text-center">
                <h3>Your consultation has finished</h3>
            </div>
        </div>
    `;
    $('#info').append(html);
}

const displayInfo = data => {

    if (data == 'error') {
        displayUrlError();
    } else if (data.appointment_state == "cancel") {
        displayCancel();
    } else if (data.appointment_state == "finish") {
        displayFinish();
    } else {
        $('#patient_name').html(data.patient_name);
        $('#create_date').html(data.create_date);
        $('#time_period').html(data.time_period);
        $('#doc_name').html(data.doc_name);
        $('#room').html(data.room);
        $('#current_queue_num').html(data.current_queue_num);
        $('#queue_num').html(data.queue_num);
        $('#estimated_time').html(data.estimated_time);
    }
}

const cancelAppointment = () => {
    appointment_url = getUrl();
    let data = {
        controller: 'appointment_ctrl',
        method: 'setAppointmentCancel',
        parameter: {
            appointment_url: appointment_url
        }
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => location.reload()
    });
}

const cancelBtn = () => {
    $('#modal').modal('show');
}
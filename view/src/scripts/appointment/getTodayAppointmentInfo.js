$(document).ready(() => {
    getTodayAppointmentInfo('morning');
});

let getTodayAppointmentInfo = (time_period) => {
    let data = {
        controller: 'appointment_ctrl',
        method: 'getTodayAppointmentInfo',
    }
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => displayCurrentInfo(res, time_period)
    });
}

let displayCurrentInfo = (data, time_period) => {

    $('#morning-btn').removeClass('btn-primary');
    $('#evening-btn').removeClass('btn-primary');
    $('#noon-btn').removeClass('btn-primary');
    $('#morning-btn').addClass('btn-outline-dark');
    $('#evening-btn').addClass('btn-outline-dark');
    $('#noon-btn').addClass('btn-outline-dark');

    $('#waiting').html('');
    $('#inProgress').html('');
    $('#finish').html('');

    if (time_period == 'morning') {
        $('#morning-btn').removeClass('btn-outline-dark');
        $('#morning-btn').addClass('btn-primary');
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'morning') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#waiting').append(html);
            }
        }
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'morning') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#inProgress').append(html);
            }
        }
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'morning') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#finish').append(html);
            }
        }
    }
    if (time_period == 'evening') {
        $('#evening-btn').removeClass('btn-outline-dark');
        $('#evening-btn').addClass('btn-primary');
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'evening') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#waiting').append(html);
            }
        }
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'evening') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#inProgress').append(html);
            }
        }
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'evening') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#finish').append(html);
            }
        }
    }
    if (time_period == 'noon') {
        $('#noon-btn').removeClass('btn-outline-dark');
        $('#noon-btn').addClass('btn-primary');
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'noon') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#waiting').append(html);
            }
        }
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'noon') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#inProgress').append(html);
            }
        }
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'noon') {
                let html = `
                <div class="card my-2 p-3" id="${obj.appointment_id}">
                    <div class="row">
                        <div class="col-lg-6">
                            Name: <h3>${obj.patient_name}</h3>
                        </div>
                        <div class="col-lg-6 appointment-info">
                            ID: ${obj.id_num}<br>
                            Doctor: ${obj.doc_name}<br>
                            Queue: ${obj.queue_num}<br>
                        </div>
                    </div>
                </div>
                `
                $('#finish').append(html);
            }
        }
    }
}
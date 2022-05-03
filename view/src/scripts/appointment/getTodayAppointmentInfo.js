$(() => {
    getTodayAppointmentInfo();
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
// display the appointment card to the page
const displayCurrentInfo = (data) => {

    resetBtn();

    // if morning button clicked
    if (time_period == 'morning') {

        // waiting area
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'morning') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // inProgress area
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'morning') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // finish area
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'morning') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }
    }

    // if evening button clicked
    if (time_period == 'evening') {

        // waiting area
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'evening') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // inProgress area
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'evening') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // finish area
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'evening') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }
    }

    // if noon button clicked
    if (time_period == 'noon') {

        // waiting area
        for (i = 0; i < data['waiting'].length; i++) {
            let obj = data['waiting'][i];
            if (obj.time_period == 'noon') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#waiting').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // inProgress area
        for (i = 0; i < data['inProgress'].length; i++) {
            let obj = data['inProgress'][i];
            if (obj.time_period == 'noon') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#inProgress').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }

        // finish area
        for (i = 0; i < data['finish'].length; i++) {
            let obj = data['finish'][i];
            if (obj.time_period == 'noon') {

                // if room 1 button clicked
                if (room == '1') {
                    if (obj.room == '1') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }

                // if room 2 button clicked
                if (room == '2') {
                    if (obj.room == '2') {
                        $('#finish').append(cardComponent(obj.appointment_id, obj.patient_name, obj.id_num, obj.room, obj.doc_name, obj.queue_num));
                    }
                }
            }
        }
    }
}

const setTimePeriod = new_time_period => {
    time_period = new_time_period;
    getTodayAppointmentInfo();
}

const setRoom = new_room => {
    room = new_room;
    getTodayAppointmentInfo();
}
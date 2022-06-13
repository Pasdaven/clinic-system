$(() => {
    let time = new Date();
    let date = formatDate(time);
    let hour = time.getHours();
    let week_day = time.getDay();
    let time_period;

    switch (hour) {
        case 10, 11, 12:
            time_period = 'morning';
        case 14, 15, 16:
            time_period = 'evening';
        case 18, 19, 20:
            time_period = 'noon';
        default:
            time_period = 'NULL';
    }

    // 測試用，將時段預設為早上
    // time_period = 'morning';

    let data = {
        controller: "appointment_ctrl",
        method: "getCurrentQueueNum",
        parameter: {
            date: date,
            week_day: week_day,
            time_period: time_period,
        },
    };
    let json = JSON.stringify(data);
    if (time_period != "NULL") {
        $.ajax({
            url: "/clinic-system/controller/core.php",
            method: "POST",
            data: json,
            success: (res) => displayCurrentInfo(res),
        });
    } else {
        displayError();
    }
});

const displayCurrentInfo = (data) => {
    $("#time_period").html("Time: " + data[0].time_period);
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let html = `
            <div class="info-row p-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Current Queue Number
                            <h2 class="queue-num">${obj.current_queue_num}</h2>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Doctor
                                <h3>${obj.doc_name}</h3>
                            </li>
                            <li class="list-group-item">Room: ${obj.room}</li>
                        </ul>
                    </div>
                </div>
            </div>
        `;
        $("#info_area").append(html);
    }
};

const displayError = () => {
    $("#time_period").html("There is no available doctor now");
};

const formatDate = (date) => {
    let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
    return formatted_date;
};

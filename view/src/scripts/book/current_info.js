$(document).ready(() => {
    let time = new Date();
    let date = time.toISOString().split('T')[0];
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
    time_period = 'morning';
    let data = {
        controller: 'book_ctrl',
        method: 'getCurrentQueueNum',
        parameter: {
            date: date,
            week_day: week_day,
            time_period: time_period
        }
    }
    let json = JSON.stringify(data);
    if (time_period != 'NULL') {
        $.ajax({
            url: '/clinic-system/controller/core.php',
            method: 'POST',
            data: json,
            success: res => displayCurrentInfo(res)
        });
    } else {
        displayError();
    }
});

let displayCurrentInfo = data => {
    let current_info = document.getElementById('current_info');
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let row = document.createElement('tr');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        td1.innerHTML = obj.time_period;
        td2.innerHTML = obj.room;
        td3.innerHTML = obj.doc_name;
        td4.innerHTML = obj.current_queue_num;
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);
        current_info.appendChild(row);
    }
}

let displayError = () => {
    let current_info = document.getElementById('current_info');
    current_info.innerHTML = 'The time now is not available.';
}
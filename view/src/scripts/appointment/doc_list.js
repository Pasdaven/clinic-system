$(() => {
    let data = {
        controller: 'appointment_ctrl',
        method: 'getAvailableDoc'
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => createDocList(res)
    });
});

const createDocList = data => {
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let row = document.createElement('tr');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        let td5 = document.createElement('td');
        td1.innerHTML = '<input type="radio" name="doc_list" value="' + obj.schedule_id + '" required>';
        td2.innerHTML = obj.time_period;
        td3.innerHTML = obj.room;
        td4.innerHTML = obj.doc_name;
        td5.innerHTML = obj.last_queue_num;
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);
        row.appendChild(td5);
        $('#doc_tab').append(row);
    }
}
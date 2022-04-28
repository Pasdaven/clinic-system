function getPatRec() {
    var id_num = document.getElementById("pat_id_num").value;
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'showRecords',
        parameter: {
            id_num: id_num
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
        .then(res => {
            const data = res;
            console.log(data);
            if (document.getElementById("searchPatRec") != null) {
                for (var i = 0; i < data.length; i++) {
                    let text = `
                    <h4 id="${data[i]['record_id']}">Record Number : ${data[i]['record_id']}</h4>
                    <div>
                        Consulation Data : ${data[i]['consulation_date']}<br>
                        Doctor ID : ${data[i]['doc_id']}<br>
                        Disease Name : ${data[i]['disease_name']}<br>
                        Medicine Days : ${data[i]['med_days']}<br>
                    </div>
                    <div class="record_${data[i]['record_id']}">
                        Cure Medicine : 
                    </div>
                    `;
                    document.querySelector('.scroll').insertAdjacentHTML('beforeend', text);

                    let text1 = `
                    <a class="list-group-item list-group-item-action" href="#${data[i]['record_id']}">${data[i]['record_id']}</a>
                    `
                    document.querySelector('.scroll_list').insertAdjacentHTML('beforeend', text1);
                }
            }
        })
}
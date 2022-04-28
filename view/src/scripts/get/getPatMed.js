function getPatMed() {
    var id_num = document.getElementById("pat_id_num").value;
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'showPatMed',
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
                    console.log(data[i]['medicine']);
                    if (data[i]['medicine'] == null) {
                        let text1 = `NONE`;
                        document.querySelector(`.record_${data[i]['record_id']}`).insertAdjacentHTML('beforeend', text1);
                    } else {
                        for (var j = 0; j < data[i]['medicine'].length; j++) {
                            let text = `${data[i]['medicine'][j]['med_id']} `;
                            document.querySelector(`.record_${data[i]['record_id']}`).insertAdjacentHTML('beforeend', text);
                        }
                    }
                }
            }
        })
}
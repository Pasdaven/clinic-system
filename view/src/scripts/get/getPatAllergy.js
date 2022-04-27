function getPatAllergy() {
    var id_num = document.getElementById("pat_id_num").value;
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'showPatAlleMed',
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
            if (document.getElementById("doctor_index") != null) {
                if (data.length != 0) {
                    for (var i = 0; i < data.length; i++) {
                        let text = `
                    ${data[i]['allergy_med_id']} 
                    `;
                        document.querySelector('.scroll_left_inside').insertAdjacentHTML('beforeend', text);
                    }
                } else {
                    let text = `NONE`;
                    document.querySelector('.scroll_left_inside').insertAdjacentHTML('beforeend', text);
                }
            }
        })
}
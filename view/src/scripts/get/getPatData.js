function getPatData() {
    var id_num = document.getElementById("pat_id_num").value;
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'showpatInfo',
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
                    let text = `
                    <div class="p-2">
                        <h4>Patient Information</h4>
                        <div class="px-2">
                        Name: ${data['patient_name']}<br>
                        ID : ${data['id_num']}<br>
                        Case ID : ${data['case_id']}<br>
                        Blood Type: ${data['blood_type']}<br>
                        Sex : ${data['sex']}<br>
                        </div>
                        <div class="px-2 scroll_left_inside">
                        Allergy Medicine ID :
                        </div>
                    </div>
                    `;
                    document.querySelector('.scroll_left').insertAdjacentHTML('beforeend', text);
            }
        })
}
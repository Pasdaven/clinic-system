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
            if (document.getElementById("searchPatRec") != null) {
                let text1 = `<div class="clean1" id="clean1"></div>`
                document.querySelector('.scroll_left').insertAdjacentHTML('beforeend', text1);
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
                document.querySelector('.clean1').insertAdjacentHTML('beforeend', text);
            } else if (document.getElementById("searchPatInfo") != null) {
                let text1 = `<div class="clean1" id="clean1"></div>`
                document.querySelector('.box').insertAdjacentHTML('beforeend', text1);
                let text = `
                        <div class="p-5">
                            <h4>Patient Information</h4>
                            <div class="px-2">
                            Name: ${data['patient_name']}<br>
                            ID : ${data['id_num']}<br>
                            Case ID : ${data['case_id']}<br>
                            Blood Type: ${data['blood_type']}<br>
                            Sex : ${data['sex']}<br>
                            Birthday : ${data['birth']}<br>
                            Phone Number : ${data['phone_num']}<br>
                            </div>
                        </div>
                    `;
                document.querySelector('.clean1').insertAdjacentHTML('beforeend', text);
            }
        })
}
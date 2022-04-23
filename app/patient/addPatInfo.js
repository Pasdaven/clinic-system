function addPatInfo() {
    id_num = document.getElementById('id_num').value;
    patient_name = document.getElementById('patient_name').value;
    sex = document.getElementById('sex').value;
    birth = document.getElementById('birth').value;
    blood_type = document.getElementById('blood_type').value;
    phone_num = document.getElementById('phone_num').value;

    var url = '../../controller/core.php';
    let data = {
        controller: 'patient',
        method: 'addPatInfo',
        parameter: {
            id_num : id_num,
            patient_name : patient_name,
            sex : sex,
            birth : birth,
            blood_type : blood_type,
            phone_num : phone_num
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
}
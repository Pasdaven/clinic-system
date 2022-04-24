function addPatAllergy() {
    id_num = document.getElementById("id_num").value;
    allergy_med_id = document.getElementById("allergy_med_id").value;
    var url = '../../controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'addPatAllergy',
        parameter: {
            id_num: id_num,
            allergy_med_id : allergy_med_id
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
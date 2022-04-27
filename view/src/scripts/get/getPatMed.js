function getPatMed() {
    var id_num = document.getElementById("id_num").value;
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
        })
}
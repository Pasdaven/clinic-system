function addMed() {
    var med_id = document.getElementById("med_id").value;
    var med_name = document.getElementById("med_name").value;
    var med_academic_name = document.getElementById("med_academic_name").value;
    var med_effect = document.getElementById("med_effect").value;
    var url = '../../controller/core.php';
    let data = {
        controller: 'medicine_ctrl',
        method: 'insertMedInfo',
        parameter: {
            med_id: med_id,
            med_name : med_name,
            med_academic_name : med_academic_name,
            med_effect : med_effect
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
function updateMed() {
    med_id = document.getElementById('med_id').value;
    change_place = document.getElementById('change_place').value;
    change_text = document.getElementById('change_text').value;

    var url = '../../controller/core.php';
    let data = {
        controller: 'medicine_ctrl',
        method: 'updateMedInfo',
        parameter: {
            med_id: med_id,
            change_place : change_place,
            change_text : change_text
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
function getMed() {
    var med_id = document.getElementById("med_id").value;
    var url = '../../controller/core.php';
    let data = {
        controller: 'medicine_ctrl',
        method: 'showMedInfo',
        parameter: {
            med_id: med_id
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
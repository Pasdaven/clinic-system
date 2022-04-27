function getMedList() {
    var url = '../../controller/core.php';
    let data = {
        controller: 'medicine_ctrl',
        method: 'getAllMedInfo',
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
            createMedList(data);
        })
}

function createMedList(data) {
    for (var i = data.length - 1; i >= 0; i--) {
        let datalist = `<input type="checkbox" name="med_list[]" value="${data[i]['med_id']}">${data[i]['med_id'] + " " + data[i]['med_name']}</input>`;
        console.log(datalist);
        document.getElementById("med").insertAdjacentHTML('afterbegin', datalist);
        
    }
}

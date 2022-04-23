function getDocList() {
    var url = '../../controller/core.php';
    let data = {
        controller: 'doctor_ctrl',
        method: 'getAllDocInfo',
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
            createDocList(data);
        })
}

function createDocList(data) {
    for (var i = 0; i < data.length; i++) {
        let datalist = `<option value="${data[i]['doc_id']}">`;
        console.log(datalist);
        document.getElementById("doc_list").insertAdjacentHTML('afterbegin', datalist);
    }
}

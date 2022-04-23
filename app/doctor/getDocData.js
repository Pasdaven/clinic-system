function getDocData() {
    var id_num = document.getElementById("doc_id_num").value;
    var url = '../../controller/core.php';
    let data = {
        controller: 'doctor',
        method: 'showDocInfo',
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

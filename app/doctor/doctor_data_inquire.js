function getDocData() {
    var id_num = document.getElementById("doc_id_num").value;
    var url = 'doctor_data_inquire.php';
    let data = {
        controller: 'test url',
        method: 'test method',
        parameter: {
            doc_id_num : id_num
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
        .then(res => console.log(res));
}

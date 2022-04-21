function getDocData() {
    var id_num = document.getElementById("doc_id_num").value;
    var url = 'doctor_data_inquire.php';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            doc_id_num: String(id_num)
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
    .then(res => console.log(res));
}

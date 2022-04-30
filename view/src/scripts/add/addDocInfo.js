function addDocInfo() {
    doc_id = document.getElementById('doc_id').value;
    id_num = document.getElementById('id_num').value;
    doc_name = document.getElementById('doc_name').value;
    sex = document.getElementById('sex').value;
    birth = document.getElementById('birth').value;
    phone_num = document.getElementById('phone_num').value;
    doc_state = document.getElementById('doc_state').value;

    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'doctor_ctrl',
        method: 'insertDocInfo',
        parameter: {
            doc_id : doc_id,
            id_num : id_num,
            doc_name : doc_name,
            sex : sex,
            birth : birth,
            phone_num : phone_num,
            doc_state : doc_state
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    window.location.reload();
}
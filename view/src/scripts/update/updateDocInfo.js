function updatePatInfo() {
    doc_id = document.getElementById('doc_id').value;
    change_place = document.getElementById('change_place').value;
    change_text = document.getElementById('change_text').value;

    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'doctor_ctrl',
        method: 'updateDocInfo',
        parameter: {
            doc_id: doc_id,
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
    })
    window.location.reload();
}
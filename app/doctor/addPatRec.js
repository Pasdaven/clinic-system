function addPatRec() {
    var id_num = document.getElementById('id_num').value;
    var doc_id = document.getElementById('doc_id').value;
    var date = document.getElementById('date').value;
    var disease_name = document.getElementById('disease_name').value;
    var med_days = document.getElementById('med_days').value;
    var comment = document.getElementById('comment').value;

    var url = '../../controller/core.php';
    let data1 = {
        controller: 'patient',
        method: 'showpatInfo',
        parameter: {
            id_num: id_num
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data1),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
        .then(res => {
            var case_id = res['case_id'];
            console.log(case_id);
            var url = '../../controller/core.php';
            let data2 = {
                controller: 'patient',
                method: 'addPatRec',
                parameter: {
                    case_id: case_id,
                    doc_id: doc_id,
                    consulation_date: date,
                    disease_name: disease_name,
                    med_days: med_days,
                    comment: comment
                }
            }
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data2),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
        })
}
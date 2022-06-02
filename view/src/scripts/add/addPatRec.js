function addPatRec() {
    var id_num = document.getElementById('id_num').value;
    var doc_id = document.getElementById('doc_id').value;
    var date = document.getElementById('date').value;
    var disease_name = document.getElementById('disease_name').value;
    var med_days = document.getElementById('med_days').value;
    var comment = document.getElementById('comment').value;

    let array = []
    let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
    for (let i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value)
    }
    
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'addPatRec',
        parameter: {
            id_num: id_num,
            doc_id: doc_id,
            consultation_date: date,
            disease_name: disease_name,
            med_days: med_days,
            comment: comment,
            med_id : array
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

function addPatMed() {
    let array = []
    let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

    for (let i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value)
    }
    console.log(array);
    var id_num = document.getElementById('id_num').value;

    for (var j = 0; j < array.length; j++) {
        var url = '/clinic-system/controller/core.php';
        let data = {
            controller: 'patient_ctrl',
            method: 'addPatMed',
            parameter: {
                id_num : id_num,
                med_id : array[j]
            }
        }
        fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
    }
}

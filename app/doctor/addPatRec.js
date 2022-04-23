function addPatRec() {
    var id_num = document.getElementById('id_num').value;
    var doc_id = document.getElementById('doc_id').value;
    var date = document.getElementById('date').value;
    var disease_name = document.getElementById('disease_name').value;
    var med_days = document.getElementById('med_days').value;
    var comment = document.getElementById('comment').value;

    var url = '../../controller/core.php';
    let data = {
        controller: 'patient_ctrl',
        method: 'addPatRec',
        parameter: {
            id_num: id_num,
            doc_id: doc_id,
            consulation_date: date,
            disease_name: disease_name,
            med_days: med_days,
            comment: comment
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
// function med_list() {
//     let array = []
//     let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

//     for (let i = 0; i < checkboxes.length; i++) {
//         array.push(checkboxes[i].value)
//     }

//     console.log(array);
// }

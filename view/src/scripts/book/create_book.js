$(document).ready(() => {
    $('#submitBtn').click(() => {
        let patient_name = $('#name').val();
        let id_num = $('#id_num').val();
        let email_address = $('#email').val();
        let doc_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'book',
            method: 'createBook',
            parameter: {
                patient_name: patient_name,
                id_num: id_num,
                email_address: email_address,
                doc_id: doc_id
            }
        };
        let json = JSON.stringify(data);
        $.ajax({
            url: '/clinic-system/controller/core.php',
            method: 'POST',
            data: json,
            success: res => showBookUrl(res)
        });
    });
});

/*
 echo '<h3>即時資訊</h3>';
            echo '病患名稱：' . $row['patient_name'] . '<br>';
            echo '等候狀態：' . $row['book_state'] . '<br>';
            echo '看診時間：' . $row['consulation_time'] . '<br>';
            echo '醫生：' . $doc_name . '<br>';
*/

let showBookUrl = url => {
    let showUrl = document.getElementById('showUrl');
    let data = `<h3>即時資訊</h3>`;
    showUrl.innerHTML = data;
}
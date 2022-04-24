$(document).ready(() => {
    book_url = getUrl();
    let data = {
        controller: 'book_ctrl',
        method: 'getBookInfo',
        parameter: {
            book_url: book_url
        }
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => displayInfo(res)
    });
});

let getUrl = () => {
    let param = new URLSearchParams(window.location.search);
    return param.get('url');
}

/*
 echo '<h3>即時資訊</h3>';
            echo '病患名稱：' . $row['patient_name'] . '<br>';
            echo '等候狀態：' . $row['book_state'] . '<br>';
            echo '看診時間：' . $row['consulation_time'] . '<br>';
            echo '醫生：' . $doc_name . '<br>';
*/

let displayInfo = data => {
    let info = document.getElementById('info');
    let html = 'Name: ' + data.patient_name + '<br>' + 'state: ' + data.book_state + '<br>' + 'Doctor: ' + data.doc_name;
    info.innerHTML = html;
}
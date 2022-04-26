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

let displayInfo = data => {
    let info = document.getElementById('info');
    let html = 'Name: ' + data.patient_name + '<br>' + 'state: ' + data.book_state + '<br>' + 'Queue Number: ' + data.queue_num + '<br>' + 'Doctor: ' + data.doc_name;
    info.innerHTML = html;
}
$(document).ready(() => {
    let data = {
        controller: 'book_ctrl',
        method: 'getAvailableDoc'
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => createDocList(res)
    });
});

let createDocList = data => {
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let radio = '<input type="radio" name="doc_list" value="' + obj.doc_id + '" required>' + obj.doc_name;
        document.getElementById("doc_list").insertAdjacentHTML('afterbegin', radio);
    }
}
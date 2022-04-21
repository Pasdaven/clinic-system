$(document).ready(function() {
    let data = {
        controller: 'Book',
        method: 'getAvailableDoc',
        parameter: 
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '../../controller/core.php',
        method: 'POST',
        data: json,
        success: function(res) {
            console.log(res);
            // createDocList(res);
        }
    });
});

function createDocList(data) {
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let radio = '<input type="radio" value="' + obj.doc_id + '" required>' + obj.doc_name
        document.getElementById("doc_list").insertAdjacentHTML('afterbegin', radio);
    }
}
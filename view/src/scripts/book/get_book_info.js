$(document).ready(() => {
    let data = {
        controller: 'book_ctrl',
        method: 'getBookInfo',
        parameter: {
            book_url: 'aab3238922bcc25a6f606eb525ffdc56'
        }
    };
    let json = JSON.stringify(data);
    $.ajax({
        url: '/clinic-system/controller/core.php',
        method: 'POST',
        data: json,
        success: res => console.log(res)
    });
});
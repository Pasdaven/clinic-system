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
        success: res => console.log(res)
    });
});

let getUrl = () => {
    let param = new URLSearchParams(window.location.search);
    return param.get('url');
}
$(document).ready(function() {
    $('#submitBtn').click(function() {
        let name = $('#name').val();
        let id_num = $('#id_num').val();
        let email = $('#email').val();
        let doc_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'book.php',
            method: 'createBook',
            parameter: {
                name: name,
                id_num: id_num,
                email: email,
                doc_id: doc_id
            }
        };
        let json = JSON.stringify(data);
        $.ajax({
            url: '../../controller/core.php',
            method: 'POST',
            data: json,
            success: function(res) {
                console.log(res);
            }
        });
    });
});
$(document).ready(function() {
    $('#submitBtn').click(function() {
        let name = $('#name').val();
        let id_num = $('#id_num').val();
        let email = $('#email').val();
        let doc_id = $("input[type=radio]:checked").val();
        let data = {
            controller: 'test controller',
            method: 'test method',
            parameter: {
                name: name,
                id_num: id_num,
                email: email,
                doc_id: doc_id
            }
        };
        let json = JSON.stringify(data);
        $.ajax({
            url: './create_book.php',
            method: 'POST',
            data: json,
            success: function(res) {
                console.log(res);
            }
        });
    });
});
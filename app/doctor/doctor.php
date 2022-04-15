<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <h3>病患資料查詢</h3>

    病患病歷號碼：
    <input type="text" value="請輸入病歷號碼" name="case_id" id="case_id"><br>
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="liveToast">
        <div class="toast-body" id="toast-body"></div>
    </div>

    <script>
        $(document).ready(function() {
            var inputField = document.getElementById("case_id");
            var table = "patient_records";
            inputField.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("searchBtn").click();
                }
            });

            $("#searchBtn").click(function() {
                var patient_id = document.getElementById("case_id").value;
                $.ajax({
                    url: "./patient_search.php",
                    method: "GET",
                    data: {
                        c: case_id,
                        t: table
                    },
                    success: function(res) {
                        $('.info').html('抓到資料囉!');
                        $("#toast-body").html(res);
                        var toastLive = document.getElementById("liveToast");
                        var toast = new bootstrap.Toast(toastLive);
                        toast.show();
                    },
                });
            });
        });
    </script>
</body>

</html>
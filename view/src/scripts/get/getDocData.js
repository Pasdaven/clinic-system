function getDocData() {
    var id_num = document.getElementById("doc_id_num").value;
    var url = '/clinic-system/controller/core.php';
    let data = {
        controller: 'doctor_ctrl',
        method: 'showDocInfo',
        parameter: {
            id_num: id_num
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(res => res.json())
        .then(res => {
            const data = res;
            console.log(data);
            if (document.getElementById("searchDocInfo") != null) {
                let text1 = `<div class="clean1" id="clean1"></div>`
                document.querySelector('.box').insertAdjacentHTML('beforeend', text1);
                let text = `
                    <div class="p-5">
                        <h4>Doctor Information</h4>
                        <div class="px-2">
                        Name: ${data['doc_name']}<br>
                        ID : ${data['id_num']}<br>
                        Doctor ID : ${data['doc_id']}<br>
                        Doctor Work State : ${data['doc_state']}<br>
                        Sex : ${data['sex']}<br>
                        Birthday : ${data['birth']}<br>
                        Phone Number : ${data['phone_num']}<br>
                        </div>
                    </div>
                `;
                document.querySelector('.clean1').insertAdjacentHTML('beforeend', text);
            }
        })
}

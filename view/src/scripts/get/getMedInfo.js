function getMed() {
    var med_id = document.getElementById("med_id").value;
    var url = '../../controller/core.php';
    let data = {
        controller: 'medicine_ctrl',
        method: 'showMedInfo',
        parameter: {
            med_id: med_id
        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
        .then(res => {
            const data = res;
            console.log(data);
            if (document.getElementById("searchMedInfo") != null) {
                let text1 = `<div class="clean1" id="clean1"></div>`
                document.querySelector('.box').insertAdjacentHTML('beforeend', text1);
                let text = `
                    <div class="p-5">
                        <h4>Medicine Information</h4>
                        <div class="px-2">
                        Medicine ID : ${data['med_id']}<br>
                        Medicine Name : ${data['med_name']}<br>
                        Medicine Academic Name : ${data['med_academic_name']}<br>
                        Medicine Effect : ${data['med_effect']}<br>
                        </div>
                    </div>
                `;
                document.querySelector('.clean1').insertAdjacentHTML('beforeend', text);
            }
        })
}
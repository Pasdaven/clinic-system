let xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		let data = JSON.parse(this.responseText);
        createDocList(data);
	}
}

function createDocList(data) {
    for (i = 0; i < data.length; i++) {
        let obj = data[i];
        let radio = '<input type="radio" name="register[]" value="' + obj.doc_id + '" required>' + obj.doc_name
        document.getElementById("doc_list").insertAdjacentHTML('afterbegin', radio);
    }
}

xmlhttp.open("GET", "./available_doctor.php", true);
xmlhttp.send();
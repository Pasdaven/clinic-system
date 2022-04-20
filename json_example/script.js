let xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		let data = JSON.parse(this.responseText);
		changeHTML(data);
	}
}

function changeHTML(data) {
	document.getElementById("name").innerHTML=data[0];
	document.getElementById("id").innerHTML=data[1];
	document.getElementById("state").innerHTML=data[2];
}

xmlhttp.open("GET", "./api.php", true);
xmlhttp.send();
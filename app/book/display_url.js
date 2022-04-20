let xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		let data = JSON.parse(this.responseText);
        // displayUrl(data);
        console.log(data);
	}
}

function displayUrl(data) {

}

xmlhttp.open("GET", "./create_book.php", true);
xmlhttp.send();
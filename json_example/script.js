
let xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() { 
	if (this.readyState == 4 && this.status == 200) { 
		let data = JSON.parse(this.responseText); 
        document.getElementById("name").innerHTML=data[1];
	} 
} 
xmlhttp.open("GET", "./api.php", true); 
xmlhttp.send();
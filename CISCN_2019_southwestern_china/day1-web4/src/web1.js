         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
		 }
		 
		 function mywrite() {
			var data = document.getElementById("reasons").value;
			var len = data.length;
			var date = new Date().toLocaleString();
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "/api/write", true);
			xhr.setRequestHeader('content-type', 'application/json');
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					if (xhr.responseText == "OK!") {
						myread();
					}
				}
			}
			xhr.send(JSON.stringify({"reasons":data,"len":len,"date":date}));
		 }

		 function myread() {
			var file = document.getElementById("file").innerText;
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "/api/read", true);
			xhr.setRequestHeader('content-type', 'application/json');
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					if (xhr.responseText != "Error!") {
						var data = JSON.parse(xhr.responseText);
						document.getElementById("len").innerHTML = '<i class="fas fa-calendar-alt"></i>' + data.len;
						document.getElementById("date").innerHTML = '<i class="fas fa-tachometer-alt"></i>' + data.date;
						document.getElementById("reasons_box").innerHTML = '<i class="fas fa-server" style="padding-top: 2%;float: left;"></i><div style="overflow: scroll;width: 70%;float: left;">' + data.reasons + '</div>';
					}
				}
			}
			xhr.send(JSON.stringify({"file":file}));
		 }

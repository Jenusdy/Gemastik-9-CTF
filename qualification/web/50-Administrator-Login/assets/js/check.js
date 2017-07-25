function check() {
	var username = document.getElementById("form-username").value;
	var allowed = true;
	for (var i = 0; i < username.length; i++) {
		if (username[i] < 'a' || username[i] > 'z') {
			alert("Only a-z allowed for username");
			allowed = false;
			break;
		}
	}
	return allowed;
}
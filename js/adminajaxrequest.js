//<--- Live status for Admin Login Start --->
function checkAdminLogin() {
	var adminLogEmail = $("#adminLogemail").val();
	var adminLogPass = $("#adminLogpass").val();

	console.log(adminLogEmail);
	console.log(adminLogPass);

	$.ajax({
		url: "Admin/admin.php",
		method: "POST",
		dataType: "json",
		data: {
			checkLogemail: "checklogmail",
			adminLogEmail: adminLogEmail,
			adminLogPass: adminLogPass,
		},
		success: function(data) {
			console.log(data);
			if (data == 0) {
				$("#statusAdminLogMsg").html(
					"<small class='alert alert-danger'>Invalid email id or password!</small>"
				);
			} else if (data == 1) {
				$("#statusAdminLogMsg").html(
					"<small class='alert alert-success'>Success Loading...</small>"
				);

				setTimeout(() => {
					window.location.href = "Admin/adminDashboard.php";
				}, 1000);
			}
		},
	});
}
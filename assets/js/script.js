function showPassword() {
	let a = document.getElementById("password");

	if (a.type === "password") {
		a.type = "text";
	} else {
		a.type = "password";
	}
}

function showConfirmPassword() {
	let a = document.getElementById("password1");
	let b = document.getElementById("password2");

	if (a.type === "password") {
		a.type = "text";
		b.type = "text";
	} else {
		a.type = "password";
		b.type = "password";
	}
}

function showChangePassword() {
	let a = document.getElementById("current-password");
	let b = document.getElementById("new-password1");
	let c = document.getElementById("new-password2");

	if (a.type === "password") {
		a.type = "text";
		b.type = "text";
		c.type = "text";
	} else {
		a.type = "password";
		b.type = "password";
		c.type = "password";
	}
}

function multiplyBy() {
	num1 = document.getElementById("harga").getAttribute("data-value");
	num2 = document.getElementById("qty").value;
	total = num1 * num2;
	result = total.toLocaleString("id-ID", {
		style: "currency",
		currency: "IDR",
	});
	document.getElementById("total").innerHTML = result;
}

document.getElementById("qty").addEventListener("input", (e) => {
	document.getElementById("amount").innerHTML = e.target.value;
});

if (document.querySelector('input[name="exampleRadios"]')) {
	document.querySelectorAll('input[name="exampleRadios"]').forEach((elem) => {
		elem.addEventListener("change", (e) => {
			document.getElementById("ukuran").innerHTML = e.target.value;
		});
	});
}

$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

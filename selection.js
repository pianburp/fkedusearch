function changePage() {
  var selectElement = document.getElementById("users");
  var selectedValue = selectElement.options[selectElement.selectedIndex].value;

  if (selectedValue === "experts") {
    // Redirect to expert page
    window.location.href = "expert.php";
  } else if (selectedValue === "admin") {
    // Redirect to another page or perform other actions
    window.location.href = "admin.php";
  } else if (selectedValue === "generalusers") {
    window.location.href = "LoginFormK.php";
  }

  return false; // Prevent the form from submitting traditionally

}
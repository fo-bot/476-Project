
// LOGIN HANDLER, could potentially change to be handled by php to be more dynamic
document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      const validUser = "admin";
      const validPass = "1234";

      if (username === validUser && password === validPass) {
        window.location.href = "dashboard.html";
      } else {
        document.getElementById("loginError").textContent =
          "Invalid username or password.";
      }
    });
  }
});

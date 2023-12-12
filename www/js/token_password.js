const userEmail4 = document.getElementById("t-email");
const userToken = document.getElementById("token");
const userPasswordToken = document.getElementById("t-password");
const userCPasswordToken = document.getElementById("tc-password");
const buttonToken = document.getElementById("tc-button-submit");
const tokenForm2 = document.getElementById("recover-password-token");
const formLogin4 = document.getElementById("login-form");

buttonToken.addEventListener("click", function () {
  let email = userEmail4.value;
  let token = userToken.value;
  let password = userPasswordToken.value;
  let cPassword = userCPasswordToken.value;

  if (email.trim() === "" || !isValidEmail(email)) {
    alert("Por favor, insira um email válido.");
    return;
  }

  if (password.trim() === "" || password !== cPassword) {
    alert("As senhas não coincidem ou estão vazias. Por favor, corrija.");
    return;
  }

  fetch("/api/token_password.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_email: email,
      recovery_token: token,
      user_password: password,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ocorreu algum problema");
      }
      return response.json();
    })
    .then((data) => {
      if (data.token) {
        alert("Senha alterada com sucesso!");

        tokenForm2.style.opacity = "0";
        formLogin4.style.display = "block";

        setTimeout(() => {
          formLogin4.style.opacity = "1";
          tokenForm2.style.display = "none";
        });
      } else if (!data.token) {
        alert("Token incorreto.");
      }
    })
    .catch((error) => {
      console.error("Erro na solicitação: " + error.message);
    });
});

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

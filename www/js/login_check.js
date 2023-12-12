const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const buttonSubmit = document.getElementById("button-submit");

buttonSubmit.addEventListener("click", function () {
  const userEmail = emailInput.value.trim();
  const userPassword = passwordInput.value.trim();

  if (userEmail === "" || userPassword === "") {
    alert("Por favor, preencha todos os campos.");
    return;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(userEmail)) {
    alert("Por favor, insira um endereço de email válido.");
    return;
  }

  fetch("/api/login_check.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      email: userEmail,
      password: userPassword,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ocorreu algum problema");
      }
      return response.json();
    })
    .then((data) => {
      if (data.login) {
        alert("Credenciais validadas com sucesso!");

        setTimeout(() => {
          window.location.assign("/");
        }, 1000);
      } else {
        alert("Informações de login incorretas.");
      }
    })
    .catch((error) => {
      console.error("Erro na solicitação: " + error.message);
    });
});

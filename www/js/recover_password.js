const userEmail3 = document.getElementById("rc-email");
const buttonRecover = document.getElementById("rr-button-submit");

buttonRecover.addEventListener("click", function () {
  let email = userEmail3.value;

  if (email.trim() === "" || !isValidEmail(email)) {
    alert("Por favor, insira um email válido.");
    return;
  }

  fetch("/api/recover_password.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_email: email,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ocorreu algum problema");
      }
      return response.json();
    })
    .then((data) => {
      if (data.recover) {
        alert("Token enviado com sucesso!");
      } else if (data.email_duplicate) {
        alert("Email não cadastrado.");
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

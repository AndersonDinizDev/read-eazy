const userName = document.getElementById("r-name");
const userEmail = document.getElementById("r-email");
const userPassword = document.getElementById("r-password");
const userCPassword = document.getElementById("r-c-password");
const buttonRegister = document.getElementById("button-register");
const formLogin2 = document.getElementById("login-form");
const formRegister2 = document.getElementById("register-form");

buttonRegister.addEventListener("click", function () {
  let name = userName.value;
  let email = userEmail.value;
  let password = userPassword.value;
  let cPassword = userCPassword.value;

  fetch("/api/register_user.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_name: name,
      user_email: email,
      user_password: password,
      user_c_password: cPassword,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ocorreu algum problema");
      }
      return response.json();
    })
    .then((data) => {
      if (data.register) {
        alert("Usuário cadastrado com sucesso!");

        setTimeout(() => {
          formRegister2.style.opacity = "0";
          formLogin2.style.display = "block";

          setTimeout(() => {
            formRegister2.style.display = "none";
            formLogin2.style.opacity = "1";
          });
        });
      } else {
        alert("Insira suas informações corretamente.");
      }
    })
    .catch((error) => {
      alert("Oocrreu um erro ao cadastrar");
    });
});

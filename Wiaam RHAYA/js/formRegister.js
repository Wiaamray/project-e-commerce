// 1-SELECTEURS
let texteH2 = document.querySelector("h2"),
  inputNom = document.getElementById("nickname"),
  inputEmail = document.getElementById("inputEmail"),
  inputPassword = document.getElementById("inputPassword"),
  inputPasswordVerif = document.getElementById("inputConfirmPassword"),
  errorNom = document.getElementById("errorNom"),
  errorEmail = document.getElementById("errorEmail"),
  errorPassword = document.getElementById("errorPassword"),
  errorPasswordVerif = document.getElementById("errorPassword-verif"),
  togglePassword = document.querySelector("#togglePassword"),
  togglePasswordVerif = document.querySelector("#togglePassword-verif");

// Event sur l'input NOM
inputNom.addEventListener("change", function (e) {
  let nom = e.target.value;

  if (nom != "") {
    inputNom.style.border = "2px solid #65da97";
    errorNom.innerHTML = "";
    texteH2.innerHTML = `Bienvenue ${nom} !`;
    document.querySelector("#nickname + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#nickname + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputNom.style.border = "2px solid #e74c3c";
    errorNom.innerHTML = "Veuillez renseigner votre nom";
    errorNom.style.color = "#e74c3c";
    document.querySelector(
      "#nickname + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input EMAIL
inputEmail.addEventListener("change", function (e) {
  let email = e.target.value;

  if (email.includes("@")) {
    inputEmail.style.border = "2px solid #65da97";
    errorEmail.innerHTML = "";
    document.querySelector("#inputEmail + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputEmail + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputEmail.style.border = "2px solid #e74c3c";
    errorEmail.innerHTML = "L'adresse email est incorrecte";
    errorEmail.style.color = "#e74c3c";
    document.querySelector("#inputEmail + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputEmail + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD
inputPassword.addEventListener("change", function (e) {
  let password = e.target.value;

  if (password.length >= 5) {
    inputPassword.style.border = "2px solid #65da97";
    errorPassword.innerHTML = "";
    document.querySelector("#inputPassword + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputPassword.style.border = "2px solid #e74c3c";
    errorPassword.innerHTML =
      "Le mot de passe doit faire au moins 5 caract??res";
    errorPassword.style.color = "#e74c3c";
    document.querySelector("#inputPassword + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD VERIF
inputPasswordVerif.addEventListener("change", function (e) {
  let passwordVerif = e.target.value;

  if (passwordVerif == inputPassword.value) {
    inputPasswordVerif.style.border = "2px solid #65da97";
    errorPasswordVerif.innerHTML = "";
    document.querySelector(
      "#inputConfirmPassword + .fa-check-circle"
    ).style.visibility = "visible";
    document.querySelector(
      "#inputConfirmPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputPasswordVerif.style.border = "2px solid #e74c3c";
    errorPasswordVerif.innerHTML =
      "Veuillez indiquer ?? nouveau le mot de passe";
    errorPasswordVerif.style.color = "#e74c3c";
    document.querySelector(
      "#inputConfirmPassword + .fa-check-circle"
    ).style.visibility = "hidden";
    document.querySelector(
      "#inputConfirmPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD avec permutation de visibilit?? des caract??res
togglePassword.addEventListener("click", function () {
  console.log("toto");
  // toggle the type attribute
  let type =
    inputPassword.getAttribute("type") === "password" ? "text" : "password";
  inputPassword.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye-slash");
});

// Event sur l'input PASSWORDVERIF avec permutation de visibilit?? des caract??res
togglePasswordVerif.addEventListener("click", function () {
  // toggle the type attribute
  let type =
    inputPasswordVerif.getAttribute("type") === "password"
      ? "text"
      : "password";
  inputPasswordVerif.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye-slash");
});

// prevent form submit
let form = document.querySelector("form");
form.addEventListener("submit", function (e) {
  e.preventDefault();
});

// upload la photo
let imageInput = document.querySelector("#image-input");

imageInput.addEventListener("change", function () {
  let reader = new FileReader();
  reader.addEventListener("load", () => {
    let uploadedImage = reader.result;
    document.querySelector(
      "#display-image"
    ).style.backgroundImage = `url(${uploadedImage})`;
    document.querySelector("#display-image").style.backgroundColor = "white";
    document.querySelector(".photo").style.alignItems = "flex-end";
    // imageInput.style.visibility = "hidden";
  });
  reader.readAsDataURL(this.files[0]);
});
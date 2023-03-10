// config
const BASE_URL = "http://localhost/php-mvc/public";
// event searching element
const btnSearch = document.getElementById("btnSearch");
const formSearch = document.getElementById("formSearch");
const navigation = document.querySelector(".navigation");
const btnCategory = document.querySelector("span[data-triger-category]");

function collapseNavigation() {
  navigation.classList.remove("collapse");
  document
    .querySelector("span[data-triger-category] ion-icon")
    .classList.remove("flip");
}

function toggleNavigation() {
  navigation.classList.toggle("collapse");
  document
    .querySelector("span[data-triger-category] ion-icon")
    .classList.toggle("flip");
}

function showFormSearch() {
  btnSearch.classList.remove("show");
  formSearch.classList.add("show");
}

function hideFormSearch() {
  formSearch.classList.remove("show");
  btnSearch.classList.add("show");
}

btnSearch.addEventListener("click", function () {
  collapseNavigation();
  showFormSearch();
  formSearch.children[0].children[1].focus();
});

document.getElementById("CloseSearch").addEventListener("click", function () {
  hideFormSearch();
  formSearch.children[0].children[1].value = "";
});

// event ModalLogin and ModalRegister Element
// button for triger show modal login
const btnLogin = document.querySelector("a[data-triger-login]");
// modal login element
const modalLogin = document.getElementById("ModalLogin");

// button for triger show modal register
const btnRegister = document.querySelector("a[data-triger-register]");
// modal register element
const modalRegister = document.querySelector("#ModalRegister");

// function remove modal
function hideModal(modal) {
  if (modal) {
    modal.classList.remove("show");
  }
}

// function for clear form
function clearFormModal() {
  document
    .querySelectorAll(".modal .form-container form input")
    .forEach((itemInput) => (itemInput.value = ""));
}

function showModalLogin() {
  // set transition delay 400 if modal register show
  if (modalRegister.classList.contains("show")) {
    modalLogin.style.transitionDelay = "400ms";
  }

  // set transition delay 600ms if navigation span
  if (navigation.classList.contains("collapse")) {
    modalLogin.style.transitionDelay = "650ms";
  }

  // collapse the navigation
  collapseNavigation();

  // set timeout for show login
  const timeoutLogin = setTimeout(() => {
    modalLogin.classList.add("show");
    document.getElementById("InputLogin").focus();
    document.querySelector("#ModalLogin form").children[0].focus();
    modalLogin.style.transitionDelay = "0ms";
    clearTimeout(timeoutLogin);
  }, 0);
}

// event to show modal login
btnLogin?.addEventListener("click", showModalLogin);

// event to show modal register
btnRegister?.addEventListener("click", function () {
  const timeoutRegist = setTimeout(() => {
    hideModal(modalLogin);
    modalRegister.classList.add("show");
    document.getElementById("InputRegister").focus();
    clearTimeout(timeoutRegist);
  }, 0);
});

document.querySelectorAll(".btn-close-modal")?.forEach((closeBtn) => {
  closeBtn.addEventListener("click", () => {
    if (modalLogin.classList.contains("show")) {
      hideModal(modalLogin);
    }

    if (modalRegister.classList.contains("show")) {
      hideModal(modalRegister);
    }
    // clear form input
    clearFormModal();
  });
});

// event close popup or modal when click on outside element popup or modal
window.addEventListener("click", function (e) {
  if (e.target.closest("a[data-triger-login]")) {
    popup?.classList.remove("show");
  }

  if (modalLogin?.classList.contains("show")) {
    if (!e.target.closest("#ModalLogin")) {
      hideModal(modalLogin);
      clearFormModal();
    }
  }

  if (modalRegister?.classList.contains("show")) {
    if (!e.target.closest("#ModalRegister")) {
      hideModal(modalRegister);
      clearFormModal();
    }
  }
});

// event popup greeting element
const popup = document.querySelector(".pop-up");

function showPopUp(nameOfUser = "") {
  if (popup) {
    document
      .querySelector("button.close")
      .addEventListener("click", function () {
        popup.classList.remove("show");
      });

    if (nameOfUser) {
      popup.children[0].children[1].textContent = nameOfUser;
    }

    const timeout = setTimeout(() => {
      popup.classList.add("show");
      clearTimeout(timeout);
    }, 1000);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  modalLogin?.classList.remove("none");
  modalRegister?.classList.remove("none");
  showPopUp();
});

// event show category
btnCategory.addEventListener("click", function () {
  hideFormSearch();
  toggleNavigation();
});

// event show and hide password on modal register
const formPass = document.querySelector(
  "#ModalRegister input[type='password']"
);
const btnShowAndHide = document.querySelector("span.show-hide-pw");

btnShowAndHide?.addEventListener("click", function () {
  const type = formPass.type;

  if (type == "password") {
    btnShowAndHide.children[0].name = "eye-outline";
    formPass.type = "text";
  } else {
    btnShowAndHide.children[0].name = "eye-off-outline";
    formPass.type = "password";
  }
});

// request
const formLogin = document.getElementById("formLogin");
formLogin.addEventListener("submit", login);
const NavAccount = document.getElementById("NavAccount");

/**
 * function komponent ButtonProfile
 * 
 * @param {string} urlImg nama gambar profile pengguna
 * @param {string} name nama pengguna
 * @returns {HTMLButtonElement} 
 */
function ButtonProfile(urlImg, name) {
  const button = document.createElement("button");
  const img = document.createElement("img");

  // menambahkan atribut
  button.classList.add("btn-profile");
  button.addEventListener("click", showModalAccount);

  // menambah atribut di element img
  const src = `${BASE_URL}/assets/images/${urlImg}`;
  img.src = src;
  img.alt = "Profile Picture";

  // mengganti source gambar di modal profile
  document.getElementById("ImgMenuAccount").src = src;

  // mengganti nama profil di account modal
  document.getElementById("ProfileName").textContent = name;

  // merender atau memasukan element img kedalam element button
  button.appendChild(img);

  return button;
}

// handler login
async function login(e) {
  e.preventDefault();
  const { alert, timeoutEnd } = createAlert({
    text: "Please wait a moment.",
    type: "info",
    delay: { show: 0, end: 5000 },
  });

  // membuat form data
  const formData = new FormData(formLogin);
  hideModal(modalLogin);
  clearFormModal();

  // membuat delay selama setengah detik
  await new Promise((resolve) => setTimeout(resolve, 500));

  // membuat ajax request
  const ajax = new XMLHttpRequest();
  ajax.open("POST", `${BASE_URL}/auth/signin`, true);
  ajax.send(formData);

  ajax.onload = function () {
    if (this.status == 200) {
      const res = JSON.parse(this.response);
      // check result
      if (res.success) {
        btnLogin.removeEventListener("click", showModalLogin);

        // mengganti isi navbar account
        NavAccount.replaceChild(ButtonProfile(res.image, res.name), NavAccount.children[0])
        showPopUp(res.name);
      }
      destroyAlert(alert, timeoutEnd);
      createAlert({
        text: res.flasher.pesan,
        type: res.flasher.type,
        delay: { show: 200, end: 7000 },
      });
    }
  };
}

// add shadow when user scrolled
let isFirstScroll = false;
window.addEventListener("scroll", (event) => {
  if (window.scrollY > 50 && !isFirstScroll) {
    isFirstScroll = true;
    navigation.classList.add("shadow");
  }

  if (window.scrollY < 50 && isFirstScroll) {
    isFirstScroll = false;
    navigation.classList.remove("shadow");
  }
});

function showModalAccount() {
  const modalAccount = document.getElementById("ModalAccount");
  modalAccount.classList.toggle("show");
  modalAccount.style.right = `${
    window.innerWidth - this.offsetLeft - 30
  }px`;

  Faded(modalAccount);
}

// show and hide modal
const btnProfile = document.querySelector(".btn-profile");
btnProfile?.addEventListener("click", showModalAccount);

/**
 * function untuk mengaktifkan fade ketika modal aktif
 * 
 * @param {HTMLElement} element 
 * @returns {void}
 */
function Faded(element) {
  const fade = document.getElementById("Fade");
  fade.classList.add("show");
  
  function clear() {
    this.classList.remove("show");
    element.classList.remove("show");

    // remove event
    fade.removeEventListener("click", clear);
  }
  fade.addEventListener("click", clear)
}

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".auth_form");
  const loginInput = document.getElementById("login");
  const surnameInput = document.getElementById("surname");
  const nameInput = document.getElementById("name");
  const lastNameInput = document.getElementById("last_name");
  const phoneInput = document.getElementById("phone");

  loginInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const latinRegex = /^[a-zA-Z]*$/;
    if (!latinRegex.test(inputValue)) {
      event.target.value = inputValue.slice(0, -1);
    }
  });

  surnameInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const cyrillicRegex = /^[а-яА-Я]*$/;
    if (!cyrillicRegex.test(inputValue)) {
      event.target.value = inputValue.slice(0, -1);
    }
  });

  nameInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const cyrillicRegex = /^[а-яА-Я]*$/;
    if (!cyrillicRegex.test(inputValue)) {
      event.target.value = inputValue.slice(0, -1);
    }
  });

  lastNameInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const cyrillicRegex = /^[а-яА-Я]*$/;
    if (!cyrillicRegex.test(inputValue)) {
      event.target.value = inputValue.slice(0, -1);
    }
  });

  phoneInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const phoneRegex = /^[+\d]*$/;
    if (!phoneRegex.test(inputValue)) {
      event.target.value = inputValue.slice(0, -1);
    }
  });

  form.addEventListener("submit", function (event) {
    const allInputs = form.querySelectorAll("input");
    let isFormValid = true;

    allInputs.forEach((input) => {
      if (!input.value.trim()) {
        isFormValid = false;
        input.classList.add("error");
      } else {
        input.classList.remove("error");
      }
    });

    if (!isFormValid) {
      event.preventDefault();
      alert("Пожалуйста, заполните все обязательные поля.");
    }
  });
});

// Скрипт обработки завершения сессии - модальное окно

function confirmLogout() {
  document.getElementById("logoutModal").style.display = "block";
}

function closeModal() {
  document.getElementById("logoutModal").style.display = "none";
}

function logout() {
  window.location.href = "logout.php";
}

//Указание иной услуги
document.addEventListener("DOMContentLoaded", function () {
  const checkbox = document.getElementById("checkbox");
  const serviceSelect = document.getElementById("service_type");
  const customServiceContainer = document.getElementById(
    "customServiceContainer"
  );

  checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
      customServiceContainer.style.display = "block";
      serviceSelect.style.display = "none";
    } else {
      customServiceContainer.style.display = "none";
      serviceSelect.style.display = "block";
    }
  });
});

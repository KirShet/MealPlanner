var element = document.querySelector("header");
var pod_element = document.querySelector("nav");
var initialScroll = window.pageYOffset;
element.className = "position-fixed";
    element.classList.toggle("active");

    pod_element.classList.remove("active2");
window.addEventListener("scroll", function() {
  var currentScroll = window.pageYOffset;

  if (initialScroll - currentScroll > 0) {
    element.classList.add("position-fixed");
    element.classList.add("active");

    pod_element.classList.remove("active2");
// 
// var height = document.getElementsByClassName("cheme")[0].offsetHeight;
// console.log(height);

// // Создаем объект XMLHttpRequest для отправки запроса на сервер
// var xhr = new XMLHttpRequest();

// // Открываем соединение с методом GET и указываем адрес скрипта php
// xhr.open("GET", "../index.php?height=" + height, true);

// // Отправляем запрос
// xhr.send();

// // Обрабатываем ответ от сервера
// xhr.onreadystatechange = function() {
//   // Проверяем, что запрос завершен и статус ответа 200 (OK)
//   if (xhr.readyState == 4 && xhr.status == 200) {
//     // Получаем ответ в виде текста
//     var response = xhr.responseText;
//     // Выводим ответ в консоль
//     console.log(response);
//     // // Находим элемент с id "result" на странице
//     // var result = document.getElementById("result");
//     // // Вставляем ответ внутрь элемента
//     // result.innerHTML = response;
//   }
// };
// 
  } else {
    // element.className = "position-absolute";

    // pod_element.classList.toggle("active2");
    element.classList.remove("position-fixed"); 
    element.classList.remove("active"); 
    pod_element.classList.add("active2"); 
  }

  initialScroll = currentScroll;
});
// var height = document.getElementsByClassName("cheme")[0].offsetHeight
// console.log(height);
// var xhr = new XMLHttpRequest();
// xhr.open("GET", `../index.php?height=${height}`, true);
// xhr.send();

/*document.addEventListener('click', function () {
document.getElementsByTagName("code")[0].innerHTML = "Hello World!"; 
});

const userText = prompt('Введите текст');
const userTextField = document.querySelector('code');
userTextField.textContent = userText;
console.log('Текст в h2 изменён на', userText);*/
/*
let paragraph = document.getElementsByTagName("code")[0];
document.addEventListener('click', function () {
    paragraph.textContent = 'Hello World';

    });*/
    const consoleLog = document.querySelector('#consoleLog');

consoleLog.addEventListener('click', function () {
alert('Метод для вывода сообщения в веб-консоль.');
});
    const rrr = document.querySelector('#rrr');
    rrr.onclick = function() {
rrr.textContent = 'Пример использования команды console.log';
    }
   const st = document.querySelector('#alert');
   function makest() {
alert("Пример использования Alert");

   }
   st.addEventListener('click', makest);

   const promrt = document.querySelector('#prompt');
   function maker() {
    prompt('Пример использования prompt');

   }
   promrt.addEventListener('click', maker);
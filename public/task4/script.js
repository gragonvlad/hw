/*
const lili = document.querySelector('#ll');
    function makest() {
 alert("Вы кликнули по ссылке и ничего не произошло");
 preventDefault();
    }
    lili.addEventListener('click', makest);*/
   
    const lilol = document.querySelector('#ll');
    lilol.addEventListener('click', 
  (event) => {
    const userText = prompt('Измените текст ссылки');
    event.preventDefault();
    lilol.textContent = userText;
    alert('Вы кликнули по ссылке и ничего не произошло');
})
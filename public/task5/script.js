/*
const lili = document.querySelector('#ll');
    function makest() {
 alert("Вы кликнули по ссылке и ничего не произошло");
 preventDefault();
    }
    lili.addEventListener('click', makest);*/
   
    const lilol = document.querySelector('#entertext');
    const lilol1 = document.querySelector('#buttonchange');
    const lilo2 = document.querySelector('#duplicateField');
    const myinput = document.getElementById('entertext');
    const myform = document.getElementById('duplicateField');

    lilol.addEventListener('input', 
  (event) => {
    const userText = event.target.value;
    
 
    lilo2.textContent = userText;

})
lilol1.addEventListener('click', 
  (event) => {
    const userText = [];

    console.log(lilo2.textContent);
    lilol.value = myinput.defaultValue;
    lilo2.textContent = myform.defaultValue;

    

})
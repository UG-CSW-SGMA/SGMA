var registros = document.querySelectorAll('tr');

for (let index = 0; index < registros.length; index++) {
    const element = registros[index];
    element.addEventListener('mouseover', function(){
        element.style.background = "blue"
    })
}
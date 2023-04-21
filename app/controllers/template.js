
document.addEventListener('DOMContentLoaded', function (e) {


    let current_url = document.location;
    /*     console.log(current_url);
     */
    var path = window.location.pathname;
    var page = path.split("/").pop();
/*     console.log(page);
 */    document.querySelectorAll(".buttonMenu").forEach(function (e) {
        if (e.href == current_url) {
            e.classList += " currentMenu";
        }
        
    });



    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (event.matches) {
            modoOscuro();

        }
    });

    window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', event => {
        if (event.matches) {
            modoClaro();
        }

    });

    load();


});



function load() {


    let mode = localStorage.getItem("mode");
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches || mode == 'claro' || mode == '' || mode == null) {
        modoClaro();
    }


    else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches || mode == 'oscuro') {
        modoOscuro();

    }

    let estado = localStorage.getItem('estado');
    if (estado == 'active' || estado == null) {
        document.documentElement.style.setProperty('--animation', 'none');

    }

    console.log(mode);


}




function modoOscuro() {
    document.documentElement.style.setProperty('--body-color', '#0F0F0F')
    localStorage.setItem('mode', 'oscuro');
    localStorage.setItem('estado', 'active');
    document.documentElement.style.setProperty('--animation', '.6s');
    document.documentElement.style.setProperty('--colorLetra', '#FFFFFF');
    document.documentElement.style.setProperty('--colorContainer', ' #1A1A1B');

    document.getElementById("modoClaro").style.setProperty("display", "flex");
    document.getElementById("modoOscuro").style.setProperty("display", "none");

    document.documentElement.style.setProperty('--imgClose', 'url("../../resources/img/system/exitLight.png")');



}


function modoClaro() {
    document.documentElement.style.setProperty('--body-color', '#FFFFFF')
    localStorage.setItem('mode', 'claro');
    localStorage.setItem('estado', 'active');
    document.documentElement.style.setProperty('--animation', '.6s');
    document.documentElement.style.setProperty('--colorLetra', '#000000');
    document.documentElement.style.setProperty('--colorContainer', '#DAE0E6');

    document.getElementById("modoClaro").style.setProperty("display", "none");
    document.getElementById("modoOscuro").style.setProperty("display", "flex");

    document.documentElement.style.setProperty('--imgClose', 'url("../../resources/img/system/exitDark.png")');




}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })



  const body = document.querySelector('body'),
  sidebar = body.querySelector('nav'),
  toggle = body.querySelector(".toggle"),
  searchBtn = body.querySelector(".search-box"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
sidebar.classList.toggle("close");
})



/* //Se guarda una variable que contendra el tiempo
var time = 300000;

//Timeout
let timer;
const runTimer = () => {
    timer = window.setTimeout(
      () => {
        fetch(API + 'logOut', {
            method: 'get'
        }).then(function (request) {
            // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
            if (request.ok) {
                request.json().then(function (response) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                    if (response.status) {
                        location.href='../../index.php'; 
                    } else {
                        sweetAlert(2, response.exception, null);
                    }
                });
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(function (error) {
            console.log(error);
        });
      }, time);
  }

runTimer();

//Al mover el mouse se reinicia el timeout
document.body.onmousemove = function(){
    clearTimeout(timer);
    runTimer();
}

//Al hacer click se reinicia el timeout
document.body.onclick = function(){
    clearTimeout(timer);
    runTimer();
}

//Al presionar una tecla se reinicia el timeout
document.body.onkeydown = function(){
    clearTimeout(timer);
    runTimer();
}

//Al hacer scroll se reinicia el timeout
document.body.onscroll = function(){
    clearTimeout(timer);
    runTimer();
}

 */

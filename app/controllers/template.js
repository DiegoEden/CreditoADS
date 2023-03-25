
document.addEventListener('DOMContentLoaded', function (e) {


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


}


function modoClaro() {
    document.documentElement.style.setProperty('--body-color', '#FFFFFF')
    localStorage.setItem('mode', 'claro');
    localStorage.setItem('estado', 'active');
    document.documentElement.style.setProperty('--animation', '.6s');
    document.documentElement.style.setProperty('--colorLetra', '#000000');
    document.documentElement.style.setProperty('--colorContainer', '#DAE0E6');



}
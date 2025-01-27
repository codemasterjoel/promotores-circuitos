document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('menu-toggle');
    const sidenav = document.querySelector('.sidenav');

    toggleButton.addEventListener('click', function() {
        sidenav.classList.toggle('show');

        //Opcional: Cambiar texto del botón
        if (sidenav.classList.contains('show')) {
            toggleButton.textContent = 'Ocultar Menú';
        } else {
            toggleButton.textContent = 'Mostrar Menú';
        }
    });
});
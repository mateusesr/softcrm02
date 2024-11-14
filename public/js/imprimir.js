function imprimirPagina() {
    var element= document.querySelector('#client-container');
    var header= document.querySelector('#navbar')
    header.style.display='none';
    element.classList.add('imprimir');
    window.print();
    header.style.display='block';
    element.classList.remove('imprimir');
}
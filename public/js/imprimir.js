function imprimirPagina() {
    var elementAttendance = document.querySelector('#attendance-container');
    var elementComment = document.querySelector('#comment-container');
    var elementClient= document.querySelector('#client-container');
    var header= document.querySelector('#navbar');
    header.style.display='none';
    if (elementClient) {
        elementClient.classList.add('imprimir');
    }
    if (elementAttendance) {
        elementAttendance.classList.add('imprimir');
    }  
    if (elementComment) {
        elementComment.classList.add('imprimir');
    } 
    window.print();
    header.style.display='block';
    if (elementClient) {
        elementClient.classList.remove('imprimir');
    }
    if (elementAttendance) {
        elementAttendance.classList.remove('imprimir');
    }
    if (elementComment) {
        elementComment.classList.remove('imprimir');
    } 
}
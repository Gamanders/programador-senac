function exibe(){
    let tela = document.querySelector("body");
    tela.setInterval(() => {
        alert(date());
    }, 100);
}
window.onload(exibe());
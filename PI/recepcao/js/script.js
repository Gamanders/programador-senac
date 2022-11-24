    window.addEventListener('onload',chamaTela());

    document.addEventListener('mousemove', function() {
        if (timeout !== null) {
            document.querySelector("#protecaoTela").style.visibility = "hidden";
            clearTimeout(timeout);
        }
        chamaTela();
    }); 

    function chamaTela(){
     timeout = setTimeout(function() {
        document.querySelector("#protecaoTela").style.visibility = "visible";
     }, 8000);
 }
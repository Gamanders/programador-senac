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
        window.scroll(0,0);
        document.querySelector("#protecaoTela").style.visibility = "visible";
     },60000);
 }
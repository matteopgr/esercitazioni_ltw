function validaForm(){
    if(document.myForm.remember.checked)
        window.alert("Hai scelto di ricoradre le tue credenziali");
    else{
        window.alert("Hai scelto di non ricordare le credenziali");
    }
}
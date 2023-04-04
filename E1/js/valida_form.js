function valida_form(){
    if(document.myform.cognome == "")
        alert("il cognome deve essere inserito");
    if(document.myform.nome == "")
        alert("il nome deve essere inserito");
    if(!typeof(document.myform.matricola) == "number")
        alert("la matricola deve essere un numero");
    if(!document.myform.regione.selected)
        alert("selezionare la regione")
}
function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    var select = document.getElementById("selccionar");
    var fechaIni = document.getElementById("fini").value;

    var myInput = document.getElementById("myInput");


    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[select.value];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";

            }
        }
    }
    if (input.value.length > 0) {
        document.getElementById("style-3").style.overflowY = "inherit";
    } else {
        document.getElementById("style-3").style.overflowY = "inherit";

    }
}

function mostrar() {
    
    var fechaIni = document.getElementById("fini").value;
    var fechaFin = document.getElementById("ffin").value;
    /*alert(fechaIni[fechaIni.length-2]);*/

    var table, tr, td, filter;
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    var element = document.getElementById("style-3");

    function convertDigitIn(str) {
        return str.split('-').reverse().join('-');
    }
    var cambio = convertDigitIn(fechaIni).replace(/-/gi, "/");        
    var cambio1 = convertDigitIn(fechaFin).replace(/-/gi, "/");        

    /*if (fechaIni.length > 0) {
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                
                if (td.innerHTML.toUpperCase().indexOf(cambio) > -1) {
                    tr[i].style.display = "";                    
                    element.classList.add("removeEliminate");
                    //alert(td.innerHTML.toUpperCase().indexOf(cambio));
                } else {                                        
                    tr[i].style.display = "none";
                }
            }
        }
    } else {
        alert("ingrese la fecha para generar filtro");
    }*/
    if (fechaIni.length > 0) {
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {                
                if (tr[i].innerHTML == fechaIni) {
                    tr[i].style.display = "";                    
                    element.classList.add("removeEliminate");
                    alert("ssii");                                        
                    //alert(td.innerHTML.toUpperCase().indexOf(cambio));
                } else {                                        
                    tr[i].style.display = "none";
                }
            }
            alert(tr[i].innerHTML);
        }
    } else {
        alert("ingrese la fecha para generar filtro");
    }
    

}

function quitar() {

    var element = document.getElementById("style-3");

    if (document.getElementById("style-3").classList == "over removeEliminate") {
        document.getElementById("style-3").classList.remove("removeEliminate");
    }

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    var fecha = document.getElementById("fini").value;

    if (fecha.length > 0) {
        document.getElementById("fini").value = "";
        for (i = 0; i < tr.length; i++) {
            /*tr[i].className = "mostrar";*/
            tr[i].style.display = "";
        }
    } else {

    }
}



function exportar(){

    window.open("./PDF/index.php");

}
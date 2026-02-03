$(document).ready(function() {
    let colorActual= "white";
    let colorSecundario= "black";
    function cambiarColores(){
        if($("body").css("background-color") === "rgb(255, 255, 255)"){
            $("body").css("background-color", colorSecundario);
            $("body").css("color", colorActual);
        }else{
            $("body").css("background-color", colorActual);
            $("body").css("color", colorSecundario);
        }
    }
    $("#boton").click(cambiarColores);
});
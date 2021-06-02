require('./bootstrap');
require('./jquery.mask');


//Masks dos campos
$('.money').mask('000.000.000.000.000,00', {reverse: true});

//Unmask campos no form submit
// $("#form").submit(function() {
//     $(".money").unmask();
// });


//Calcular valor total do Pedido
$("#produto").change(function(){
    //Checa se tem valor
    !$("#quantidade").val() ? $("#quantidade").val(1) : !$("#quantidade").val();
    //Calcula
    var valor_total = calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});

$("#quantidade").keyup(function(){
    //Checa se tem valor, só calcula se tiver produto selecionado
    var valor_total = !$("#produto").val() ? null : calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});

function calcularValorTotalPedido(){
    var valor_unitario = $("#produto").find(':selected').attr("data-value");
    var quantidade = $("#quantidade").val();
    $("#valor_unitario").val(valor_unitario);
    var valor_total = parseInt(quantidade * valor_unitario);
    console.log(valor_total);
    return valor_total;
}


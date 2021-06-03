require('./bootstrap');
require('./jquery.mask');

//Masks dos campos
$('.money').mask('000.000.000.000.000,00', {reverse: true});
$(".date").mask("99/99/9999", {clearIfNotMatch: true, reverse: true});
$('.cpf').mask('000.000.000-00', {clearIfNotMatch: true, reverse: true});

//Calcular valor total do Pedido
$("#produto").change(function(){
    //Checa se tem valor
    !$("#quantidade").val() ? $("#quantidade").val(1) : !$("#quantidade").val();
    //Calcula
    var valor_total = calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});
//Quantidade
$("#quantidade").keyup(function(){
    //Checa se tem valor, só calcula se tiver produto selecionado
    var valor_total = !$("#produto").val() ? null : calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});

function calcularValorTotalPedido(){
    var valor_unitario = $("#produto").find(':selected').attr("data-value");
    var quantidade = $("#quantidade").val();
    $("#valor_unitario").val(formataParaReal(limpaFormatacao(valor_unitario)));
    var valor_total = (limpaFormatacao(quantidade) * limpaFormatacao(valor_unitario));
    return formataParaReal(valor_total);
}

function formataParaReal(valor){
    var v = valor+'';
    v = v.replace(/([0-9]{2})$/g, ",$1");
    if( v.length > 6 )
            v = v.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    return v;
}

function limpaFormatacao(value){
    return parseInt(value.replace(/[\D]+/g,''));
}


$( "#salvar" ).click(function() {
  $( "#registre-form" ).attr("action","index.php");
  $( "#registre-form" ).submit();
});

$( "#sair" ).click(function() {
  $( "#registre-form" ).attr("action","index.php");
  $( "#registre-form" ).submit();
});


$( "#register" ).click(function() {
  $( "#login-form" ).attr("action","registre.php");
  $( "#login-form" ).submit();
});

/*
$( "#entrar" ).click(function() {
  $( "#login-form" ).attr("action","pacientes.php");
  $( "#login-form" ).submit();
});*/
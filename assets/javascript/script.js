$(document).ready(function(){

  $(".home").hide();
  $(".who-we-are").hide();
  $(".pizze").show(100);


  $("#1").click(function() {
    $(".pizze").hide(100);
    $(".who-we-are").hide(100);;
    $(".home").show(100);
  });

  $(".2").click(function() {
    $(".home").hide(100);
    $(".who-we-are").hide(100);
    $(".pizze").show(100);
  });

  $("#3").click(function() {
    $(".pizze").hide(100);
    $(".home").hide(100);
    $(".who-we-are").show(100);
  });

  function Errore(string, e) {
      window.alert(string);
      e.preventDefault(e);
  }

  //Check empty field
  $("form").submit(function(e){
    var i = 0;
    var valori = [];
    $('input').each(function() {
      if ( !$(this).val() ) {
        Errore("Riempi tutti i campi!", e);
        return false;
      }
    });
  });

});

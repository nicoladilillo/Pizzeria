$(document).ready(function(){

  $(".who-we-are").hide();;
  $(".home").show();

  $("#1").click(function(){
    $(".pizze").hide();
    $(".who-we-are").hide();;
    $(".home").show();
  });

  $("#2").click(function(){
    $(".home").hide();
    $(".who-we-are").hide();
    $(".pizze").show();
  });

  $("#3").click(function(){
    $(".pizze").hide();
    $(".home").hide();
    $(".who-we-are").show();
  });

});

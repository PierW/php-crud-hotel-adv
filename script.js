$(document).ready(init);

function getData() {

  var container = $(".list");
      container.find(".box").remove(); //Se ci sono elimino gli esistenti e li ricarico aggiornati


  $.ajax({
    url : "fulldb.php",
    method : "GET" ,
    success : function(apiData, stato) {

      if (stato == "success") {

        var parse = JSON.parse(apiData);
        var source = $("#list-pending").html();
        var template = Handlebars.compile(source);

        for (var i = 0; i < parse.length; i++) {
          var pagante = parse[i];
          var fullHTML = template(pagante);
              container.append(fullHTML);
        }
      }
    },
    error : function(richiesta, stato, errori) {
      alert("Errori di connessione " + errori);
    }
  });

}

function getDataCreation() {

  var me = $(this);
  var id = me.closest(".box").data("id");
  console.log(id);
  // console.log(id);
  $.ajax({
    url: "getAddress.php",
    method : "POST",
    data : { id : id},
    success : function(apiData, stato) {

      if (stato == "success") {

        var parse = JSON.parse(apiData);
        // console.log(parse);

        var container = me.parent().siblings(".address");
        // console.log(container);
            container.text(parse[0].address);
      }
    },
    error : function(richiesta, stato, errori) {
      alert("Errori di connessione " + errori);
    }
  });
}

function editName() {

  var me = $(this);
  var id = me.closest(".box").data("id");
  var newname = prompt("Dammi un nuovo Nome: ");
  var newlastname = prompt("Dammi un cognome: ");

  $.ajax({
    url : "editName.php",
    method : "POST",
    data : { id : id , newname : newname, newlastname : newlastname},
    success : function() {

      getData(); //Qui piallo tutto e via così mi riordina i nomi
    }
  });

}

function deletePagante() {

  var me = $(this);
  var container = me.closest(".box");
  var id = me.closest(".box").data("id");

  $.ajax({
    url : "deletepagante.php",
    method : "POST",
    data : { id : id },
    success : function() {

      container.fadeOut("slow", function() {
        container.remove();
      });
      // getData(); //Al posto di piallare tutto ho fatto una fadeOut con callback (+ elegante)
    }
  });
}

function init() {
  getData();
  $(document).on("click", ".fa-info-circle", getDataCreation);
  $(document).on("click", ".fa-edit", editName);
  $(document).on("click", ".fa-trash-alt", deletePagante);
}

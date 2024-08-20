function carregarEventos(dia, mes, ano) {
  $.ajax({
    url: "/Controller/EventoController.php",
    type: "GET",
    data: { action: "getEventosDia", dia: dia, mes: mes, ano: ano },
    success: function (response) {
      $("#eventosList").html(response);
    },
    error: function () {
      alert("Erro ao carregar eventos.");
    },
  });
}

function carregarDetalhesEvento(eventoId) {
  $.ajax({
    url: "/Controller/EventoController.php",
    type: "GET",
    data: { action: "getDetalhesEvento", eventoId: eventoId },
    success: function (response) {
      $("#detalhesEvento").html(response);
      $("#detalhesModal").modal("show");
    },
    error: function () {
      alert("Erro ao carregar detalhes do evento.");
    },
  });
}

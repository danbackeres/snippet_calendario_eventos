<?php
$mes = date('m'); # informe o mês e ano manualmente para alternar os eventos
$ano = date('Y');
$diasComEventos = [];

foreach ($eventos as $evento) {
    $dia = date('d', strtotime($evento['data']));
    $eventoMes = date('m', strtotime($evento['data']));
    $eventoAno = date('Y', strtotime($evento['data']));
    
    if ($eventoMes == $mes && $eventoAno == $ano) {
        $diasComEventos[$dia][] = $evento; 
    }
}

function diasNoMes($mes, $ano) {
    return date('t', mktime(0, 0, 0, $mes, 1, $ano));
}

function gerarCalendario($mes, $ano, $diasComEventos)
{
    $content = "";
    $diainicio = 0;
    $diasDoMes = diasNoMes($mes, $ano);

    for ($d = 1; $d <= $diasDoMes; $d++) {
        $time = mktime(12, 0, 0, $mes, $d, $ano);

        if (date('m', $time) == $mes) {
            if (date('d', $time) == '01') {
                $content .= "<tr>";

                $diainicio = date('N', $time);
                $content .= str_repeat('<td></td>', $diainicio - 1); 
            }
            $class = isset($diasComEventos[$d]) ? "class='text-white bg-primary'" : "";
            $dataAttributes = isset($diasComEventos[$d]) ? "data-bs-toggle='modal' data-bs-target='#eventosModal' data-dia='$d'" : "";
            $content .= "<td $class style='cursor:pointer;' $dataAttributes onclick='carregarEventos($d, $mes, $ano)'>" . date('d', $time) . "</td>";

            if (date('N', $time) == 7) {
                $content .= "</tr><tr>";
            }
        }
    }

    $content .= "</tr>";
    return $content;
}
?>

<div class="table-responsive calendario">
    <table class="table table-sm table-borderless">
        <caption class="text-end">Mês: <?= $mes . "/" . $ano; ?></caption>
        <thead class="text-center">
            <tr>
                <th scope="col">Dom</th>
                <th scope="col">Seg</th>
                <th scope="col">Ter</th>
                <th scope="col">Qua</th>
                <th scope="col">Qui</th>
                <th scope="col">Sex</th>
                <th scope="col">Sáb</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?= gerarCalendario($mes, $ano, $diasComEventos); ?>
        </tbody>
    </table>
</div>

<!-- Modal para listar eventos do dia -->
<div class="modal fade" id="eventosModal" tabindex="-1" aria-labelledby="eventosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventosModalLabel">Eventos do Dia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="eventosList">
                <!-- Lista de eventos será carregada aqui via Ajax -->
            </div>
        </div>
    </div>
</div>

<!-- Modal para exibir detalhes do evento -->
<div class="modal fade" id="detalhesModal" tabindex="-1" aria-labelledby="detalhesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalhesModalLabel">Detalhes do Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detalhesEvento">
                <!-- Detalhes do evento serão carregados aqui via Ajax -->
            </div>
        </div>
    </div>
</div>
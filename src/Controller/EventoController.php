<?php

namespace App\Controller;

use App\Model\EventoModel;

require_once __DIR__ . '/../Model/EventoModel.php';

class EventoController
{
    private EventoModel $eventoModel;

    public function __construct()
    {
        $this->eventoModel = new EventoModel();
    }

    public function index()
    {
        $eventos = $this->eventoModel->getEventos();
        include __DIR__.'/../View/eventos.php';
    }

    public function getEventosDia($dia, $mes, $ano)
    {
        $eventos = $this->eventoModel->getEventosPorDia($dia, $mes, $ano);
        echo "<table class='table'>";
        echo "<thead><tr><th>Hora</th><th>Nome</th><th>Detalhes</th><th>Ação</th></tr></thead>";
        echo "<tbody>";
        foreach ($eventos as $evento) {
            $hora = date('H:i', strtotime($evento['data']));
            $nome = htmlspecialchars($evento['nome']);
            $descricao = htmlspecialchars($evento['descricao']);
            
            // Limita a descrição a 30 caracteres
            $descricaoPreview = (strlen($descricao) > 30) ? substr($descricao, 0, 30) . '...' : $descricao;
    
            echo "<tr>";
            echo "<td>$hora</td>";
            echo "<td>$nome</td>";
            echo "<td>$descricaoPreview</td>";
            echo "<td><button class='btn btn-link btn-sm' onclick='carregarDetalhesEvento(" . $evento['id'] . ")'>Ver Mais</button></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    

    public function getDetalhesEvento($eventoId)
    {
        $evento = $this->eventoModel->getEventoById($eventoId);
        echo "<h5>" . htmlspecialchars($evento['nome']) . "</h5>";
        echo "<p>" . htmlspecialchars($evento['descricao']) . "</p>";
        echo "<p><strong>Data:</strong> " . date('d/m/Y H:i', strtotime($evento['data'])) . "</p>";
    }
}

// Processa as requisições AJAX
if (isset($_GET['action'])) {
    require_once __DIR__ . '/../Model/EventoModel.php';
    $controller = new EventoController();

    switch ($_GET['action']) {
        case 'getEventosDia':
            $controller->getEventosDia($_GET['dia'], $_GET['mes'], $_GET['ano']);
            break;
        case 'getDetalhesEvento':
            $controller->getDetalhesEvento($_GET['eventoId']);
            break;
    }
}
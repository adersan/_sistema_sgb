<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $relatorioHTML = $_POST['relatorio'];

    // Verificar conteúdo HTML recebido
    error_log("HTML do relatório recebido: " . urldecode($relatorioHTML));

    // Configuração do Dompdf
    try {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Carregar o conteúdo HTML
        $dompdf->loadHtml(urldecode($relatorioHTML));

        // Configurar o tamanho e orientação do papel
        $dompdf->setPaper('A4', 'landscape');

        // Renderizar o HTML como PDF
        $dompdf->render();

        // Enviar o PDF como download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="relatorio.pdf"');
        echo $dompdf->output();
    } catch (Exception $e) {
        // Registro de erro em caso de exceção
        error_log("Erro ao gerar PDF: " . $e->getMessage());
        echo json_encode(['error' => 'Erro ao gerar PDF. Verifique os logs para mais detalhes.']);
    }
}
?>

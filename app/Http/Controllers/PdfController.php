<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function generatePDF()
    {
        // Recupere todos os produtos do banco de dados
        // $produtos = Produto::all();

        $produtos = Produto::paginate(10);

        // Carrega a visualização 'dashboard' com a variável $produtos
        $pdf = PDF::loadView('relatorios.pdf-pedido', compact('produtos'));

        // Defina o tamanho e a orientação do papel
        $pdf->setPaper('A4', 'landscape');

        // Retorna o PDF para visualização no navegador
        return $pdf->stream('pdf-pedido.pdf');
    }
}

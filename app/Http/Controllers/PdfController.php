<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function generatePDF()
    {
        // Recupere todos os produtos do banco de dados
        $produtos = Produto::all();

        // $produtos = Produto::paginate(10);

        // Carrega a visualização 'dashboard' com a variável $produtos
        $pdf = PDF::loadView('relatorios.pdf-produtos', compact('produtos'));

        // Tamannho do papel e sua orientação
        $pdf->setPaper('A4', 'portrait');

        // visualização no navegador, mas pode ser para download também
        return $pdf->stream('pdf-produtos.pdf');
    }
}

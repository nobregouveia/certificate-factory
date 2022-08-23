<?php

namespace App\Http\Controllers;

use App\Imports\AlunosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUser;
use Error;
use Illuminate\Support\Facades\Storage;


class CertificadoController extends Controller
{
    public function gerarCertificado($nome, $email)
    {
        $pdf = new \setasign\Fpdi\Fpdi();

        $pagecount = $pdf->setSourceFile(storage_path('app/template.pdf'));

        $tpl = $pdf->importPage(1);
        $pdf->AddPage('L');
        $pdf->useTemplate($tpl, 0, 0, 300, 215, FALSE);
        $pdf->SetFont('Helvetica');
        $str = iconv('UTF-8', 'windows-1252', $nome);
        $pdf->SetFontSize('18');
        $pdf->SetTextColor(0, 0, 102);
        $pdf->SetXY(25, 79);
        $pdf->Cell(0, 10, $str, 0, 0, 'C');

        $pdfdoc = $pdf->Output("", "S");
        $attachment = chunk_split(base64_encode($pdfdoc));

        $mail = Mail::to($email)->queue(new SendMailUser($attachment));

        return $mail;
    }

    public function importXLS()
    {
        try {
            $array = Excel::toArray(new AlunosImport, storage_path('app/alunos.xlsx'));
            return $array;
        } catch (Error $e) {
            return $e;
        }
    }

    public function start()
    {
        try {
            $alunos = $this->importXLS()[0];

            for ($i = 1; $i < count($alunos); $i++) {
                $this->gerarCertificado($alunos[$i][0], $alunos[$i][1]);
            }

            return redirect('/')->with('success', 'Certificado(s) enviado(s) com sucesso!');
        } catch (Error $e) {
            return $e;
        }
    }
}

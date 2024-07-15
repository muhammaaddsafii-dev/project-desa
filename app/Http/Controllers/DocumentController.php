<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use PhpOffice\PhpWord\TemplateProcessor;

class DocumentController extends Controller
{
    public function generateDocument(Document $document)
    {

        $templatePath = storage_path('app/templates/template-doc.docx');

        if (!file_exists($templatePath)) {
            abort(404, 'Template document not found');
        }

        $templateProcessor = new TemplateProcessor($templatePath);

        // Ganti placeholder dengan nilai dari database
        $templateProcessor->setValue('name', $document->name);
        $templateProcessor->setValue('tempat_lahir', $document->tempat_lahir);
        $templateProcessor->setValue('tanggal_lahir', $document->tanggal_lahir);
        $templateProcessor->setValue('fakultas', $document->fakultas);
        $templateProcessor->setValue('alamat', $document->alamat);
        $templateProcessor->setValue('nik', $document->name);

        $fileName = 'template-doc' . $document->id . '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $templateProcessor->saveAs($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}

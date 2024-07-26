<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

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
        $templateProcessor->setValue('nik', $document->nik);
        $templateProcessor->setValue('nomor_surat', $document->nomor_surat);

        $fileName = 'template-doc' . $document->id . '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $templateProcessor->saveAs($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function uploadAndProcessDocument(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'file' => 'required|file|mimes:docx|max:1024',
        ]);

        $nomorSurat = $request->input('nomor_surat');
        $file = $request->file('file');
        $path = $file->storeAs('desa-template/documents', $file->getClientOriginalName(), 's3');

        // Load the uploaded document
        $templateProcessor = new TemplateProcessor(Storage::disk('s3')->url($path));

        // Update the nomor surat in the document
        $templateProcessor->setValue('nomor_surat', $nomorSurat);

        // Save the updated document
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $templateProcessor->saveAs($tempFilePath);

        // Upload the updated document back to S3
        Storage::disk('s3')->put($path, file_get_contents($tempFilePath), 'private');

        // Clean up temporary file
        unlink($tempFilePath);

        return redirect()->back()->with('success', 'Document uploaded and updated successfully.');
    }

}

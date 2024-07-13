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

        // $templateProcessor = new TemplateProcessor(storage_path('app/templates/template-doc.docx'));

        // $templateProcessor->setValue('{{name}}', $document->name);

        // $fileName = 'template-doc' . $document->id . '.docx';
        // $filePath = storage_path('app/public/' . $fileName);
        // $templateProcessor->saveAs($filePath);

        // return response()->download($filePath)->deleteFileAfterSend(true);

        // // Creating the new document...
        // $templateProcessor = new TemplateProcessor("template-doc.doc");

        // $templateProcessor->setValue('nama', $document->name);

        // $templateProcessor->saveAs("document-edit.doc");

        /* Note: any element you append to a document must reside inside of a Section. */


        //         // Adding an empty Section to the document...
        //         $section = $phpWord->addSection();
        //         // Adding Text element to the Section having font styled by default...
        //         $section->addText(
        //             '"Learn from yesterday, live for today, hope for tomorrow. '
        //                 . 'The important thing is not to stop questioning." '
        //                 . '(Albert Einstein)'
        //         );

        //         /*
        //  * Note: it's possible to customize font style of the Text element you add in three ways:
        //  * - inline;
        //  * - using named font style (new font style object will be implicitly created);
        //  * - using explicitly created font style object.
        //  */

        //         // Adding Text element with font customized inline...
        //         $section->addText(
        //             '"Great achievement is usually born of great sacrifice, '
        //                 . 'and is never the result of selfishness." '
        //                 . '(Napoleon Hill)',
        //             array('name' => 'Tahoma', 'size' => 10)
        //         );

        //         // Adding Text element with font customized using named font style...
        //         $fontStyleName = 'oneUserDefinedStyle';
        //         $phpWord->addFontStyle(
        //             $fontStyleName,
        //             array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        //         );
        //         $section->addText(
        //             '"The greatest accomplishment is not in never falling, '
        //                 . 'but in rising again after you fall." '
        //                 . '(Vince Lombardi)',
        //             $fontStyleName
        //         );

        //         // Adding Text element with font customized using explicitly created font style object...
        //         $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        //         $fontStyle->setBold(true);
        //         $fontStyle->setName('Tahoma');
        //         $fontStyle->setSize(13);
        //         $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        //         $myTextElement->setFontStyle($fontStyle);

        //         // Saving the document as OOXML file...
        //         $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        //         $objWriter->save('helloWorld.docx');

        //         // Saving the document as ODF file...
        //         $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        //         $objWriter->save('helloWorld.odt');

        //         // Saving the document as HTML file...
        //         $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        //         $objWriter->save('helloWorld.html');

        //         /* Note: we skip RTF, because it's not XML-based and requires a different example. */
        //         /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
    }
}

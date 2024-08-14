<?php

namespace App\Repository\AssignmentRepository;

use App\Http\Resource\DocumentCollection;
use App\Models\Document;
use App\Repository\AssignmentRepository\Interface\DocumentRepositoryInterface;
use App\Helpers\Helper;
use Illuminate\Http\Response;

class DocumentRepository implements  DocumentRepositoryInterface
{

    public function all()
    {
        $document_list = Document::orderBy('created_at', 'desc')->paginate(10);

        if (count($document_list) > 0) {
            return new DocumentCollection($document_list);
        } else {
            return Helper::success(Response::$statusTexts[Response::HTTP_NO_CONTENT], Response::HTTP_NO_CONTENT);
        }

//        return view('csv.index', compact('document_list'));

    }

    public function create()
    {
        return view('csv.csvData');

    }

    public function store($filePath)
    {
        $fullPath = storage_path('app/' . $filePath);

        if (($handle = fopen($fullPath, 'r')) !== false) {
            // Assuming the first row contains headers
            $headers = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                // Create an associative array from the CSV data
                $row = array_combine($headers, $data);

                // Save the data to the database (adapt as needed for your data and model)
                $this->saveDataToDatabase($row);
            }

            fclose($handle);
        }

        // Optionally, delete the file after processing
        unlink($fullPath);
    }

    protected function saveDataToDatabase(array $data)
    {
        // Assuming you have a model named `YourModel` and it matches the CSV columns
        Document::create($data);
    }



//    public function store($request)
//    {
//        // Read the CSV file
//        $file = $request->file('csv_file');
//        $fileData = file($file);
//
//        $data = array_map('str_getcsv', $fileData);
//
//        // Remove header row if necessary
//        $header = array_shift($data);
//
//
//        foreach ($data as $row) {
//            // Basic validation
//            if (!filter_var($row[1], FILTER_VALIDATE_EMAIL) || !is_numeric($row[2])) {
//                continue; // Skip invalid rows
//            }
//
//            $document = Document::create([
//                'name' => $row[0],
//                'email' => $row[1],
//                'phone_number' => $row[2],
//            ]);
//        }
//        if($document){
//            return Helper::success(Response::$statusTexts[Response::HTTP_OK], Response::HTTP_OK);
//        }else{
//            return Helper::error(Response::$statusTexts[Response::HTTP_NO_CONTENT], Response::HTTP_NO_CONTENT);
//        }
//
//    }
}

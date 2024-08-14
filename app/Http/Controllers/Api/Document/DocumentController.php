<?php

namespace App\Http\Controllers\Api\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Repository\AssignmentRepository\Interface\DocumentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CsvData;


class DocumentController extends Controller
{
    private $documentRepo;

    public function __construct(DocumentRepositoryInterface $documentRepo){
        $this->documentRepo = $documentRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return $this->documentRepo->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->documentRepo->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request){
    // Store the file and get its path
        $file = $request->file('csv_file');
        $filePath = $file->store('csv_files'); // Store the file in the 'csv_files' directory

            // Parse the CSV file
        $this->parseAndSaveCsv($filePath);

}
    protected function parseAndSaveCsv($filePath)
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

    protected function processCsv($path)
    {
        $fullPath = storage_path('app/' . $path); // Get the full path to the file

        if (($handle = fopen($fullPath, 'r')) !== FALSE) {
            // Read the file line by line
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // Process each row
                // $data is an array of columns
                // Example: $data[0], $data[1], etc.
            }
            fclose($handle);
        }

        // Optionally delete the file after processing
        // unlink($fullPath);
    }


    /**
     * Display the specified resource.
     */
    public function show(Document $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $assignment)
    {
        //
    }
}

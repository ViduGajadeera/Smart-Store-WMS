<?php
namespace App\Http\Controllers;

use App\Models\UploadManifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManifestController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file input
        $request->validate([
            'file' => 'required|mimes:xml',
        ]);
        
        $file = $request->file('file');
        if ($file) {
            $destinationPath = 'manifests';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);

            $filePath = $destinationPath . '/' . $fileName;

            // Save the relative file path in the database
            $uploadedFile = UploadManifest::create([
                'name' => $file->getClientOriginalName(),
                'file' => $filePath, // Storing the relative path in the database
                'status' => 'uploaded',
            ]);

            // Get the absolute file path
            $absoluteFilePath = public_path($uploadedFile->file);

            // Debugging: Check if the file exists
            if (!file_exists($absoluteFilePath)) {
                Log::error('File does not exist: ' . $absoluteFilePath);
                return back()->withErrors(['file' => 'File not found after upload.']);
            }

            // Parse the XML file
            $xml = simplexml_load_string(file_get_contents($absoluteFilePath));

            if ($xml === false) {
                Log::error('Failed to load XML file: ' . $absoluteFilePath);
                return back()->withErrors(['file' => 'Failed to parse XML file.']);
            }

            // Initialize a counter for saved BL numbers
            $blSavedCount = 0;

            // Get the manifest ID from the uploaded file record
            $manifestId = $uploadedFile->id;  // Correctly retrieve the manifest ID

            // Loop through each <Bol_segment> and check the <Place_of_unloading_code>
            foreach ($xml->Bol_segment as $bolSegment) {
                $placeOfUnloading = (string) $bolSegment->Load_unload_place->Place_of_unloading_code;

                // Check if <Place_of_unloading_code> is 'LKCMB'
                if ($placeOfUnloading === 'LKCMB') {
                    // Extract the data
                    $manifestData = [
                        'manifestId' => $manifestId,  // Pass the manifestId correctly
                        'BLnumber' => (string) $bolSegment->Bol_id->Bol_reference,
                        'containerNo' => (string) $bolSegment->ctn_segment->Ctn_reference,
                        'Number_of_packages' => (string) $bolSegment->Goods_segment->Number_of_packages,
                        'type_of_container' => (string) $bolSegment->ctn_segment->Type_of_container,
                        'package_type' => (string) $bolSegment->Goods_segment->Package_type_code,
                        'gross_mass' => (string) $bolSegment->Goods_segment->Gross_mass,
                        'description' => (string) $bolSegment->Goods_segment->Goods_description,
                        'CBM' => (string) $bolSegment->Goods_segment->Volume_in_cubic_meters,
                        'vesselName' => (string) $xml->Master_bol->SLPA_Ref_Number,  // Assuming vessel name is Voyage_number
                        'exporterName' => (string) $bolSegment->Traders_segment->Exporter->Exporter_name,
                        'exporterAddress' => (string) $bolSegment->Traders_segment->Exporter->Exporter_address,
                        'consigneeName' => (string) $bolSegment->Traders_segment->Consignee->Consignee_name,
                        'consigneeAddress' => (string) $bolSegment->Traders_segment->Consignee->Consignee_address,
                        'discharging_port' => (string) $bolSegment->Load_unload_place->Place_of_unloading_code,
                        'loading_port' => (string) $bolSegment->Load_unload_place->Place_of_loading_code,
                        'status' => 'not_arrived',  // Or any other status logic you need
                        'permission'=>'hold',
                    ];

                    // Save the extracted data to the database
                    \App\Models\manifestData::create($manifestData);

                    // Increment the BL count for each saved record
                    $blSavedCount++;
                }
            }

            // Pass the count to the view with a success message
            return back()->with([
                'success' => 'Data has been extracted and saved successfully.',
                'blSavedCount' => $blSavedCount,
            ]);
        }

        return back()->withErrors(['file' => 'File upload failed']);
    }
}

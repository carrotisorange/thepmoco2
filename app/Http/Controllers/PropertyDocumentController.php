<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyDocument;
use App\Models\Document;

class PropertyDocumentController extends Controller
{
    public function store($property_uuid){
        $propertyTypeId = Property::find($property_uuid)->type_id;
        $documents = Document::where('is_active',1)->get();

        if($propertyTypeId == 8){
            foreach($documents as $document)
            PropertyDocument::create([
                'property_uuid' => $property_uuid,
                'document_id' => $document->id,
                'name' => $document->document,
                'user_id' => auth()->user()->id
            ]);
        }

    }
}
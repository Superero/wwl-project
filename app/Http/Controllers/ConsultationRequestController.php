<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreConsultationRequest;
use App\Models\ConsultationRequest;

class ConsultationRequestController extends Controller
{
    public function store(StoreConsultationRequest $request){
        $consultation = ConsultationRequest::create($request->validated());

        return back()->with('success', 'Votre demande a bien été envoyée. Un expert vous recontacte sous 24h.');
    }
}

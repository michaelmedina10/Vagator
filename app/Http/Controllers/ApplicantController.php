<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file')->store('');
        try {
            if (Job::find($request->job_id)) {
                DB::beginTransaction();
                $applicant = Applicant::create($request->all());
                $applicant->attachments()->create([
                    'job_id' => $request->job_id,
                    'applicant_id' => $request->applicant_id,
                    'attachment' => $file
                ]);
                $applicant->jobs()->create($request->all());
                
                DB::commit();
                return response()->json(['success' => 'Sua inscrição foi enviada com sucesso!']);
            }
            return response()->json(['error' => 'A vaga não está mais disponível'],404);
        } catch(Exception $ex) {
            DB::rollBack();
        }
        
    }
}

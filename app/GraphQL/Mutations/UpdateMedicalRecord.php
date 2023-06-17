<?php

namespace App\GraphQL\Mutations;

use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

final class UpdateMedicalRecord
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, )
    {
        $user = Request::user('sanctum');
        $labs = $args['labs'];

        $medicalRecord = MedicalRecord::updateOrCreate(
            ['patient_id' => $user->id],
            [
                'labs' => $labs,
            ]
        );

        return $medicalRecord;
    }
}

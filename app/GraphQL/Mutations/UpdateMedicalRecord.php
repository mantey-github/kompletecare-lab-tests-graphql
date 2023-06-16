<?php

namespace App\GraphQL\Mutations;

use App\Models\MedicalRecord;

final class UpdateMedicalRecord
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $patientId = $args['patient_id'];
        $labs = $args['labs'];

        $medicalRecord = MedicalRecord::updateOrCreate(
            ['patient_id' => $patientId],
            [
                'labs' => $labs,
            ]
        );

        return $medicalRecord;
    }
}

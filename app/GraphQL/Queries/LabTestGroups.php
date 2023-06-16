<?php

namespace App\GraphQL\Queries;

use App\Models\LabTest;

final class LabTestGroups
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return LabTest::all()->groupBy('type')->map(function ($tests, $type) {
            return [
                'type' => $type,
                'tests' => $tests,
            ];
        })->values();
    }
}

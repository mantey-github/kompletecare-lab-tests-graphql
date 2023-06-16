<?php

namespace Database\Seeders;

use App\Models\LabTest;
use Illuminate\Database\Seeder;

class LabTestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LabTest::truncate();

        $types = [
            'x-ray-scan' => [
                'Chest', 'Cervical Vertebrae', 'Thoracic Vertebrae', 'Lumvar Vertebrae', 'Lumbo Sacral Vertebrae',
                'Thoraco Lumbar Vertebrae', 'Wrist Joint', 'Thoracic Inlet', 'Shoulder Joint', 'Elbow Joint', 'Knee Joint', 
                'Sacro Iliac Joint', 'Pelvic Joint', 'Hip Joint', 'Femoral', 'Ankle', 'Humerus', 'Radius/Ulner', 'Foot',
                'Tibia/Fibula', 'Fingers', 'Toes'
            ], 
            'ultrasound-scan'=> [
                'Obstetric', 'Abdominal', 'Pelvis', 'Prostrate', 'Breast', 'Thyroid'
            ], 
            'ct-scan' => [
                'Virtual Colonoscopy', 'Musculoskeletal', 'CT Urography', 'Coronary', 'Sinus CT'
            ],
            'mri-scan' => [
                'Cardiac MRI', 'Pelvic MRI', 'Whole-Body MRI', 'Brain MRI'
            ],
        ];

        foreach ($types as $type => $tests) {
            foreach($tests as $test) {
                $formTest = [
                    'type' => $type, 
                    'name' => $test,
                    'description' => fake()->paragraph(2),
                ];
                LabTest::create($formTest);
            }
        }
    }
}

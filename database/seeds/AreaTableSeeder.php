<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/labs.json');
        $labs = json_decode($json);
        foreach ($labs as $class) {
            $area = ClinicaMedica\Area::create([
                'name' => $class->name,
                'date' => Carbon\Carbon::now()
            ]);
        }

        $jsonT = File::get('database/data/exams.json');
        $tests = json_decode($jsonT);
        foreach ($tests as $element) {
            $exam = new ClinicaMedica\MedicalExam;
            $exam->name = $element->name;
            $exam->inputs = json_encode(Array());
            $exam->status = 'Incompleto';
            $exam->save();
            foreach ($element->areas as $area_id) {
                $area = ClinicaMedica\Area::find($area_id);
                $count = $area->exams()->count() + 1;
                $exam->update();
                $exam->areas()->attach($area,['correlative'=> $area->exams->count() + 1]);
            }
            
            // $area->exams()->save($exam);
        }
    }
}

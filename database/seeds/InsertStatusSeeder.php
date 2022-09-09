<?php

use App\Model\Status;
use Illuminate\Database\Seeder;

class InsertStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( count(Status::all()) == 0 ){
            $status = new Status;
            $status->order = 1;
            $status->status = 'Open';
            $status->next_id = 2;
            $status->save();

            $status2 = new Status;
            $status2->order = 2;
            $status2->status = 'Submitted';
            $status2->next_id = 3;
            $status2->save();

            $status3 = new Status;
            $status3->order = 3;
            $status3->status = 'Approved by Analyst Claim MV';
            $status3->next_id = 5;
            $status3->back_id = 4;
            $status3->save();

            $status4 = new Status;
            $status4->order = 4;
            $status4->status = 'Revision';
            $status4->next_id = 3;
            $status4->save();

            $status5 = new Status;
            $status5->order = 5;
            $status5->status = 'Filing';
            $status5->save();
        }
    }
}

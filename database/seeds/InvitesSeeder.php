<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Invite;

class InvitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/csvs/invites.csv';
        $csv = Reader::createFromPath($path);
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        $invites = [];

        foreach ($records as $record) {
            $invites[$record['Invite']][] = ['name' => $record['Name']];
        }

        foreach ($invites as $code => $guests) {
            $invite = Invite::create([
                'code' => (string)$code,
            ]);
            $invite->guests()->createMany($guests);
        }
    }
}

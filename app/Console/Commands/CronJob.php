<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $existingData = User::all();

        // Loop through each record and replicate
        foreach ($existingData as $data) {
            // Create a new record and save
            $newData = new User();
            $newData->name = $data->name; // Repeat for all columns
            $newData->email = $data->email;
            $newData->age = $data->age;

            // Repeat for all columns

            $newData->save();
        }

        $this->info('Data has been replicated successfully!');

        return Command::SUCCESS;
    }
}

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

        foreach ($existingData as $data) {
            $newData = new User();
            $newData->name = $data->name; 
            $newData->email = $data->email;
            $newData->age = $data->age;

            $newData->save();
        }

        $this->info('Data has been replicated successfully!');

        return Command::SUCCESS;
    }
}

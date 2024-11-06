<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
    
class SendDailyReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily reminders with your working day count';


    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve the current working day count
        $dayRecord = DB::table('working_days')->first();

        // Increment the day count by 1
        $newCount = $dayRecord->day_count + 1;

        // Update the count in the database
        DB::table('working_days')->update(['day_count' => $newCount]);

        // Display the reminder message with the working day count
        $this->info("This is your reminder for working day #$newCount");
    }
}

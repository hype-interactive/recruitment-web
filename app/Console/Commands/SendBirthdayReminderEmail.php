<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\BirthdayReminder;
use Illuminate\Support\Facades\Mail;
use App;
use Illuminate\Support\Facades\Log;

class SendBirthdayReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users a birthday Reminder message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $i = 0;

        $users = User::whereMonth('date_of_birth', '=', date('m'))->whereDay('date_of_birth', '=', date('d'))->get();

        foreach($users as $user)
        {
            $email = $user->email;
            try {
                Mail::to($email)->send(new BirthdayReminder($user));

                if (Mail::failures()) $this->error('Email failed to send to ' . $email);
            } catch (\Throwable $th) {
                Log::error("Error sending birthday reminder email to $email: " . $th->getMessage());
            }
        
            $i++; 
        }

        $this->info($i.' Birthday messages sent successfully!');
    }
}

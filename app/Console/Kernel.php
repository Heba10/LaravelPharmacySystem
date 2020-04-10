<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use App\User;
use Mail;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
       $schedule->call(function (){
           $users=User::all()->where('last_login_at', '>=', new DateTime('-1 months'));
            foreach ($users as $user){
                $data['title'] = "Ur last order with from more than one month ago";
 
                Mail::send('emails.email', $data, function($message) {
         
                    $message->to($user->email, $user->name)
         
                            ->subject('We miss u');
                });
            }
       })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

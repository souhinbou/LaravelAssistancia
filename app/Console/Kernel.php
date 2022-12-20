<?php

namespace App\Console;

use App\Mail\WaitOngoing;
use App\Mail\Waiting;
use App\Models\Demande;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    /**
     * Cette fonction permet de rappeler à tous les administeurs qu'une demande est en attente.
     */
    protected function schedule(Schedule $schedule)
    {
       // $schedule->command('inspire')->everyMinute();
        $schedule->call(function(){
        $admins= User::where('role','admin')->get();
        $demandes= Demande::where('admin_id',null)->get();
        foreach($admins as $admin){
            Mail::to($admin->email)->send(new WaitOngoing($admin->name,$demandes));
        }
        })->everyMinute();

    }
    /**
     * Cette fonction de rapeler un administrateur que la demande est toujours en cours.
     */
    protected function schedule1(Schedule $schedule)
    {
        $schedule->call(function (){
            $admins= User::where('role','admin')->get();
            $demandes= Demande::where('admin_id',Auth::user()->id);
            foreach($admins as $admin){
                Mail::to($admin->email)->send(new Waiting($admin->name,$demandes));
            }

        })->dailyAt('8:0:0');
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

<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\PushNotifyController;
use App\PatientTask;
use App\PatientTaskRemember;
use App\Translate\CheckListTaskTranslate;
use App\Translate\CheckListTranslate;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyTaskPatient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patient:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $users = PatientTaskRemember::query()->whereNotNull('date')->get();
        foreach($users as $user) {
            if ($user->remember == 1) {
                if ($user->date >= Carbon::now()->toDateString() ) {
                    $patient = $user->patient;
                    $check_list = CheckListTaskTranslate::query()
                        ->where('task_id', $user->task_id)->first();
                    $data = User::query()->where('id', $patient->user_id)->first();
                    $push = new PushNotifyController();
                    $push->sendPush($check_list->name, $data->id, 'Вы просили напомнить Вам');
                    $user->update(['remember' => 0]);
                }
            }
        }
    }
}

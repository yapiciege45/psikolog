<?php

namespace App\Console\Commands;

use App\Models\Sms;
use Illuminate\Console\Command;

class SendPendingSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send pending SMS and mark them as sent';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pendingSms = Sms::where('is_sended', false)->get();

        foreach ($pendingSms as $sms) {
            // SMS gönderme kodu buraya eklenecek
            // örneğin: SmsService::send($sms->number, $sms->message);

            // SMS'in gönderildiğini işaretleyin
            $sms->is_sended = true;
            $sms->save();
        }

        return 0;
    }
}

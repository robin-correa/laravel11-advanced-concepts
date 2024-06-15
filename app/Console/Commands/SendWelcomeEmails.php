<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-welcome-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send welcome emails to new users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('SendWelcomeEmails command has been executed');
        $this->info('Welcome emails have been sent.');
    }
}

<?php

namespace App\Jobs;

use App\Mail\SalaryMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $mailData;
    public function __construct($mailData)
    {
    $this->mailData=$mailData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        $email = new SalaryMail($this->mailData['salary']);
        Mail::to($this->mailData['email'])->send($email);
    }
}

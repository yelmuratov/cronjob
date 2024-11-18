<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;

class ImportUsers implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $username;
    public function __construct($name)
    {
        $this->username = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for($i = 0; $i < 300000; $i++) {
            User::create([
                'name' => $this->username . $i,
                'email' => $this->username . $i . '@gmail.com',
                'password' => bcrypt('password123'),
            ]);
        }
    }
}

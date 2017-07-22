<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the application\'s environment for the demo';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:fresh');

        $user = factory('App\User')->create([
            'name' => 'Sven Luijten',
            'email' => 'sven@e-sites.nl',
        ]);

        factory('App\Post', 25)->create([
            'user_id' => $user->id,
        ]);
    }
}

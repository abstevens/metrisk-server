<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {name?}';

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
        $name = $this->argument('name');

        if (empty($name)) {
            $name = $this->ask('Please specify a name');
        }

        $email = $this->ask('Please enter a vaild email address of ' . $name);

        $password = $this->ask('Please enter a password for ' . $email);

        try {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        } catch (\Throwable $e) {
            $this->error(
                'There was an error with the user creation: '
            );
            $this->line($e->getMessage());
        }

        $this->info($name . ' has been successfully created.');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Backpack\PermissionManager\app\Models\Role as Role;

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:role {name?*}';

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
            $name = explode(
                ' ',
                $this->ask('Please specify role names, separated with a space')
            );
        }

        foreach ($name as $roleName) {
            try {
                Role::create(['name' => $roleName]);
            } catch (\Throwable $e) {
                $this->error(
                    'There was an error with the role creation'
                );
                $this->line($e->getMessage());
                continue;
            }

            $this->info('The ' . $roleName .' role has been successfully created.');
        }

    }
}

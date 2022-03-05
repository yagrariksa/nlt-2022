<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

use function PHPUnit\Framework\directoryExists;

class Symlink extends Command
{
    protected $signature = 'storage:image';

    protected $description = 'Create the symbolic links configured image developer resource';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Make Symbolic Link');
        if (!is_dir(base_path('/public/assets'))) {
            $this->info('there\'s no dir public/assets');
            mkdir(base_path('/public/assets'));
            $this->info('creating dir public/assets');
        }
        $this->info(base_path('resources/img/') . ' to ' . base_path('public/assets/img'));
        symlink(base_path('resources/img/'), base_path('public/assets/img'));
        $this->info('Success');
        return 0;
    }
}
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:site';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the site by running various optimization commands.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Optimizing site...');
        $this->call('filament:clear-cached-components');
        $this->call('optimize:clear');
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('icons:cache');
        $this->call('optimize');
        $this->call('filament:cache-components');

        $this->info('Site optimized successfully.');
    }
}

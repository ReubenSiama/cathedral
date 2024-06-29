<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SlugifyParishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slugify:parishes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Temporary command to update existing parishes with slugs.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $parishes = \App\Models\Parish::all();

        $bar = $this->output->createProgressBar($parishes->count());

        $parishes->each(function ($parish) use ($bar) {
            $parish->update([
                'slug' => \Illuminate\Support\Str::slug($parish->name),
            ]);

            $bar->advance();
        });

        $bar->finish();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ListStorageFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-storage-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $folder = $this->argument('folder');
        $files = Storage::allFiles($folder);

        if (empty($files)) {
            $this->info("No files found in the folder: $folder");
        } else {
            foreach ($files as $file) {
                $this->line($file);
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\DialogHelper\Dialogs;
use App\Services\FeedService;
use Config;

class XmlImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:import';

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
        $storageType = Config::get('xmlimport.storage.type', 'database');
        $fileData = Dialogs::askFile($this);

        if(Dialogs::confirmContinue($this)) {
            try {
                if ($storageType === 'database') {
                    $result = FeedService::storeImportedFeedsToDB($fileData);
                    $this->info($result['logMessage']);
                } else {
                    // Add logic for other storage types
                    $this->error('Unsupported storage type.');
                }
            } catch (\Exception $e) {
                Log::error('Error processing XML file: ' . $e->getMessage());
                $this->error('Error processing XML file. Check the log for details.');
            }
            
        }
        else{
            $this->info('Exit Import'); 
        }
    
    }
}

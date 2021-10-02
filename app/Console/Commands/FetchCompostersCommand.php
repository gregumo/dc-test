<?php

namespace App\Console\Commands;

use App\Api\Client\NantesMetropoleApiClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
class FetchCompostersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:composters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Nantes Métropole API first 20 neighborhood composters (this command erase and replace previous records)';

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
     * @return int
     */
    public function handle()
    {
        /** @var NantesMetropoleApiClient $apiClient */
        $apiClient = App::make(NantesMetropoleApiClient::class);
        $results = $apiClient->importComposters();

        if ($results) {
            $this->info(sprintf(
                '%s composter(s) were successfully imported',
                count($results)
            ));
        } else {
            $this->info('The API did not return any composter to import');
        }

        return 0;
    }
}

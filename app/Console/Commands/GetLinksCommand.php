<?php

namespace App\Console\Commands;

use App\Jobs\GenerateLinksFromNetwork;
use App\Services\NetworksService\GenerateLinksFromNetworksService;
use App\Services\NetworksService\GenerateLinksFromNetworksServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class GetLinksCommand extends Command
{
    protected $signature = 'gh:get-links {type?}';

    protected $description = 'Generate GameLinks From Networks';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(GenerateLinksFromNetworksServiceInterface $generateLinksFromNetworksService)
    {
        $type = $this->argument('type');

        if ($type === null) {
            $generateLinksFromNetworksService->generateLinksFromDefaultsNetworks();
        } else {
            Queue::pushOn('networks', new GenerateLinksFromNetwork($type));
        }

        $this->info('Generating links has been queued in a queue named "' .
            GenerateLinksFromNetworksService::QUEUE_NAME_FOR_NETWORK . '"');
    }
}

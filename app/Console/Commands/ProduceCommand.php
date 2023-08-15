<?php

namespace App\Console\Commands;

use App\Services\ProducerService;
use Illuminate\Console\Command;

class ProduceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:produce-command';

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
        /**
         * @var ProducerService $producer
         */
        $producer = app(ProducerService::class);
        $producer->publish(['teste' => 'teste']);
    }
}

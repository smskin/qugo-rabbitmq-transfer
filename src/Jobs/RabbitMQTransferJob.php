<?php

namespace Qugo\RabbitMQTransfer\Jobs;

use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class RabbitMQTransferJob
 *
 * @package Qugo\RabbitMQTransfer\Jobs
 */
class RabbitMQTransferJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * @var string
     */
    public $data;

    /**
     * @var string
     */
    public $signature;

    /**
     * RabbitMQTransferJob constructor.
     *
     * @param BaseRequest $request
     */
    public function __construct(BaseRequest $request)
    {
        $this->data = $request->dto->serialize();
        $this->signature = $request::$signature;
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        $this->getTransferService()->receive($this->signature, $this->data);
    }

    /**
     * @return RabbitMQTransferService
     */
    private function getTransferService(): RabbitMQTransferService
    {
        return app(RabbitMQTransferService::class);
    }
}

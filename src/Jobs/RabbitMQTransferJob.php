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
     * @var string
     */
    public $senderQueue;

    /**
     * RabbitMQTransferJob constructor.
     *
     * @param BaseRequest $request
     * @param string|null $senderQueue
     */
    public function __construct(BaseRequest $request, ?string $senderQueue)
    {
        $this->data = $request->dto->serialize();
        $this->signature = $request::$signature;
        $this->senderQueue = $senderQueue;
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        $this->getTransferService()
             ->receive(
                 $this->signature,
                 $this->data,
                 $this->senderQueue
             );
    }

    /**
     * @return RabbitMQTransferService
     */
    private function getTransferService(): RabbitMQTransferService
    {
        return app(RabbitMQTransferService::class);
    }
}

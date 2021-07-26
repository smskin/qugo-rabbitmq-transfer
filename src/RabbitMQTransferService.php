<?php

namespace Qugo\RabbitMQTransfer;

use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\CreateTaxQueryRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\TaxQueryFailedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\ReceiptReversedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\SubscribeRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\CreateEmployeeRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\CreateReceiptRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\TaxQueryReceivedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\EmployeeUpdatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\FNSNotificationCreatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\MarkFNSNotificationAsReadRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\ReceiptCreatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\ReceiptFailedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\ReceiptUpdatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\SyncEmployeeWithFnsRequest;
use Qugo\RabbitMQTransfer\Jobs\RabbitMQTransferJob;
use Exception;
use ReflectionClass;

/**
 * Class RabbitMQTransferService
 *
 * @package Qugo\RabbitMQTransfer
 */
class RabbitMQTransferService
{
    const QUEUE_TO_QUGO = 'to_qugo';
    const QUEUE_TO_SMZ = 'to_smz';

    /**
     * @param BaseRequest $request
     */
    public function submit(BaseRequest $request)
    {
        foreach ($request->queues as $queue) {
            dispatch(new RabbitMQTransferJob($request, $request->sender))
                ->onQueue($queue)
                ->onConnection(config('qugo-rabbit-transfer.connection'));
        }
    }

    /**
     * @param string      $signature
     * @param string      $json
     * @param string|null $senderQueue
     * @throws Exception
     */
    public function receive(string $signature, string $json, ?string $senderQueue)
    {
        $request = $this->getRequest($signature, $json);
        event($request->event->setSenderQueue($senderQueue));
    }

    /**
     * @param string $signature
     * @param string $json
     * @throws Exception
     * @return BaseRequest
     * @noinspection PhpUndefinedMethodInspection
     */
    protected function getRequest(string $signature, string $json): BaseRequest
    {
        if (!array_key_exists($signature, $this->map())) {
            throw new Exception('Incorrect signature');
        }
        $requestClass = $this->map()[$signature];
        $dtoClass = $requestClass::getDTOClass();
        $object = BaseDTO::unSerialize($json);
        $data = [];
        $reflection = new ReflectionClass($dtoClass);
        foreach ($reflection->getConstructor()->getParameters() as $param) {
            $data[] = $object->{$param->getName()};
        }

        return new $requestClass(new $dtoClass(...$data));
    }

    /**
     * @return string[]
     */
    protected function map(): array
    {
        return [
            // Receipt requests
            ReceiptCreatedRequest::$signature => ReceiptCreatedRequest::class,
            CreateReceiptRequest::$signature => CreateReceiptRequest::class,
            ReceiptFailedRequest::$signature => ReceiptFailedRequest::class,
            ReceiptUpdatedRequest::$signature => ReceiptUpdatedRequest::class,
            ReceiptReversedRequest::$signature => ReceiptReversedRequest::class,
            // Employees requests
            CreateEmployeeRequest::$signature => CreateEmployeeRequest::class,
            EmployeeUpdatedRequest::$signature => EmployeeUpdatedRequest::class,
            SyncEmployeeWithFnsRequest::$signature => SyncEmployeeWithFnsRequest::class,
            // FNS Notifications requests
            FNSNotificationCreatedRequest::$signature => FNSNotificationCreatedRequest::class,
            MarkFNSNotificationAsReadRequest::$signature => MarkFNSNotificationAsReadRequest::class,
            // Tax queries
            CreateTaxQueryRequest::$signature => CreateTaxQueryRequest::class,
            TaxQueryReceivedRequest::$signature => TaxQueryReceivedRequest::class,
            TaxQueryFailedRequest::$signature => TaxQueryFailedRequest::class,
            // Other requests
            SubscribeRequest::$signature => SubscribeRequest::class
        ];
    }
}

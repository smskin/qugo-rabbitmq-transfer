<?php

namespace Qugo\RabbitMQTransfer;

use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\CreateEmployeeRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\CreateReceiptRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\EmployeeTaxRequestCreatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\EmployeeUpdatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\FNSNotificationCreatedRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\MarkFNSNotificationAsReadRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests\ReceiptCreatedRequest;
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
     * @param BaseEvent $request
     */
    public function submit($request)
    {
        foreach ($request->getQueues() as $queue) {
            dispatch(new RabbitMQTransferJob($request))
                ->onQueue($queue)
                ->onConnection(config('qugo-rabbit-transfer.connection'));
        }
    }

    /**
     * @param string $signature
     * @param string $json
     * @throws Exception
     */
    public function receive(string $signature, string $json)
    {
        $request = $this->getRequest($signature, $json);
        event($request->event);
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
            ReceiptCreatedRequest::$signature => ReceiptCreatedRequest::class,
            CreateReceiptRequest::$signature => CreateReceiptRequest::class,
            CreateEmployeeRequest::$signature => CreateEmployeeRequest::class,
            EmployeeUpdatedRequest::$signature => EmployeeUpdatedRequest::class,
            SyncEmployeeWithFnsRequest::$signature => SyncEmployeeWithFnsRequest::class,
            FNSNotificationCreatedRequest::$signature => FNSNotificationCreatedRequest::class,
            MarkFNSNotificationAsReadRequest::$signature => MarkFNSNotificationAsReadRequest::class,
            EmployeeTaxRequestCreatedRequest::$signature => EmployeeTaxRequestCreatedRequest::class
        ];
    }
}

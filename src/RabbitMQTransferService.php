<?php

namespace Qugo\RabbitMQTransfer;

use Qugo\RabbitMQTransfer\Jobs\RabbitMQTransferJob;
use Qugo\RabbitMQTransfer\Requests\WorkmanCreatedRequest;
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
    final public function submit(BaseRequest $request)
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
    final public function receive(string $signature, string $json)
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
    private function getRequest(string $signature, string $json): BaseRequest
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
    private function map(): array
    {
        return [
            WorkmanCreatedRequest::$signature => WorkmanCreatedRequest::class,
        ];
    }
}

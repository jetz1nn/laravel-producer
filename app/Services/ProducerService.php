<?php

namespace App\Services;

use App\Interfaces\ProducerServiceInterface;
use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ProducerService implements ProducerServiceInterface
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            config('rabbitmq.host'),
            config('rabbitmq.port'),
            config('rabbitmq.user'),
            config('rabbitmq.pass'),
            config('rabbitmq.vhost')
        );
        $this->channel = $this->connection->channel();
    }


    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

    public function publish(array $message = [])
    {
        $this->channel->queue_declare(queue: config('consumer.queue'), durable: true, auto_delete: false);
        $message = new AMQPMessage(json_encode($message));
        $this->channel->basic_publish($message, routing_key:  'test_queue');
    }
}
<?php

namespace Drupal\hos_queue_manager;

use Drupal\Core\Queue\QueueFactory;

/**
 * Class QueueManager.
 */
class QueueManager implements QueueManagerInterface {

  protected $queueFactory;

  public function __construct(QueueFactory $queueFactory) {
    $this->queueFactory = $queueFactory;
  }

  /**
   * @inheritdoc
   */
  public function queueMessage($message, $number){
    $data['message'] = $message;
    $data['number'] = $number;

    $messageQueue = $this->queueFactory->get('hos_message_queue');
    $messageQueue->createQueue();
    $messageQueue->createItem($data);
  }
}

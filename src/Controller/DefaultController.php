<?php

namespace Drupal\tasklist\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\tasklist\Plugin\TasklistInterface;
use Drupal\tasklist\Plugin\TasklistManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DefaultController.
 *
 * @package Drupal\tasklist\Controller
 */
class DefaultController extends ControllerBase {

  /** @var TasklistManager */
  protected $tasklistManager;

  /**
   * Index.
   *
   * @return string
   *   Return Hello string.
   */
  public function index() {
    $system = $this->config('tasklist.settings')->get('system');

    /** @var TasklistInterface $pluginManager */
    $pluginManager = $this->tasklistManager->createInstance($system);
    $pluginManager->authenticate();
    return [
      '#theme' => 'tasklist',
      '#list' => $pluginManager->getTasks(),
      '#name' => $pluginManager->getName()
    ];
  }

  public static function create(ContainerInterface $container)
  {
    /** @var TasklistManager $tasklistManager */
    $tasklistManager = $container->get('plugin.manager.tasklist.processor');
    return new static($tasklistManager);
  }

  /**
   * DefaultController constructor.
   */
  public function __construct(TasklistManager $tasklistManager)
  {
    $this->tasklistManager = $tasklistManager;
  }

}

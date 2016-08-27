<?php

namespace Drupal\tasklist\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\tasklist\ProjectManagmentTasksService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DefaultController.
 *
 * @package Drupal\tasklist\Controller
 */
class DefaultController extends ControllerBase {

  /** @var ProjectManagmentTasksService */
  protected $pmService;

  /**
   * Index.
   *
   * @return string
   *   Return Hello string.
   */
  public function index() {
    $this->pmService->authenticate();
    return [
      '#theme' => 'tasklist',
      '#list' => $this->pmService->getTasks()
    ];
  }

  public static function create(ContainerInterface $container)
  {
    /** @var ProjectManagmentTasksService $pmSystem */
    $pmSystem = $container->get('tasklist.pm_system');
    return new static($pmSystem);
  }

  /**
   * DefaultController constructor.
   */
  public function __construct(ProjectManagmentTasksService $pmService)
  {
    $this->pmService = $pmService;
  }

}

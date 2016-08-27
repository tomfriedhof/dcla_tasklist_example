<?php

namespace Drupal\tasklist;

/**
 * Class ProjectManagmentTasksService.
 *
 * @package Drupal\tasklist
 */
class ProjectManagmentTasksService implements ProjectManagmentTasksServiceInterface {

  protected $authenticated = false;

  public function authenticate()
  {
    drupal_set_message('Authenticated');
    $this->authenticated = true;
  }

  public function getTasks()
  {
    if (!$this->authenticated) {
      drupal_set_message('You must authenticate first', 'error');
      return;
    }
    return ['one', 'two', 'three'];
  }


}

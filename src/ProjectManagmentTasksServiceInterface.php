<?php

namespace Drupal\tasklist;

/**
 * Interface ProjectManagmentTasksServiceInterface.
 *
 * @package Drupal\tasklist
 */
interface ProjectManagmentTasksServiceInterface {

    public function authenticate();

    public function getTasks();

}

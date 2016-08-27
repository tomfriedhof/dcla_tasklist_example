<?php

namespace Drupal\tasklist\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Tasklist plugins.
 */
interface TasklistInterface extends PluginInspectionInterface {

    public function getName();
    public function authenticate();
    public function getTasks();

}

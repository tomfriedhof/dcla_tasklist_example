<?php

namespace Drupal\tasklist\Plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Tasklist plugins.
 */
abstract class TasklistBase extends PluginBase implements TasklistInterface {


  public function getName() {
      return $this->getPluginDefinition()['label'];
  }

}

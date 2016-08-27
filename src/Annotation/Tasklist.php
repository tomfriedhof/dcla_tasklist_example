<?php

namespace Drupal\tasklist\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Tasklist item annotation object.
 *
 * @see \Drupal\tasklist\Plugin\TasklistManager
 * @see plugin_api
 *
 * @Annotation
 */
class Tasklist extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}

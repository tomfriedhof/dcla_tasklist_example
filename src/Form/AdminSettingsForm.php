<?php

namespace Drupal\tasklist\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\tasklist\Plugin\TasklistManager;

/**
 * Class AdminSettingsForm.
 *
 * @package Drupal\tasklist\Form
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * Drupal\tasklist\Plugin\TasklistManager definition.
   *
   * @var \Drupal\tasklist\Plugin\TasklistManager
   */
  protected $pluginManagerTasklistProcessor;
  public function __construct(
    ConfigFactoryInterface $config_factory,
      TasklistManager $plugin_manager_tasklist_processor
    ) {
    parent::__construct($config_factory);
        $this->pluginManagerTasklistProcessor = $plugin_manager_tasklist_processor;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('plugin.manager.tasklist.processor')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'tasklist.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('tasklist.settings');

    $plugins = $this->pluginManagerTasklistProcessor->getDefinitions();

    $plugin_labels = array_map(function($in) {
        return $in['label'];
      }, $plugins);

    $form['system'] = [
      '#type' => 'select',
      '#title' => $this->t('Project Management System'),
      '#description' => $this->t('Choose the project management system to use.'),
      '#options' => $plugin_labels,
      '#default_value' => $config->get('system'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * Array Walk callback.
   */
  private function walkCallback(&$val, $key) {
    return $val['label'];
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('tasklist.settings')
      ->set('system', $form_state->getValue('system'))
      ->save();
  }

}

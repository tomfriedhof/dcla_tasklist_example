<?php
/**
 * Created by PhpStorm.
 * User: tomfriedhof
 * Date: 8/26/16
 * Time: 10:42 PM
 */

namespace Drupal\tasklist\Plugin\Tasklist;


use Drupal\tasklist\Plugin\TasklistBase;

/**
 * Class Jira
 * @package Drupal\tasklist\Plugin\Tasklist
 *
 * @Tasklist(
 *     id = "jira",
 *     label = "Atlassian Jira"
 * )
 */

class Jira extends TasklistBase
{
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
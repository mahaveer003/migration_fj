<?php
/**
 * Created by PhpStorm.
 * User: mahaveer
 * Date: 29/6/16
 * Time: 4:35 PM
 */

namespace Drupal\migration_fj\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Content source from database.
 *
 * @MigrateSource(
 *   id = "fj_content"
 * )
 */
class FjContent extends SqlBase{
  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('post', 'post')
      ->fields('post', ['pid', 'title']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = array(
      'id' => $this->t('Content Id'),
      'title' => $this->t('Content Title'),
    );
    return $fields;
  }
  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return array(
      'pid' => array(
        'type' => 'integer',
        'alias' => 'post',
      ),
    );
  }
  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    if (parent::prepareRow($row) === FALSE) {
      return FALSE;
    }
  }
}

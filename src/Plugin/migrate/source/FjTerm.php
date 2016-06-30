<?php
/**
 * @file
 * Contains \Drupal\migration_fj\Plugin\migrate\source\FjTerm.
 */

namespace Drupal\migration_fj\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Tags source from database.
 *
 * @MigrateSource(
 *   id = "fj_term"
 * )
 */
class FjTerm extends SqlBase {
  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('category', 'category')
      ->fields('category', ['category']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = array(
      'category' => $this->t('Category name'),
    );
    return $fields;
  }
  /**
   * {@inheritdoc}
   */
  public function getIds() {
    // We can use the category name as a unique string id.
    return array(
      'category' => array(
        'type' => 'string',
        'alias' => 'category',
      ),
    );
  }
}
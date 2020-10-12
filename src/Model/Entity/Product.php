<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property float|null $price
 * @property int|null $point
 * @property int $amount
 * @property string $slug
 * @property string $product_info
 * @property string $type_product
 * @property int $id_trademark
 * @property int $id_category
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'image' => true,
        'price' => true,
        'point' => true,
        'amount' => true,
        'slug' => true,
        'product_info' => true,
        'type_product' => true,
        'id_trademark' => true,
        'id_category' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
    ];
}

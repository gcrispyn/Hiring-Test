<?php
namespace SSENSE\HiringTest\Models;

class Product extends BaseModel
{
    const GET_CANADIAN_PRODUCTS_REQUEST = <<<SQL
SELECT p.id, p.name as name, ca.name as category, s.quantity, REPLACE(cur.format, '%s', pr.price) as price
FROM products p
JOIN prices pr ON pr.product_id = p.id
JOIN countries c ON (c.id = pr.country_id AND c.code = :code)
JOIN currencies cur ON (c.currency_id = cur.id)
JOIN categories ca ON (p.category_id = ca.id)
JOIN stocks s ON s.product_id = p.id AND s.quantity > 0
SQL;
    /**
     * Name of the table to use for the queries
     * 
     * @var string
     */
    protected $tableName = 'products';
    
    public function getProductsByCountryCode($code)
    {
        $stmt = $this->connexion->prepare(static::GET_CANADIAN_PRODUCTS_REQUEST);
        $stmt->bindValue('code', $code);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

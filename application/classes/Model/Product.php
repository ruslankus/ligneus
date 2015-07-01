<?php defined('SYSPATH') or die('No direct script access.');

class Model_Product extends ORM {
    
    protected $_has_many = array(       
        
        'images' => array(
            'model' => 'Prodimage',
            'foreign_key' => 'prod_id',
        ),
    );
    
    protected $_belongs_to = array(
        
        'category'  => array(
               'model'       => 'Category',
               'foreign_key' => 'cat_id',
          ),
    );

}
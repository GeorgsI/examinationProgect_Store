<?php
namespace app\models;
use \PDO;
class PageCategoryList extends Model{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        //$this->data = 'Данные страницы Promo';
        //include_once('settings.php');
       
        
        
        
        
        
      
        $goodsCount = "SELECT COUNT(*) FROM goods, category WHERE goods.category_id_category = $parameters[2] and goods.category_id_category = category.id_category";
        $itemCount = $this->connectDB->countRows($goodsCount);
       
    
        
        /*var_dump((int)$itemCount);
        
        var_dump((int)$itemCount);
        var_dump((int)$parameters);
        var_dump((int)$parameters[3]);*/
        $page = (int)$parameters[3];
        $elemCount = 2;
        

        $count_page = ceil($itemCount / $elemCount);// всего страниц
        $firstNumber = ($page - 1) * $elemCount;
        
        
        
    
        
        
        
        
        $goods ="SELECT goods.id_goods, goods.title_goods, goods.code, goods.YN, goods.priceRose, goods.promoPrise, goods.infoAdd, goods.accessSale_idaccessSale, goods.brends_id_brends, goods.category_id_category, goods.photo, goods.rating, goods.description,
            category.title FROM goods, category WHERE goods.category_id_category = :goods and goods.category_id_category = category.id_category ORDER BY `id_goods` DESC LIMIT ".$firstNumber.",".$elemCount;
        
        
        
        
        
       /* $labels = "SELECT promolabel.label FROM `goods` 
                INNER JOIN kitpromo
                ON goods.id_goods = kitpromo.goods_id_goods
                INNER JOIN promolabel
                ON kitpromo.promoLabel_id_promoLabel = promolabel.id_promoLabel
                WHERE goods.category_id_category = :goods";*/
        
        
        $labels = "SELECT promolabel.label, kitpromo.goods_id_goods FROM `goods` 
                INNER JOIN kitpromo
                ON goods.id_goods = kitpromo.goods_id_goods
                INNER JOIN promolabel
                ON kitpromo.promoLabel_id_promoLabel = promolabel.id_promoLabel
                WHERE goods.category_id_category = :goods";
        
        
        
        
        $allData = [];

        $sql = ["goods"=>$goods, "labels"=>$labels];
        $arguments = ['goods'=> (int)$parameters[2]]; 
        
        echo $parameters[2];
        forEach($sql as $key => $value){
            $request = $this->connectDB->$action($value, $arguments);
            $allData += [$key => $request];
        }
        
        $allData += ["count" => $count_page];
        $allData += ["currentPage" => $parameters[3]];
        $this->data =  $allData ;
        
        
        
        
    }
    
    
   

    public function getData()
    {
        return $this->data;
    }   
}

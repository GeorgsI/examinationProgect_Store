<?php
namespace app\controllers;

class Admin {
    private $page = 'Page1';//имя страницы по умолчанию page1
    private $action = 'read'; //CRUD-операции, по умолчанию read
    private $parameters; //массив остальных параметров запроса
    
    
    
    public function __construct($arr)
    {
        $this->parameters = $arr;
        $this->analyzeRequest($this->parameters);
    }
    
    
    protected function analyzeRequest()
    { 
        //var_dump($this->parameters);
        if (!empty($this->parameters[0]))
        { 
            $this->page = $this->parameters[0];
            unset($this->parameters[0]);
        }
        if (!empty($this->parameters[1]))
        {    $method = $this->parameters[1];
            unset($this->parameters[1]);
        }

       
       
        
        $this->$method( $this->action ,$this->parameters, $this->page);
    }

    public function render($action, $params, $class )
    {
        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action,$params);
        
        
        
        //Вид:
        $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
    
    
    public function delit($action, $params, $class)
    {
        
        
        $params = file_get_contents('php://input');
        $class = 'AdminDelit';
        $action = 'delit';
        
     
       
       

        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action, $params);

        //Вид:
        $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
    
    
    
    public function previewInsert($action, $params, $class)
    {
        
        
        $params = file_get_contents('php://input');
        $class = 'previewInsert';
        $action = 'read';
        
     
  
       

        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action, $params);

        
        
        
        //Вид:
        $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
    
    
     public function insert($action, $params, $class)
    {
        
        
        $params = file_get_contents('php://input');
        $class = 'InsertAdmin';
        $action = 'insert';
        
     
   
       

        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action, $params);

        //Вид:
        $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
    
    
    
    
    
    
}

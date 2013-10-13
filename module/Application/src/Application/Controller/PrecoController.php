<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
class PrecoController extends AbstractActionController
{
    public function indexAction() {
    }
    public function selecionarAction() {
        $request = $this->getRequest();
        
        if($request->isPost()) {
            $postData = $request->getPost()->toArray();
        
            $wrapper = new WrapperController();
            $price = $wrapper->getPrice($postData['url']);
        
            return array('preco' => $price);
        }
    }
    
}

?>
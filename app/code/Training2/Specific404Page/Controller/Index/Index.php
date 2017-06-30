<?php
namespace Training2\Specific404Page\Controller\Index;

class Index implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    public function process(\Magento\Framework\App\RequestInterface $request) {
        $requestPath = $request->getOriginalPathInfo();

        $moduleName = 'cms';
        $controllerName = 'noroute';
        $actionName = 'index';

        if (strpos($requestPath, 'catalog/product/view/id') !== false || strpos($requestPath, 'catalog/category/view/id') !== false || strpos($requestPath, 'sales/order/view/order_id') !== false) {

            $moduleName = 'cms';
            $controllerName = 'index';
            $actionName = 'index';

            $request->setModuleName($moduleName)->setControllerName($controllerName)->setActionName($actionName);
            return true;
        } else {
            $request->setModuleName($moduleName)->setControllerName($controllerName)->setActionName($actionName);
            return false;
        }
    }
}

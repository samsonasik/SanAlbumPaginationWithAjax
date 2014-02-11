<?php

namespace SanAlbumPaginationWithAjax\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use SanAlbumPaginationWithAjax\Controller\AlbumController;

class AlbumControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = $serviceLocator->getServiceLocator();
        $controller = new AlbumController(
                            $service->get('FormElementManager')->get('SanAlbumPaginationWithAjax\Form\SearchForm'),
                            $service->get('SanAlbumPaginationWithAjax\Model\AlbumTable')
        );

        return $controller;
    }
}

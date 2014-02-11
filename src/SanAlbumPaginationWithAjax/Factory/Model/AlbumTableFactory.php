<?php

namespace SanAlbumPaginationWithAjax\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use SanAlbumPaginationWithAjax\Model\Album;
use SanAlbumPaginationWithAjax\Model\AlbumTable;

class AlbumTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new Album());

        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $tableGateway =  new TableGateway('album', $dbAdapter, null, $resultSetPrototype);

        $table = new AlbumTable($tableGateway);

        return $table;
    }
}

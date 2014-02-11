<?php
return array(

    'service_manager' => array(
        'factories' => array(
            'SanAlbumPaginationWithAjax\Model\AlbumTable' => 'SanAlbumPaginationWithAjax\Factory\Model\AlbumTableFactory',
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'SanAlbumPaginationWithAjax\Controller\Album' => 'SanAlbumPaginationWithAjax\Factory\Controller\AlbumControllerFactory',
        ),
    ),

    'router' => array(
        'routes' => array(

            'albumajax' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/albumajax[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'SanAlbumPaginationWithAjax\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),

        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'albumPaginationWithAjax' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),

    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../public',
            ),
        ),
    ),
);

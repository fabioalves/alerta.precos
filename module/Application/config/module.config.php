<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
	#definir controllers
	'controllers' => array(
		'invokables' => array(
			'IndexController' => 'Application\Controller\IndexController',
			'PrecoController' => 'Application\Controller\PrecoController'
		),	
	),
	
	# definir rotas
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'      => 'Literal',
                'options'   => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'IndexController',
                        'action'     => 'index',
                    ),
                ),
            ),
        
       		'preco' => array(
       				'type'      => 'segment',
				    'options'   => array(
				        'route'    => '/preco[/:action][/:id]',
				        'constraints' => array(
				            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
				            'id'     => '[0-9]+',
				        ),
				        'defaults' => array(
				            'controller' => 'PrecoController',
				            'action'     => 'index',
				        ),
				    ),
       		),
       		),
    ),
	#definir gerenciador de serviços
	'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
	#definir layouts, erros, exceptions, doctype base
	'view_manager' => array(
			'display_not_found_reason'  => true,
			'display_exceptions'		=> true,
			'doctype'					=> 'HTML5',
			'not_found_template'		=> 'error/404',
			'exception_template'		=> 'error/index',
			'template_map'				=> array(
				'layout/layout'         => __DIR__ .'/../view/layout/layout.phtml',
            	'contato/home/index'    => __DIR__ . '/../view/contato/home/index.phtml',
            	'error/404'             => __DIR__ . '/../view/error/404.phtml',
            	'error/index'           => __DIR__ . '/../view/error/index.phtml',
				),
			'template_path_stack' => array(
					__DIR__ .'/../view',
				),
	),
);

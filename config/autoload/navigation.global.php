<?php

return array(
//     'navigation' => array(
//         'default' => array(
//             array(
//                 'label' => 'Dashboard',
//                 'route' => 'dashboard',
//                 'class' => 'fa fa-home',
//                 'id'    => 2,
//             ),
//             array(
//                 'label' => 'Menu',
//                 'route' => 'menu-main',
//                 'class' => 'fa fa-bars',
//                 'id'    => 4,
//                 'pages' => array(
//                     array(
//                         'label' => 'Lista menu',
//                         'route' => 'menu',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Edycja menu',
//                         'route' => 'menu/edit',
//                         'visibleInPrimary' => false
//                     ),
//                 ),
//             ),
//             array(
//                 'label' => 'Strony',
//                 'route' => 'page-main',
//                 'class' => 'fa fa-file-text-o',
//                 'id'    => 2,
//                 'pages' => array(
//                     array(
//                         'label' => 'Dodaj nową',
//                         'route' => 'page/create',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Lista stron',
//                         'route' => 'page',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Edycja strony',
//                         'route' => 'page/edit',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Usuwanie strony',
//                         'route' => 'page/delete',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                 ),
//             ),
//             array(
//                 'label' => 'Wpisy',
//                 'route' => 'post-main',
//                 'class' => 'fa fa-quote-right',
//                 'id'    => 2,
//                 'pages' => array(
//                     array(
//                         'label' => 'Lista newsów',
//                         'route' => 'post',
//                         'params' => array('category' => 'news'),
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Tworzenie newsa',
//                         'route' => 'post/create',
//                         'params' => array('category' => 'news'),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja newsa',
//                         'route' => 'post/edit',
//                         'params' => array('category' => 'news'),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd newsa',
//                         'route' => 'post/preview',
//                         'params' => array('category' => 'news'),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Lista referencji',
//                         'route' => 'post',
//                         'params' => array('category' => 'testimonials'),
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Tworzenie referencji',
//                         'route' => 'post/create',
//                         'params' => array('category' => 'testimonials'),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja referencji',
//                         'route' => 'post/edit',
//                         'params' => array('category' => 'testimonials'),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd referencji',
//                         'route' => 'post/preview',
//                         'params' => array('category' => 'testimonials'),
//                         'visibleInPrimary' => false
//                     ),
//                 ),
//             ),
//             array(
//                 'label' => 'Slider',
//                 'route' => 'slider-main',
//                 'class' => 'fa fa-picture-o',
//                 'id'    => 2,
//                 'pages' => array(
//                     array(
//                         'label' => 'Dodaj nowy',
//                         'route' => 'slider/create',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Lista sliderów',
//                         'route' => 'slider',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Edycja slidera',
//                         'route' => 'slider/edit',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Usuwanie slidera',
//                         'route' => 'slider/delete',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Lista elementów',
//                         'route' => 'slider/items',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Dodaj nowy element',
//                         'route' => 'slider/items/create',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja elementu',
//                         'route' => 'slider/items/edit',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                 ),
//             ),
//             array(
//                 'label' => 'Użytkownicy',
//                 'route' => 'users-main',
//                 'class' => 'fa fa-users',
//                 'id'    => 4,
//                 'pages' => array(
//                     array(
//                         'label' => 'Dodaj nowy',
//                         'route' => 'users/create',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Lista użytkowników',
//                         'route' => 'users',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Edycja użytkownika',
//                         'route' => 'users/edit',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd użytkownika',
//                         'route' => 'users/preview',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Usuwanie użytkownika',
//                         'route' => 'users/delete',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     )  ,
//                     array(
//                         'label' => 'Zmiana hasła',
//                         'route' => 'users/change-password',
//                         'params' => array(),
//                         'visibleInPrimary' => false
//                     )
//                 ),
//             ),
//             array(
//                 'label' => 'Newsletter',
//                 'route' => 'newsletter-main',
//                 'class' => 'fa fa-envelope-o',
//                 'id'    => 4,
//                 'pages' => array(
//                     array(
//                         'label' => 'Wiadomości',
//                         'route' => 'newsletter',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Tworzenie wiadomości',
//                         'route' => 'newsletter/create',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja wiadomości',
//                         'route' => 'newsletter/edit',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd wiadomości',
//                         'route' => 'newsletter/preview',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Subskrybenci',
//                         'route' => 'newsletter/subscriber-list',
//                         'visibleInPrimary' => true
//                     ),
//                     array(
//                         'label' => 'Tworzenie subskrybenta',
//                         'route' => 'newsletter/subscriber-list/create',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja subskrybenta',
//                         'route' => 'newsletter/subscriber-list/edit',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd subskrybenta',
//                         'route' => 'newsletter/subscriber-list/preview',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Grupy subskrybentów',
//                         'route' => 'newsletter/subscriber-group',
//                         'visibleInPrimary' => true,
//                     ),
//                     array(
//                         'label' => 'Tworzenie grupy',
//                         'route' => 'newsletter/subscriber-group/create',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Edycja grupy',
//                         'route' => 'newsletter/subscriber-group/edit',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Podgląd grupy',
//                         'route' => 'newsletter/subscriber-group/preview',
//                         'visibleInPrimary' => false
//                     ),
//                     array(
//                         'label' => 'Ustawienia',
//                         'route' => 'newsletter/settings',
//                         'visibleInPrimary' => true
//                     ),
//                 ),
//             ),
//         ),
//     ),
//     'service_manager' => array(
//         'factories' => array(
//             'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
//         ),
//     ),
);
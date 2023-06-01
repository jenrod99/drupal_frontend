<?php

namespace Drupal\landing_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LandingModuleController extends ControllerBase
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('session'),
        );
    }

    public function navBar()
    {
        return [
            '#theme' => 'nav_bar_template',
            '#value' => 'GIRASOLES DEL CASTILLO',
            '#landingIsActive' => true,
            '#attached' => [
                'library' => [
                    'landing_module/landing_module',
                ],
            ],
        ];
    }

    public function banner()
    {
        return [
            '#theme' => 'banner_background_template',
            '#attached' => [
                'library' => [
                    'landing_module/landing_module',
                ],
            ],
        ];
    }

    public function houseUnitPhotos()
    {
        $carouselItems = [];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-1.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => 'active'
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-2.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-3.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-4.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-5.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-6.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-7.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-8.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-9.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/houseUnitPhotos/slider-10.jpg',
            'imgTitle' => 'Fachada',
            'imgDescription' => 'Fachada',
            'active' => NULL
        ];
        return [
            '#theme' => 'carousel_template',
            '#carouselItems' => $carouselItems,
            '#attached' => [
                'library' => [
                    'landing_module/landing_module',
                ],
            ],
        ];
    }

    public function housePlansPhotos()
    {
        $carouselItems = [];
        $carouselItems[] = [
            'imgPath' => 'modules/custom/landing/img/housePlansPhotos/slider-1.jpg',
            'imgTitle' => 'Planos',
            'imgDescription' => 'Planos',
            'active' => 'active'
        ];
        return [
            '#theme' => 'carousel_template',
            '#carouselItems' => $carouselItems,
            '#attached' => [
                'library' => [
                    'landing_module/landing_module',
                ],
            ],
        ];
    }

    public function projectDetails()
    {
        return [
            '#theme' => 'project_details_template',
        ];
    }

    public function map()
    {
        return [
            '#theme' => 'map_template',
        ];
    }

    public function mapWelcomeInfo()
    {
        return [
            '#theme' => 'info_template',
            '#title' => 'GIRASOLES DEL CASTILLO',
            '#text' => 'Conoce este gran proyecto pacticipante en la Gran Feria Inmobiliaria 7a edición',
        ];
    }

    public function mapContactInfo()
    {
        return [
            '#theme' => 'info_template',
            '#title' => '¿Te interesa este proyecto?',
            '#text' => 'Ingresa tus datos de contactos y obtén más información',
        ];
    }

    public function mapPlansInfo()
    {
        return [
            '#theme' => 'info_template',
            '#title' => 'Planos',
            '#text' => 'Conoce los planos de este maravilloso proyecto',
        ];
    }

    
    public function footer()
    {
        return [
            '#theme' => 'footer_template',
            '#attached' => [
                'library' => [
                    'landing_module/landing_module',
                ],
            ],
        ];
    }

    public function mapPageContent()
    {
        $build = [];
        $build[] = $this->navBar();
        $build[] = $this->banner();
        $build[] = $this->mapWelcomeInfo();
        $build[] = $this->houseUnitPhotos();
        $build[] = $this->projectDetails();
        $build[] = $this->mapPlansInfo();
        $build[] = $this->housePlansPhotos();
        $build[] = $this->map();
        $build[] = $this->mapContactInfo();
        $build[] = $this->formBuilder()->getForm('Drupal\landing_module\Form\PersonForm');
        $build[] = $this->footer();
        return $build;
    }
};

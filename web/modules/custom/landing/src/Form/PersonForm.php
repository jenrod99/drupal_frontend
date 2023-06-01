<?php

namespace Drupal\landing_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PersonForm extends FormBase
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

    public function getFormId()
    {
        return 'person_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {

        $form['#attributes']['class'][] = 'form-container form-person-container';
        $form['#attributes']['novalidate'][] = 'true';
        $form['person_name'] =
            [
                '#type' => 'textfield',
                '#title' => 'Nombres',
                '#size' => 280,
                '#maxlength' => 280,
                '#minlength' => 8,
                '#required' => TRUE,
                '#pattern' => '^[ a-zA-ZÀ-ÿ\u00f1\u00d1]*$',
                '#attributes' =>  [
                    'class' => ['form-control'],
                ],
            ];

        $form['person_lastname'] =
            [
                '#type' => 'textfield',
                '#title' => 'Apellidos',
                '#size' => 280,
                '#maxlength' => 280,
                '#minlength' => 8,
                '#required' => TRUE,
                '#pattern' => '^[ a-zA-ZÀ-ÿ\u00f1\u00d1]*$',
                '#attributes' =>  [
                    'class' => ['form-control'],
                ],
            ];


        $form['person_email'] =
            [
                '#type' => 'textfield',
                '#title' => 'Correo Electrónico',
                '#size' => 280,
                '#maxlength' => 280,
                '#minlength' => 8,
                '#required' => TRUE,
                '#pattern' => '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
                '#attributes' =>  [
                    'class' => ['form-control'],
                ],
            ];

        $form['person_phone'] =
            [
                '#type' => 'textfield',
                '#title' => 'Nombre Completo',
                '#size' => 280,
                '#maxlength' => 280,
                '#minlength' => 8,
                '#required' => TRUE,
                '#pattern' => '^\d+(\.\d+)*$',
                '#attributes' =>  [
                    'class' => ['form-control'],
                ],
            ];

        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => 'Continuar',
            '#attributes' => [
                'class' => ['primary-button']
            ]
        ];

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (strlen($form_state->getValue('person_name')) < 5) {
            $form_state->setErrorByName('person_name', 'El nombre debe contener al menos 8 caracteres');
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
    }
}

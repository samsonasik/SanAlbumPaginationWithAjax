<?php

namespace SanAlbumPaginationWithAjax\Form;

use Zend\Form\Form;

class SearchForm extends Form
{
    public function init()
    {
        $this->setAttribute('method', 'GET');

        $this->add(array(
            'name' => 'keyword',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'keyword'
            ),
        ));

        $this->add(array(
            'name' => 'Search',
            'type' => 'Submit',
            'attributes' => array(
               'type'  => 'submit',
               'value' => 'Search',
            ),
        ));
    }
}

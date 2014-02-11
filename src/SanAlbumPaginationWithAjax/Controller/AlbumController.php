<?php

namespace SanAlbumPaginationWithAjax\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class AlbumController extends AbstractActionController
{
    protected $searchForm;
    protected $albumTable;

    protected $acceptCriteria = array(
      'Zend\View\Model\JsonModel' => array('application/json'),
      'Zend\View\Model\ViewModel' => array('text/html'),
    );

    public function __construct($searchForm, $albumTable)
    {
        $this->searchForm = $searchForm;
        $this->albumTable = $albumTable;
    }

    public function indexAction()
    {
        $viewModel = $this->acceptableViewModelSelector($this->acceptCriteria);

        // Potentially vary execution based on model returned
        if ($viewModel instanceof JsonModel) {
            $keyword = $this->params()->fromQuery('keyword', '');

            $paginator = $this->albumTable->fetchAll(true, $keyword);
            $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
            $paginator->setItemCountPerPage(2);

            $viewModel->setVariable('paginator', $paginator);
            $viewModel->setVariable('paginator_previous', isset($paginator->getPages()->previous) ? true : false);
            $viewModel->setVariable('paginator_lastPageInRange', $paginator->getPages()->lastPageInRange);
            $viewModel->setVariable('paginator_current', $paginator->getPages()->current);
            $viewModel->setVariable('paginator_next', isset($paginator->getPages()->next) ? $paginator->getPages()->next : false);
        } else {
            $viewModel->setVariable('form', $this->searchForm);
        }

        return $viewModel;
    }
}

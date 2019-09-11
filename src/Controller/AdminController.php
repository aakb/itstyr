<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;

class AdminController extends EasyAdminController
{
    public function dashboardAction()
    {
        $this->dispatch(EasyAdminEvents::PRE_LIST);

        $fields = $this->entity['list']['fields'];
        $paginator = $this->findAll($this->entity['class'], $this->request->query->get('page', 1), $this->entity['list']['max_results'], $this->request->query->get('sortField'), $this->request->query->get('sortDirection'), $this->entity['list']['dql_filter']);

        $this->dispatch(EasyAdminEvents::POST_LIST, ['paginator' => $paginator]);

        $it = $paginator->getCurrentPageResults();
        $themes = [];
        $categories = [];
        while ($it->valid()) {
            $entity = $it->current();
            $theme = $entity->getTheme();
            if (isset($theme) && !array_key_exists($theme->getId(), $themes)) {
                $themes[$theme->getId()] = $theme;
                foreach ($theme->getOrderedCategories() as $category) {
                    $categories[$category->getId()] = $category;
                }
            }
            $it->next();
        }

        $parameters = [
            'paginator' => $paginator,
            'themes' => $themes,
            'categories' => $categories,
            'fields' => $fields,
            'batch_form' => $this->createBatchForm($this->entity['name'])->createView(),
            'delete_form_template' => $this->createDeleteForm($this->entity['name'], '__id__')->createView(),
        ];

        return $this->executeDynamicMethod('render<EntityName>Template', ['dashboard', 'dashboard.html.twig', $parameters]);
    }
}

<?php

namespace App\Controller;

use App\Repository\ReportRepository;
use App\Repository\ThemeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller
 *
 * @Route("/dash", name="dash_")
 */
class DashboardController extends AbstractController {
    /**
     * @Route("/report", name="report", methods={"GET"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Repository\ReportRepository $reportRepository
     * @param \Knp\Component\Pager\PaginatorInterface $paginator
     * @param \App\Repository\ThemeRepository $themeRepository
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        Request $request,
        ReportRepository $reportRepository,
        PaginatorInterface $paginator,
        ThemeRepository $themeRepository,
        FormFactoryInterface $formFactory
    ): Response {
        $qb = $reportRepository->createQueryBuilder('e');
//        $qb->andWhere('e.id = 1');

        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $request->query->get('page', 1),
            10
        );

        $items = $pagination->getItems();

        $themes = [];
        $categories = [];

        foreach ($items as $item) {
            $theme = $item->getTheme();

            if ($theme == null) {
                continue;
            }

            foreach ($theme->getOrderedCategories() as $category) {
                $categories[$category->getId()] = $category;
            }
        }

        return $this->render(
            'dashboard.html.twig',
            [
                'pagination' => $pagination,
                'items' => $items,
                'themes' => $themes,
                'categories' => $categories,
            ]
        );
    }
}

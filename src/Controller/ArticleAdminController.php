<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.20
 * Time: 09:18
 */

namespace App\Controller;


use App\Entity\Article;
use App\Form\ArticleFormType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(ArticleFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var Article $article
             */
            $article = $form->getData();
            $article->setAuthor('Autorius Naujasis');

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Article Created!');

            return $this->redirectToRoute('admin_article_list');
        }

        return $this->render('article_admin/new.html.twig', [
            'articleForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/article", name="admin_article_list")
     */
    public function list(ArticleRepository $articleRepo)
    {
        $articles = $articleRepo->findAll();

        return $this->render('article_admin/list.html.twig', [
           'articles' => $articles
        ]);
    }

}
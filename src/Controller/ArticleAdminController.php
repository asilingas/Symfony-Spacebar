<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.20
 * Time: 09:18
 */

namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em)
    {
        die('to do');

        return new Response(sprintf(
            'Hi New article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }
}
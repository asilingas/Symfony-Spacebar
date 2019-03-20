<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.20
 * Time: 20:34
 */

namespace App\Form;


use App\Entity\Article;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'help' => 'Choose something catchy!'
            ])
            ->add('content')
            ->add('recaptcha', EWZRecaptchaType::class, [
                'language' => 'lv',
                'mapped' => false,
                'constraints' => [
                    new IsTrue()
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class
        ]);
    }

}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $questions = [
            [
                'id' => '1',
                'title' => "Quel est le dernier livre qui vous a captivé ?",
                'content'=>  "Partagez avec nous votre expérience de lecture du dernier livre qui vous a vraiment captivé. Que ce soit un thriller 
                            palpitant, un roman émouvant, ou une œuvre de fiction fascinante, nous sommes impatients d'entendre vos impressions 
                            et recommandations !", 
                'rating' => 20,
                'author' => [
                    'name' => 'Jean-Jacque',
                    'avatar' =>  'https://randomuser.me/api/portraits/men/62.jpg' 
                ],
                'nbrResponse' => 6,          
            ],
            [
                'id' => '2',
                'title' => "Quel personnage littéraire vous inspire le plus ?",
                'content'=>  "Nous avons tous rencontré des personnages dans les livres qui ont laissé une marque indélébile sur nous. Partagez-nous le personnage qui vous inspire le plus et dites-nous en quoi il vous a touché ou influencé. Que ce soit un héros courageux, un anti-héros complexe ou un personnage historique, nous sommes curieux de connaître vos choix !",
                'rating' => -12,
                'author' => [
                    'name' => 'Alfred',
                    'avatar' => 'https://randomuser.me/api/portraits/men/72.jpg'   
                ],
                'nbrResponse' => 4, 
            ],
            [
                'id' => '3',
                'title' => "Quel livre recommanderiez-vous à un ami en ce moment ?",
                'content'=> "Imaginez que vous avez un ami qui cherche un nouveau livre à lire. Quel livre recommanderiez-vous en ce moment et pourquoi ? Qu'il s'agisse d'un classique intemporel, d'un best-seller contemporain ou d'une découverte littéraire méconnue, partagez avec nous ce livre qui, selon vous, mérite d'être découvert par d'autres lecteurs !",
                'rating' => 0,
                'author' => [
                    'name' => 'Denise',
                    'avatar' => 'https://randomuser.me/api/portraits/women/24.jpg'  
                ],
                'nbrResponse' => 9, 
            ]
        ];
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}

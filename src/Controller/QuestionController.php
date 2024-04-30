<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    #[Route('/question/ask', name: 'question_form')]
    public function index(Request $request, EntityManagerInterface  $em): Response
    {
        $question = new Question();
        $formQuestion = $this->createForm(QuestionType::class, $question);

        $formQuestion->handleRequest($request);

        if($formQuestion->isSubmitted() && $formQuestion->isValid()){
            $question->setNbrOfResponse(0);
            $question->setRating(0);
            $question->setCreatedAt(new \DateTimeImmutable());
            $em->persist($question);
            $em->flush();
            $this->addFlash('success','Votre question a été ajoutée');

            return $this->redirectToRoute('home');

        }

        return $this->render('question/index.html.twig', [
            'form' => $formQuestion->createView(),
        ]);
    }

    #[Route('/question/{id}', name: 'question_show')]
    public function show(Request $request, string $id): Response
    {
        $question=            [
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
        ];

        return $this->render('question/show.html.twig', [
            'question' => $question,
        ]);
    }
}

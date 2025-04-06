<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/student')]
final class StudentController extends AbstractController
{
    #[Route(name: 'app_student_index', methods: ['GET'])]
    public function index(Request $request, StudentRepository $studentRepository, PaginatorInterface $paginator): Response
    {
        $queryBuilder = $studentRepository->createQueryBuilder('s')
            ->leftJoin('s.department', 'd') // якщо є зв'язок
            ->addSelect('d');

        if ($request->query->get('name')) {
            $queryBuilder->andWhere('s.name LIKE :name')
                ->setParameter('name', '%' . $request->query->get('name') . '%');
        }

        if ($request->query->get('email')) {
            $queryBuilder->andWhere('s.email LIKE :email')
                ->setParameter('email', '%' . $request->query->get('email') . '%');
        }

        if ($request->query->get('birthDate')) {
            $queryBuilder->andWhere('s.birthDate = :birthDate')
                ->setParameter('birthDate', $request->query->get('birthDate'));
        }

        if ($request->query->get('department')) {
            $queryBuilder->andWhere('d.name LIKE :department')
                ->setParameter('department', '%' . $request->query->get('department') . '%');
        }

        $itemsPerPage = $request->query->getInt('itemsPerPage', 5);
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            $itemsPerPage
        );

        return $this->render('student/index.html.twig', [
            'pagination' => $pagination,
            'itemsPerPage' => $itemsPerPage,
        ]);
    }

    #[Route('/new', name: 'app_student_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($student);
            $entityManager->flush();

            return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('student/new.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_student_show', methods: ['GET'])]
    public function show(Student $student): Response
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_student_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Student $student, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('student/edit.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_student_delete', methods: ['POST'])]
    public function delete(Request $request, Student $student, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $student->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
    }
}

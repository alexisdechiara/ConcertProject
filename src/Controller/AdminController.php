<?php

namespace App\Controller;

use App\Form\BandFormType;
use App\Form\ProfileFormType;
use App\Repository\ArtistRepository;
use App\Repository\BandRepository;
use App\Repository\ConcertRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{

    #[Route('/dashboard', name: 'adminDashboard')]
    public function dashboard(BandRepository $bands, UserRepository $users, ConcertRepository $concerts, ArtistRepository $artists): Response
    {
        $tables['users'] = ['name' => 'Users', 'values' => $users->findAll()];
        $tables['artists'] = ['name' => 'Artists', 'values' => $artists->findAll()];
        $tables['bands'] = ['name' => 'Bands', 'values' => $bands->findAll()];
        $tables['concerts'] = ['name' => 'Concerts', 'values' => $concerts->findAll()];

        $months = $users->countByMonthRegistration();

        for ($i = 1; $i <= 12; $i++) {
            $registrations [$i] = 0;
        }

        foreach ($months as $month) {
            $registrations[$month['monthNumber']] = intval($month['value']);
        }

        //echo '<pre>'; print_r($registrations); echo '</pre>';

        return $this->render('admin/dashboard.html.twig', [
            'tables' => $tables,
            'r' => $registrations,
        ]);
    }

    
    #[Route('/bands', name: 'adminBands')]
    public function bands(BandRepository $bands): Response
    {
        return $this->render('admin/bands.html.twig', [
            'title' => 'Bands',
            'bands' => $bands->findBy(array(), array('name' => 'ASC'))
        ]);
    }

    #[Route('/concerts', name: 'adminConcerts')]
    public function concert(ConcertRepository $concerts): Response
    {
        return $this->render('admin/concerts.html.twig', [
            'concerts' => $concerts->findBy(array(), array('name' => 'ASC'))
        ]);
    }

    #[Route('/artists', name: 'adminArtists')]
    public function artists(ArtistRepository $artists): Response
    {
        return $this->render('admin/artists.html.twig', [
            'title' => 'Artists',
            'artists' => $artists->findBy(array(), array('stageName' => 'ASC'))
        ]);
    }

    #[Route('/users', name: 'adminUsers')]
    public function users(UserRepository $users): Response
    {
        return $this->render('admin/users.html.twig', [
            'title' => 'Users',
            'users' => $users->findBy(array(), array('creationDate' => 'DESC'))
        ]);
    }
}

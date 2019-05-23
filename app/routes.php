<?php

// Home
$app->get(
    '/',
    function($request, $response)
    {
        $viewData = [];

        return $this->view->render($response, 'pages/home.twig', $viewData);
    }
)->setName('home');

// Projects
$app->get(
    '/projects',
    function($request, $response)
    {
        // Fetch promotions
        $query = $this->db->query('SELECT * FROM projects');
        $projects = $query->fetchAll();

        $viewData = [];
        $viewData['projects'] = $projects;

        return $this->view->render($response, 'pages/projects.twig', $viewData);
    }
)->setName('projects');

// Promotion
$app->get(
    '/promotions/{year:[0-9]{4}}',
    function($request, $response, $arguments)
    {
        $viewData = [];

        return $this->view->render($response, 'pages/promotion.twig', $viewData);
    }
)->setName('promotion');

// Random Student
$app->get(
    '/students/random',
    function($request, $response)
    {
        return 'Random_student';
    }
)->setName('random_student');

// Student
$app->get(
    '/students/{slug:[a-z0-9_-]+}',
    function($request, $response, $arguments)
    {
        $viewData = [];

        return $this->view->render($response, 'pages/student.twig', $viewData);
    }
)->setName('student');
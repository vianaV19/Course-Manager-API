<?php

use App\Models\Course;

require __DIR__ . './vendor/autoload.php';

require __DIR__ . './App/Container.php';

$container->get('db');

// DATABASE INSERT VALUES
$records = [
    [
        'name' => 'Angular CLI',
        'description' => 'Neste curso, os alunos irão obter um grande conhecimento nos principais recursos do CLI.',
        'duration' => 120,
        'code' => 'XLF-1212',
        'rating' => 3,
        'price' => 12.99,
        'imageUrl' => '/assets/images/cli.png'
    ],
    [
        'name' => 'Angular=> Forms',
        'description' => 'Neste curso, os alunos irão obter um conhecimento aprofundado sobre os recursos disponíveis no módulo de Forms.',
        'duration' => 80,
        'code' => 'DWQ-3412',
        'rating' => 3.5,
        'price' => 24.99,
        'imageUrl' => '/assets/images/forms.png'
    ],
    [
        'name' => 'Angular: HTTP',
        'description' => 'Neste curso, os alunos irão obter um conhecimento aprofundado sobre os recursos disponíveis no módulo de HTTP.',
        'duration' => 80,
        'code' => 'QPL-0913',
        'rating' => 4.0,
        'price' => 36.99,
        'imageUrl' => '/assets/images/http.png',
    ],
    [
        'name' => 'Angular: Router',
        'description' => 'Neste curso, os alunos irão obter um conhecimento aprofundado sobre os recursos disponíveis no módulo de Router.',
        'duration' => 80,
        'code' => 'OHP-1095',
        'rating' => 4.5,
        'price' => 46.99,
        'imageUrl' => '/assets/images/router.png',
    ],
    [
        'name' => 'Angular: Animations',
        'description' => 'Neste curso, os alunos irão obter um conhecimento aprofundado sobre os recursos disponíveis sobre Animation.',
        'duration' => 80,
        'code' => 'PWY-9381',
        'rating' => 5,
        'price' => 56.99,
        'imageUrl' => '/assets/images/animations.png',
    ]
];


foreach($records as $record){
    $course = Course::create($record);
}


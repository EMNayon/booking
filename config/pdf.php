<?php
return [
    // ...
    'format' => 'A4-P',
    'autoScriptToLang' => true,
    'autoLangToFont' => true,
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'nirmala' => [
            //'R'  => 'Nirmala.ttf',
            'R'  => 'SolaimanLipi.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75, // regular font
        ],
//        'Bangla' => [
//            'R'  => 'Bangla.ttf',
//            'useOTL' => 0xFFFF,
////            'useKashida' => 75, // regular font
//        ],
//        'SutonnyMJ Regular' => [
//            'R' => 'SutonnyMJ Regular.ttf',
//            'useOTL' => 0xFF,
//            'useKashida' => 75, // regular font
//        ],
//        'kalpurush' => [
//            'R' => 'kalpurush.ttf',
//        ],
//        'BanglapediaII' => [
//            'R' => 'BanglapediaII.ttf',
//            'useOTL' => 0xFF,
//            'useKashida' => 75, // regular font
//        ],
        'SolaimanLipi' => [
            'R' => 'SolaimanLipi.ttf',
            'B' => 'SolaimanLipi_Bold.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75, // regular font
//            'mode' => 'utf-8'
        ]
        // ...add as many as you want.
    ],
    'default_font' => 'SolaimanLipi',
    // ...
];
?>

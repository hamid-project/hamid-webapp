<?php

return [
    'programmes' => [
        'BIT' =>   ['code' => 'BIT',   'name' => '7.300 Bachelor of Information Technology'],
        'GDIT' =>  ['code' => 'GDIT',  'name' => '7.400 Graduate Diploma in Information Technology'],
        'PGDIT' => ['code' => 'PGDIT', 'name' => '7.500 Postgraduate Diploma in Information Technology'],
    ],

    'specialisations' => [
        ['code' => 'SD', 'name' => 'Software Development'],
        ['code' => 'CN', 'name' => 'Computer Networks'],
        ['code' => 'IS', 'name' => 'Information Systems'],
        ['code' => 'NS', 'name' => 'Networks and Security'],
    ],

    'semesters' => [
        ['code' => '2019S3', 'name' => 'Semester 3, 2019','year' => 2019, 'semester' => 3, 'start' => '2019/09/09', 'finish' => '2019/12/13'],
        ['code' => '2019S2', 'name' => 'Semester 2, 2019','year' => 2019, 'semester' => 2, 'start' => '2019/05/20', 'finish' => '2019/08/23'],
        ['code' => '2019S1', 'name' => 'Semester 1, 2019','year' => 2019, 'semester' => 1, 'start' => '2019/01/29', 'finish' => '2019/05/03'],
        ['code' => '2018S3', 'name' => 'Semester 3, 2018','year' => 2018, 'semester' => 3, 'start' => '2018/09/10', 'finish' => '2018/12/14'],
        ['code' => '2018S2', 'name' => 'Semester 2, 2018','year' => 2018, 'semester' => 3, 'start' => '2018/09/10', 'finish' => '2018/12/14'],
        ['code' => '2018S1', 'name' => 'Semester 1, 2018','year' => 2018, 'semester' => 3, 'start' => '2018/09/10', 'finish' => '2018/12/14'],
    ],

    'areas' => [
        ['code' => 'ANYWHERE_AUCKLAND', 'name' => 'Anywhere in Auckland'],
        ['code' => 'AUCKLAND_CBD',      'name' => 'Auckland CBD'],
        ['code' => 'NORTH_SHORE',       'name' => 'North Shore'],
        ['code' => 'EAST_AUCKLAND',     'name' => 'East Auckland'],
        ['code' => 'SOUTH_AUCKLAND',    'name' => 'South Auckland'],
        ['code' => 'WEST_AUCKLAND',     'name' => 'West Auckland'],
    ],

    'transportations' => [
        ['code' => 'WALK',  'name' => 'Walk'],
        ['code' => 'MYCAR', 'name' => 'Car'],
        ['code' => 'BUS',   'name' => 'Bus'],
        ['code' => 'TRAIN', 'name' => 'Train'],
        ['code' => 'OTHER', 'name' => 'Other'],
    ],

    'internships' => [
        'internships' => [
            'statuses' => [
                ['code' => 'OPEN', 'name' => 'Open'],
                ['code' => 'CLOSED', 'name' => 'Closed'],
            ],
        ],
        'applications' => [
            'statuses' => [
                ['code' => 'PENDING',      'name' => 'Pending'],
                ['code' => 'INTERVIEWING', 'name' => 'Interviewing'],
                ['code' => 'DECLINED',     'name' => 'Declined'],
                ['code' => 'PLACED',       'name' => 'Placed'],
                ['code' => 'PLACED_EXTENDED',       'name' => 'Placed (Extended)'],
                ['code' => 'COMPLETED',    'name' => 'Completed'],
            ],
            'outcomes' => [
                ['code' => '',  'name' => 'N/A'],
                ['code' => 'NOT_YET',  'name' => 'Not yet'],
                ['code' => 'PASSED',   'name' => 'Passed'],
                ['code' => 'FAILED',   'name' => 'Failed'],
                ['code' => 'EXTENDED', 'name' => 'Extended'],
                ['code' => 'PLACED',       'name' => 'Placed'],
                ['code' => 'COMPLETED',    'name' => 'Completed'],
                ['code' => 'OTHER',    'name' => 'Other'],
            ],
            'statuses_outcomes' => [
                [
                    'code' => 'PENDING',
                    'name' => 'Pending',
                    'outcomes' => [],
                ],
                [
                    'code' => 'INTERVIEWING',
                    'name' => 'Interviewing',
                    'outcomes' => [],
                ],
                [
                    'code' => 'DECLINED',
                    'name' => 'Declined',
                    'outcomes' => [],
                ],
                [
                    'code' => 'PLACED',
                    'name' => 'Placed',
                    'outcomes' => [],
                ],
                [
                    'code' => 'PLACED_EXTENDED',
                    'name' => 'Placed (Extended)',
                    'outcomes' => [],
                ],
                [
                    'code' => 'COMPLETED',
                    'name' => 'Completed',
                    'outcomes' => [
                        ['code' => 'PASSED',   'name' => 'Passed'],
                        ['code' => 'FAILED',   'name' => 'Failed'],
                    ],
                ],
            ],
        ],
    ],

    'communication' => [
        'contacts' => [
            'methods' => [
                [
                    'code' => 'LETTER',
                    'name' => 'Letter',
                    'labels' => [],
                ],
                [
                    'code' => 'EMAIL',
                    'name' => 'Email',
                    'labels' => [
                        ['code' => 'TEMPLATE1', 'name' => 'Template #1'],
                        ['code' => 'TEMPLATE2', 'name' => 'Template #2'],
                        ['code' => 'TEMPLATE3', 'name' => 'Template #3'],
                        ['code' => 'TEMPLATE4', 'name' => 'Template #4'],
                        ['code' => 'TEMPLATE5', 'name' => 'Template #5'],
                        ['code' => 'TEMPLATE6', 'name' => 'Template #6'],
                        ['code' => 'TEMPLATE7', 'name' => 'Template #7'],
                        ['code' => 'TEMPLATE8', 'name' => 'Template #8'],
                    ],
                ],
                [
                    'code' => 'PHONE',
                    'name' => 'Phone',
                    'labels' => [],
                ],
            ],
        ],
    ],
];


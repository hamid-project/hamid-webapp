<?php

use Illuminate\Database\Seeder;
use App\BaseModel;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $initialData = [
            App\User::class => [
                ['name' => 'neda',   'password' => 'password', 'email' => 'neda@ais.ac.nz',],
                ['name' => 'mike',   'password' => 'password', 'email' => 'michaelw@ais.ac.nz',],
                ['name' => 'karwen', 'password' => 'password', 'email' => 'karwenc@ais.ac.nz',],
            ],

            App\Admin::class => [
                [
                    'user' => 'neda',
                    'name_first' => 'Neda',
                    'name_middle' => '',
                    'name_last' => 'Hamid',
                    'contact_email1' => 'nedah@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'user' => 'mike',
                    'name_first' => 'Michael',
                    'name_middle' => '',
                    'name_last' => 'Watts',
                    'contact_email1' => 'michaelw@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'user' => 'karwen',
                    'name_first' => 'Kar',
                    'name_middle' => 'Wen',
                    'name_last' => 'Choe',
                    'contact_email1' => 'karwenc@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
            ],

            App\Supervisor::class => [
                [
                    'name_first' => 'Neda',
                    'name_middle' => '',
                    'name_last' => 'Hamid',
                    'contact_email1' => 'nedah@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Saghir',
                    'name_middle' => '',
                    'name_last' => 'Ahmad',
                    'contact_email1' => 'saghira@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Kourosh',
                    'name_middle' => '',
                    'name_last' => 'Ahmad',
                    'contact_email1' => 'kourosha@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Havea',
                    'name_middle' => 'Hikule\'o',
                    'name_last' => 'Fonua',
                    'contact_email1' => 'haveaf@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Rakesh',
                    'name_middle' => '',
                    'name_last' => 'Kumar',
                    'contact_email1' => 'rakeshk@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Shuaib',
                    'name_middle' => '',
                    'name_last' => 'Memon',
                    'contact_email1' => 'shuaibm@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Amir',
                    'name_middle' => '',
                    'name_last' => 'Moravejosharieh',
                    'contact_email1' => 'amirm@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
                [
                    'name_first' => 'Christine',
                    'name_middle' => '',
                    'name_last' => 'Tan',
                    'contact_email1' => 'christinet@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                ],
            ],

            App\Student::class => [
                [
                    'code' => '20191554',
                    'name_first' => 'Tadashi',
                    'name_middle' => '',
                    'name_last' => 'Jokagi',
                    'contact_email1' => 'tajo002@ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => 'tadashi.jokagi@gmail.com',
                    'contact_phone2' => '',
                    'enrollment_start_code' => '2018S3',
                    'enrollment_finish_code' => '2019S2',
                    'programme_code' => 'GDIT',
                    'specialisation_code' => 'SD',
                    'potentials' => [
                        'area_codes' => ['NORTH_SHORE'],
                        'specialisation_codes' => ['SD','CN'],
                        'transportation_codes' => ['WALK', 'MYCAR', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'code' => '091804933',
                    'name_first' => 'Rodrigo',
                    'name_middle' => 'MANTUANO',
                    'name_last' => 'BARRADAS',
                    'contact_email1' => 'roma114@ess.ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                    'enrollment_start_code' => '2018S3',
                    'enrollment_finish_code' => '2019S2',
                    'programme_code' => 'GDIT',
                    'specialisation_code' => 'IS',
                    'potentials' => [
                        'area_codes' => ['ANYWHERE_AUCKLAND'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['MYCAR'],
                    ],
                ],
                [
                    'code' => '20180364',
                    'name_first' => 'FIONA',
                    'name_middle' => '',
                    'name_last' => 'MA\'U',
                    'contact_email1' => 'fima003@ess.ais.ac.nz',
                    'contact_phone1' => '09 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                    'enrollment_start_code' => '2018S1',
                    'enrollment_finish_code' => '2019S3',
                    'programme_code' => 'BIT',
                    'specialisation_code' => 'IS',
                    'potentials' => [
                        'areas_code' => ['ANYWHERE_AUCKLAND'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['WALK', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'code' => '20180944',
                    'name_first' => 'ZHENG',
                    'name_middle' => '',
                    'name_last' => 'YANG',
                    'contact_email1' => 'zhya078@ess.ais.ac.nz',
                    'contact_phone1' => '021 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                    'enrollment_start_code' => '2018S3',
                    'enrollment_finish_code' => '2019S2',
                    'programme_code' => 'PGDIT',
                    'specialisation_code' => 'SD',
                    'potentials' => [
                        'areas_code' => ['ANYWHERE_AUCKLAND', 'AUCKLAND_CBD'],
                        'specialisation_codes' => ['SD'],
                        'transportation_codes' => ['MYCAR', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'code' => '20180221',
                    'name_first' => 'AMIR',
                    'name_middle' => '',
                    'name_last' => 'MAHARJAN',
                    'contact_email1' => 'amma203@ess.ais.ac.nz',
                    'contact_phone1' => '021 9999 9999',
                    'contact_email2' => '',
                    'contact_phone2' => '',
                    'enrollment_start_code' => '2018S1',
                    'enrollment_finish_code' => '2020S3',
                    'programme_code' => 'BIT',
                    'specialisation_code' => 'IS',
                    'potentials' => [
                        'areas_code' => ['ANYWHERE_AUCKLAND', 'AUCKLAND_CBD'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['BUS', 'TRAIN'],
                    ],
                ],
            ],

            App\Company::class => [
                [
                    'name' => 'Auckland Institute of Studies',
                    'address' => '28a Linwood Avenue Mt Albert Auckland 1025',
                    'website' => 'https://www.ais.ac.nz/',
                ],
                [
                    'name' => 'Ocean Globe',
                    'address' => '',
                    'website' => '',
                ],
                [
                    'name' => 'Brenton',
                    'address' => '',
                    'website' => '',
                ],
                [
                    'name' => 'InfoTools',
                    'address' => '',
                    'website' => '',
                ],
                [
                    'name' => 'SecOps',
                    'address' => '',
                    'website' => '',
                ],
                [
                    'name' => 'Ivoclar Vivadent Ltd',
                    'address' => '',
                    'website' => '',
                ],
            ],

            App\CompanyStaff::class => [
                [
                    'name_first' => 'Leah',
                    'name_middle' => '',
                    'name_last' => 'Guttenbeil',
                    'contact_email1' => 'studentcareers@ais.ac.nz',
                    'contact_phone1' => '09 815 1717  838',
                    'company' => 'Auckland Institute of Studies',
                    'department' => 'Student Careers Centre',
                    'address' => '28a Linwood Avenue Mt Albert Auckland 1025',
                    'website' => 'https://www.ais.ac.nz/',
                    'acceptance_corporate_gift' => true,
                    'acceptance_internship' => true,
                ],
                [
                    'name_first' => 'Timothy',
                    'name_middle' => '',
                    'name_last' => 'Morgan',
                    'contact_email1' => 'Timothy@oceanglobe.example.com',
                    'contact_phone1' => '09 9999 9999',
                    'company' => 'Ocean Globe',
                    'department' => 'IT Department',
                    'address' => 'Mt Eden Auckland',
                    'website' => 'https://www.example.com/',
                    'acceptance_corporate_gift' => true,
                    'acceptance_internship' => true,
                ],
                [
                    'name_first' => 'Aaryan',
                    'name_middle' => '',
                    'name_last' => 'Robinson',
                    'contact_email1' => 'Robinson@brenton.example.com',
                    'contact_phone1' => '09 9999 9999',
                    'company' => 'Brenton',
                    'department' => 'IT Department',
                    'address' => 'Mt Eden Auckland',
                    'website' => 'https://www.example.com/',
                    'acceptance_corporate_gift' => true,
                    'acceptance_internship' => true,
                ],
            ],

            App\Internship::class => [
                [
                    'name' => 'AIS IT Internship',
                    'description' => 'You will all be nearing completion of your GDIT studies and so we are advertising this position at the moment within AIS regarding an internship.  If you are interested please respond to the Student careers email as this will be a great opportunity for you to get some work experience relating to the field of study you have completed.

 3 Month Non-Academic (Unpaid Internship)

AIS IT Department are seeking GDIT students to join the IT department as part of a 3 month internship.
If you are seeking work experience in this specialised field, inquire today with Leah.
  
Internship will be located between AIS St Helens and Asquith Campus.
 
You will be able to use this experience as work experience on your CV and be given an Internship certificate from AIS IT Department.

Please email your CV to Leah to register your interest.

HOW TO APPLY
Apply to studentcareers@ais.ac.nz',
                    'position' => 'IT Support',
                    'internship_begin' => BaseModel::DATE_MIN,
                    'internship_end' => BaseModel::DATE_MAX,
                    'supervisor' => 'Neda Hamid',
                    'company_staff' => 'Leah Guttenbeil',
                    'number_of_interns' => 1,
                    'status' => App\Internship::STATUS_OPEN,
                    'potentials' => [
                        'area_codes' => ['ANYWHERE_AUCKLAND'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['WALK', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'name' => 'PHP Deverloper Wanted!',
                    'description' => 'Wanted!Wanted!Wanted!',
                    'position' => 'PHP Developer',
                    'internship_begin' => '2019-08-01',
                    'internship_end' => '2019-09-30',
                    'supervisor' => 'Neda Hamid',
                    'company_staff' => 'Timothy Morgan',
                    'number_of_interns' => 2,
                    'status' => App\Internship::STATUS_OPEN,
                    'potentials' => [
                        'area_codes' => ['ANYWHERE_AUCKLAND'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['WALK', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'name' => 'C# Deverloper Wanted!',
                    'description' => 'Wanted!Wanted!Wanted!',
                    'position' => 'C# Developer',
                    'internship_begin' => '2019-08-15',
                    'internship_end' => '2019-09-10',
                    'supervisor' => 'Rakesh Kumar',
                    'company_staff' => 'Timothy Morgan',
                    'number_of_interns' => 1,
                    'status' => App\Internship::STATUS_OPEN,
                    'potentials' => [
                        'area_codes' => ['ANYWHERE_AUCKLAND'],
                        'specialisation_codes' => ['SD'],
                        'transportation_codes' => ['WALK', 'MYCAR', 'BUS', 'TRAIN'],
                    ],
                ],
                [
                    'name' => 'Software Tester Wanted!',
                    'description' => 'Wanted!Wanted!Wanted!',
                    'position' => 'Tester Developer',
                    'internship_begin' => '2019-09-01',
                    'internship_end' => '2019-10-15',
                    'supervisor' => 'Rakesh Kumar',
                    'company_staff' => 'Aaryan Robinson',
                    'number_of_interns' => 5,
                    'status' => App\Internship::STATUS_OPEN,
                    'potentials' => [
                        'area_codes' => ['AUCKLAND_CBD'],
                        'specialisation_codes' => ['IS'],
                        'transportation_codes' => ['WALK', 'BUS', 'TRAIN'],
                    ],
                ],
            ],
            \App\InternshipApplication::class => [
                [
                    'internship' => 'AIS IT Internship',
                    'student' => 'FIONA MA\'U',
                    'status_code' => 'PENDING',
                    'outcome_code' => 'NOT_YET',
                    'notes' => '',
                ],
                [
                    'internship' => 'AIS IT Internship',
                    'student' => 'Rodrigo MANTUANO BARRADAS',
                    'status_code' => 'INTERVIEWING',
                    'outcome_code' => 'NOT_YET',
                    'notes' => '',
                ],
                [
                    'internship' => 'PHP Deverloper Wanted!',
                    'student' => 'Tadashi Jokagi',
                    'status_code' => 'COMPLETED',
                    'outcome_code' => 'PASSED',
                    'notes' => '',
                ],
                [
                    'internship' => 'C# Deverloper Wanted!',
                    'student' => 'ZHENG YANG',
                    'status_code' => 'COMPLETED',
                    'outcome_code' => 'PASSED',
                    'notes' => '',
                ],
                [
                    'internship' => 'Software Tester Wanted!',
                    'student' => 'AMIR MAHARJAN',
                    'status_code' => 'PLACED',
                    'outcome_code' => 'NOT_YET',
                    'notes' => '',
                ],
            ],

            \App\CommunicationGiftHistory::class => [
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Leah Guttenbeil', 'sent_on' => '2019-03-15', 'notes' => 'Books', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Leah Guttenbeil', 'sent_on' => '2019-06-01', 'notes' => 'Books', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Aaryan Robinson', 'sent_on' => '2019-06-01', 'notes' => 'Books', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Aaryan Robinson', 'sent_on' => '2019-06-01', 'notes' => 'Flowers', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Aaryan Robinson', 'sent_on' => '2019-06-03', 'notes' => 'Books', ],
            ],

            \App\CommunicationContactHistory::class => [
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Leah Guttenbeil', 'sent_on' => '2019-06-01', 'method_code' => 'EMAIL', 'label_code' => 'TEMPLATE1', 'notes' => 'Hello', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Aaryan Robinson', 'sent_on' => '2019-06-01', 'method_code' => 'EMAIL', 'label_code' => 'TEMPLATE2', 'notes' => 'Dear', ],
                [ 'admin' => 'Neda Hamid', 'company_staff' => 'Aaryan Robinson', 'sent_on' => '2019-06-01', 'method_code' => 'PHONE', 'label_code' => '', 'notes' => 'Book', ],
            ],
        ];

        $storedData = [];

        foreach ($initialData as $model => $modelInitialRows) {
            foreach ($modelInitialRows as $row) {
                switch ($model) {
                case App\Admin::class:
                    $row['user_id'] = $storedData[\App\User::class][$row['user']]->id;
                    unset($row['user']);
                    break;

                case App\CompanyStaff::class:
                    $row['company_id'] = $storedData[\App\Company::class][$row['company']]->id;
                    unset($row['company']);
                    break;

                case App\CommunicationContactHistory::class:
                case App\CommunicationGiftHistory::class:
                    $row['admin_id'] = $storedData[\App\Admin::class][$row['admin']]->id;
                    $row['company_staff_id'] = $storedData[\App\CompanyStaff::class][$row['company_staff']]->id;
                    unset($row['admin']);
                    unset($row['company_staff']);
                    break;

                case App\Internship::class:
                    $row['supervisor_id'] = $storedData[\App\Supervisor::class][$row['supervisor']]->id;
                    $row['company_staff_id'] = $storedData[\App\CompanyStaff::class][$row['company_staff']]->id;
                    unset($row['supervisor']);
                    unset($row['company_staff']);
                    break;

                case App\InternshipApplication::class:
                    $row['internship_id'] = $storedData[\App\Internship::class][$row['internship']]->id;
                    $row['student_id'] = $storedData[\App\Student::class][$row['student']]->id;
                    unset($row['internship']);
                    unset($row['student']);
                    break;

                }

                echo json_encode($row) . PHP_EOL;
                $obj = new $model;
                $obj->fill($row);
                $obj->save();

                switch ($model) {
                case App\Supervisor::class:
                case App\Admin::class:
                case App\User::class:
                case App\Student::class:
                case App\CompanyStaff::class:
                case App\Company::class:
                case App\Internship::class:
                    $storedData[$model][$obj->name] = $obj;
                    break;

                }
                echo json_encode($obj->toArray()) . PHP_EOL;
            }
        }
    }
}

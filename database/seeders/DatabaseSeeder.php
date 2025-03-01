<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Practicetest;
use App\Models\Question;
use App\Models\Testtype;
use App\Models\Plan;
use App\Models\Countrycode;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $practicetest = [
            ['id_practice_test' => 1, 'practice_test_name' => 'Questions'],
            ['id_practice_test' => 2, 'practice_test_name' => 'Description'],
            ['id_practice_test' => 3, 'practice_test_name' => 'Listening'],
            ['id_practice_test' => 4, 'practice_test_name' => 'Reading'],
        ];

        foreach ($practicetest as $el) {
            Practicetest::create($el);
        }



        $questions = array(
            [
               'question_text' => 'Tell me about you career',
               'img_question' => '',
               'id_time_question' => '120',
               'id_practice_test' => '1',
               'id_test_type' => '1',
               'id_exam_type' => '1',
            
            ],
            [
                'question_text' => 'Tell me about your current job and the activities you have been working on',
                'img_question' => '',
                'id_time_question' => '120',
                'id_practice_test' => '1',
                'id_test_type' => '1',
                'id_exam_type' => '1',
            
            ],
            [
                'question_text' => 'Why are you the best person for the job? Why should we hire you? ',
                'img_question' => '',
                'id_time_question' => '120',
                'id_practice_test' => '1',
                'id_test_type' => '1',
                'id_exam_type' => '1',
                
            ],
            [
                'question_text' => 'Why Are You Leaving or Have Left your current Job?',
                'img_question' => '',
                'id_time_question' => '60',
                'id_practice_test' => '1',
                'id_test_type' => '3',
                'id_exam_type' => '1',
    
            ], 
            [
                'question_text' => 'Where Do You See Yourself in five Years?',
                'img_question' => '',
                'id_time_question' => '60',
                'id_practice_test' => '1',
                'id_test_type' => '3',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'What is the professional achievement you are most proud of?',
                'img_question' => '',
                'id_time_question' => '60',
                'id_practice_test' => '1',
                'id_test_type' => '2',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'What do you think the company or organization you work for could do better in general?',
                'img_question' => '',
                'id_time_question' => '60',
                'id_practice_test' => '1',
                'id_test_type' => '1',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'What is, in your opinion, your greatest strength?',
                'img_question' => '',
                'id_time_question' => '30',
                'id_practice_test' => '1',
                'id_test_type' => '1',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'Do you have any questions for us?',
                'img_question' => '',
                'id_time_question' => '15',
                'id_practice_test' => '1',
                'id_test_type' => '2',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'What Are Your Salary Expectations in Dollars? ',
                'img_question' => '',
                'id_time_question' => '15',
                'id_practice_test' => '1',
                'id_test_type' => '1',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'How well do you handle criticism? ',
                'img_question' => '',
                'id_time_question' => '45',
                'id_practice_test' => '1',
                'id_test_type' => '4',
                'id_exam_type' => '1',
               
            ], 
            [
                'question_text' => 'How long would it take before you make an impact if you started today?',
                'img_question' => '',
                'id_time_question' => '120',
                'id_practice_test' => '1',
                'id_test_type' => '4',
                'id_exam_type' => '1',
               
            ], 
        );
    
        foreach ($questions as $al) {
            Question::create($al);
        }


        $testtype = array(
            [
               'test_type' => '1',
               'test_level' => 'B1',
               'test_type_name' => 'Intermmediate',
            ],
            [
                'test_type' => '2',
                'test_level' => 'B2',
                'test_type_name' => 'Upper Intermmediate',
            ],
            [
                'test_type' => '3',
                'test_level' => 'C1',
                'test_type_name' => 'Advanced',
            ],
            [
                'test_type' => '4',
                'test_level' => 'C2',
                'test_type_name' => 'Proficiency',
            ], 
        );

        foreach ($testtype as $il){
            Testtype::create($il);
        }


        $plans = array(
            [
               'plan_name' => 'Basic',
               'plan_price' => '0',
               'plan_description' => 'You can respond 3 exercises for day(*) and respond unlimited tests!',
            
            ],
            [
                'plan_name' => 'Student',
                'plan_price' => '9.9',
                'plan_description' => 'You can respond unlimited exercises for day, respond unlimited tests, get feedback from teacher or job recruiters!',
            
            ],
            [
                'plan_name' => 'Recruiter / Teacher',
                'plan_price' => '19',
                'plan_description' => 'You can create and send unlimited customized English Level Tests for your students or job candidates!',
            
            ],
            [
                'plan_name' => 'Business',
                'plan_price' => '99',
                'plan_description' => 'If you company have more than 10 Recruiters or Teachers can create and send unlimited English Level Tests for your job candidates / students!',
            
            ], 
        );

        foreach ($plans as $ol){
            Plan::create($ol);
        }


        $countrycode = array(
            [
               'country_name' => 'UK',
               'data_countrycode' => '44',
            ],
            [
                'country_name' => 'USA',
                'data_countrycode' => '1',
             ],
             [
                'country_name' => 'Algeria',
                'data_countrycode' => '213',
             ],
             [
                'country_name' => 'Andorra',
                'data_countrycode' => '376',
             ],
             [
                'country_name' => 'Angola',
                'data_countrycode' => '244',
             ],
             [
                'country_name' => 'Anguilla',
                'data_countrycode' => '1264',
             ],
             [
                'country_name' => 'Antigua Barbuda',
                'data_countrycode' => '1268',
             ],
             [
                'country_name' => 'Argentina',
                'data_countrycode' => '54',
             ],
             [
                'country_name' => 'Armenia',
                'data_countrycode' => '374',
             ],
             [
                'country_name' => 'Aruba',
                'data_countrycode' => '297',
             ],
             [
                'country_name' => 'Australia',
                'data_countrycode' => '61',
             ],
             [
                'country_name' => 'Austria',
                'data_countrycode' => '43',
             ],
             [
                'country_name' => 'Azerbaijan',
                'data_countrycode' => '994',
             ],
             [
                'country_name' => 'Bahamas',
                'data_countrycode' => '1242',
             ],
             [
                'country_name' => 'Bahrain',
                'data_countrycode' => '973',
             ],
             [
                'country_name' => 'Bangladesh',
                'data_countrycode' => '880',
             ],
             [
                'country_name' => 'Barbados',
                'data_countrycode' => '1246',
             ],
             [
                'country_name' => 'Belarus',
                'data_countrycode' => '375',
             ],
             [
                'country_name' => 'Belgium',
                'data_countrycode' => '32',
             ],
             [
                'country_name' => 'Belize',
                'data_countrycode' => '501',
             ],
             [
                'country_name' => 'Benin',
                'data_countrycode' => '229',
             ],
             [
                'country_name' => 'Bermuda',
                'data_countrycode' => '1441',
             ],
             [
                'country_name' => 'Bhutan',
                'data_countrycode' => '975',
             ],
             [
                'country_name' => 'Bolivia',
                'data_countrycode' => '591',
             ],
             [
                'country_name' => 'Bosnia Herzegovina',
                'data_countrycode' => '387',
             ],
             [
                'country_name' => 'Botswana',
                'data_countrycode' => '267',
             ],
             [
                'country_name' => 'Brazil',
                'data_countrycode' => '55',
             ],
             [
                'country_name' => 'Brunei',
                'data_countrycode' => '673',
             ],
             [
                'country_name' => 'Bulgaria',
                'data_countrycode' => '359',
             ],
             [
                'country_name' => 'Burkina Faso',
                'data_countrycode' => '226',
             ],
             [
                'country_name' => 'Burundi',
                'data_countrycode' => '257',
             ],
             [
                'country_name' => 'Cambodia',
                'data_countrycode' => '855',
             ],
             [
                'country_name' => 'Cameroon',
                'data_countrycode' => '237',
             ],
             [
                'country_name' => 'Canada',
                'data_countrycode' => '1',
             ],
             [
                'country_name' => 'Cape Verde Islands',
                'data_countrycode' => '238',
             ],
             [
                'country_name' => 'Cayman Islands',
                'data_countrycode' => '1345',
             ],
             [
                'country_name' => 'Central African Republic',
                'data_countrycode' => '236',
             ],
             [
                'country_name' => 'Chile',
                'data_countrycode' => '56',
             ],
             [
                'country_name' => 'China',
                'data_countrycode' => '86',
             ],
             [
                'country_name' => 'Colombia',
                'data_countrycode' => '57',
             ],
             [
                'country_name' => 'Comoros',
                'data_countrycode' => '269',
             ],
             [
                'country_name' => 'Congo',
                'data_countrycode' => '242',
             ],
             [
                'country_name' => 'Cook Islands',
                'data_countrycode' => '682',
             ],
             [
                'country_name' => 'Costa Rica',
                'data_countrycode' => '506',
             ],
             [
                'country_name' => 'Croatia',
                'data_countrycode' => '385',
             ],
             [
                'country_name' => 'Cuba',
                'data_countrycode' => '53',
             ],
             [
                'country_name' => 'Cyprus North',
                'data_countrycode' => '90392',
             ],
             [
                'country_name' => 'Cyprus South',
                'data_countrycode' => '357',
             ],
             [
                'country_name' => 'Czech Republic',
                'data_countrycode' => '42',
             ],
             [
                'country_name' => 'Denmark',
                'data_countrycode' => '45',
             ],
             [
                'country_name' => 'Djibouti',
                'data_countrycode' => '253',
             ],
             [
                'country_name' => 'Dominica',
                'data_countrycode' => '1809',
             ],
             [
                'country_name' => 'Dominican Republic',
                'data_countrycode' => '1809',
             ],
             [
                'country_name' => 'Ecuador',
                'data_countrycode' => '593',
             ],
             [
                'country_name' => 'Egypt',
                'data_countrycode' => '20',
             ],
             [
                'country_name' => 'El Salvador',
                'data_countrycode' => '503',
             ],
             [
                'country_name' => 'Equatorial Guinea',
                'data_countrycode' => '240',
             ],
             [
                'country_name' => 'Eritrea',
                'data_countrycode' => '291',
             ],
             [
                'country_name' => 'Estonia',
                'data_countrycode' => '372',
             ],
             [
                'country_name' => 'Ethiopia',
                'data_countrycode' => '251',
             ],
             [
                'country_name' => 'Falkland Islands',
                'data_countrycode' => '500',
             ],
             [
                'country_name' => 'Faroe Islands',
                'data_countrycode' => '298',
             ],
             [
                'country_name' => 'Fiji',
                'data_countrycode' => '679',
             ],
             [
                'country_name' => 'Finland',
                'data_countrycode' => '358',
             ],
             [
                'country_name' => 'France',
                'data_countrycode' => '33',
             ],
             [
                'country_name' => 'French Guiana',
                'data_countrycode' => '594',
             ],
             [
                'country_name' => 'French Polynesia',
                'data_countrycode' => '689',
             ],
             [
                'country_name' => 'Gabon',
                'data_countrycode' => '241',
             ],
             [
                'country_name' => 'Gambia',
                'data_countrycode' => '220',
             ],
             [
                'country_name' => 'Georgia',
                'data_countrycode' => '7880',
             ],
             [
                'country_name' => 'Germany',
                'data_countrycode' => '49',
             ],
             [
                'country_name' => 'Ghana',
                'data_countrycode' => '233',
             ],
             [
                'country_name' => 'Gibraltar',
                'data_countrycode' => '350',
             ],
             [
                'country_name' => 'Greece',
                'data_countrycode' => '30',
             ],
             [
                'country_name' => 'Greenland',
                'data_countrycode' => '299',
             ],
             [
                'country_name' => 'Grenada',
                'data_countrycode' => '1473',
             ],
             [
                'country_name' => 'Guadeloupe',
                'data_countrycode' => '590',
             ],
             [
                'country_name' => 'Guam',
                'data_countrycode' => '671',
             ],
             [
                'country_name' => 'Guatemala',
                'data_countrycode' => '502',
             ],
             [
                'country_name' => 'Guinea',
                'data_countrycode' => '224',
             ],
             [
                'country_name' => 'Guinea - Bissau',
                'data_countrycode' => '245',
             ],
             [
                'country_name' => 'Guyana',
                'data_countrycode' => '592',
             ],
             [
                'country_name' => 'Haiti',
                'data_countrycode' => '509',
             ],
             [
                'country_name' => 'Honduras',
                'data_countrycode' => '504',
             ],
             [
                'country_name' => 'Hong Kong',
                'data_countrycode' => '852',
             ],
             [
                'country_name' => 'Hungary',
                'data_countrycode' => '36',
             ],
             [
                'country_name' => 'Iceland',
                'data_countrycode' => '354',
             ],
             [
                'country_name' => 'India',
                'data_countrycode' => '91',
             ],
             [
                'country_name' => 'Indonesia',
                'data_countrycode' => '62',
             ],
             [
                'country_name' => 'Iran',
                'data_countrycode' => '98',
             ],  
             [
               'country_name' => 'Iraq',
               'data_countrycode' => '964',
            ],
            [
               'country_name' => 'Ireland',
               'data_countrycode' => '353',
            ],
            [
               'country_name' => 'Israel',
               'data_countrycode' => '972',
            ],
            [
               'country_name' => 'Italy',
               'data_countrycode' => '39',
            ],
            [
               'country_name' => 'Jamaica',
               'data_countrycode' => '1876',
            ],
            [
               'country_name' => 'Japan',
               'data_countrycode' => '81',
            ],
            [
               'country_name' => 'Jordan',
               'data_countrycode' => '962',
            ],
            [
               'country_name' => 'Kazakhstan',
               'data_countrycode' => '7',
            ],
            [
               'country_name' => 'Kenya',
               'data_countrycode' => '254',
            ],
            [
               'country_name' => 'Kiribati',
               'data_countrycode' => '686',
            ],
            [
               'country_name' => 'Korea North',
               'data_countrycode' => '850',
            ],
            [
               'country_name' => 'Korea South',
               'data_countrycode' => '82',
            ],
            [
               'country_name' => 'Kuwait',
               'data_countrycode' => '965',
            ],           
            [
               'country_name' => 'Kyrgyzstan',
               'data_countrycode' => '996',
            ],
            [
               'country_name' => 'Laos',
               'data_countrycode' => '856',
            ],
            [
               'country_name' => 'Latvia',
               'data_countrycode' => '371',
            ],
            [
               'country_name' => 'Lebanon',
               'data_countrycode' => '961',
            ],
            [
               'country_name' => 'Lesotho',
               'data_countrycode' => '266',
            ],
            [
               'country_name' => 'Liberia',
               'data_countrycode' => '231',
            ],
            [
               'country_name' => 'Libya',
               'data_countrycode' => '218',
            ],
            [
               'country_name' => 'Liechtenstein',
               'data_countrycode' => '417',
            ],
            [
               'country_name' => 'Lithuania',
               'data_countrycode' => '370',
            ],
            [
               'country_name' => 'Luxembourg',
               'data_countrycode' => '352',
            ],
            [
               'country_name' => 'Macao',
               'data_countrycode' => '853',
            ],
            [
               'country_name' => 'Macedonia',
               'data_countrycode' => '389',
            ],
            [
               'country_name' => 'Madagascar',
               'data_countrycode' => '261',
            ],
            [
               'country_name' => 'Malawi',
               'data_countrycode' => '265',
            ],
            [
               'country_name' => 'Malaysia',
               'data_countrycode' => '60',
            ],
            [
               'country_name' => 'Maldives',
               'data_countrycode' => '960',
            ],
            [
               'country_name' => 'Mali',
               'data_countrycode' => '223',
            ],
            [
               'country_name' => 'Malta',
               'data_countrycode' => '356',
            ],
            [
               'country_name' => 'Marshall Islands',
               'data_countrycode' => '692',
            ],
            [
               'country_name' => 'Martinique',
               'data_countrycode' => '596',
            ],
            [
               'country_name' => 'Mauritania',
               'data_countrycode' => '222',
            ],
            [
               'country_name' => 'Mayotte',
               'data_countrycode' => '269',
            ],
            [
               'country_name' => 'Mexico',
               'data_countrycode' => '52',
            ],
            [
               'country_name' => 'Micronesia',
               'data_countrycode' => '691',
            ],
            [
               'country_name' => 'Moldova',
               'data_countrycode' => '373',
            ],
            [
               'country_name' => 'Monaco',
               'data_countrycode' => '377',
            ],
            [
               'country_name' => 'Mongolia',
               'data_countrycode' => '976',
            ],
            [
               'country_name' => 'Montserrat',
               'data_countrycode' => '1664',
            ],
            [
               'country_name' => 'Morocco',
               'data_countrycode' => '212',
            ],
            [
               'country_name' => 'Mozambique',
               'data_countrycode' => '258',
            ],
            [
               'country_name' => 'Myanmar',
               'data_countrycode' => '95',
            ],
            [
               'country_name' => 'Namibia',
               'data_countrycode' => '264',
            ],
            [
               'country_name' => 'Nauru',
               'data_countrycode' => '674',
            ],
            [
               'country_name' => 'Nepal',
               'data_countrycode' => '977',
            ],
            [
               'country_name' => 'Netherlands',
               'data_countrycode' => '31',
            ],
            [
               'country_name' => 'New Caledonia',
               'data_countrycode' => '687',
            ],
            [
               'country_name' => 'New Zealand',
               'data_countrycode' => '64',
            ],
            [
               'country_name' => 'Nicaragua',
               'data_countrycode' => '505',
            ],
            [
               'country_name' => 'Niger',
               'data_countrycode' => '227',
            ],
            [
               'country_name' => 'Nigeria',
               'data_countrycode' => '234',
            ],
            [
               'country_name' => 'Niue',
               'data_countrycode' => '683',
            ],
            [
               'country_name' => 'Norfolk Islands',
               'data_countrycode' => '672',
            ],
            [
               'country_name' => 'Northern Marianas',
               'data_countrycode' => '670',
            ],
            [
               'country_name' => 'Norway',
               'data_countrycode' => '47',
            ],
            [
               'country_name' => 'Oman',
               'data_countrycode' => '968',
            ],
            [
               'country_name' => 'Palau',
               'data_countrycode' => '680',
            ],
            [
               'country_name' => 'Panama',
               'data_countrycode' => '507',
            ],
            [
               'country_name' => 'Papua New Guinea',
               'data_countrycode' => '675',
            ],
            [
               'country_name' => 'Paraguay',
               'data_countrycode' => '595',
            ],
            [
               'country_name' => 'Peru',
               'data_countrycode' => '51',
            ],
            [
               'country_name' => 'Philippines',
               'data_countrycode' => '63',
            ],
            [
               'country_name' => 'Poland',
               'data_countrycode' => '48',
            ],
            [
               'country_name' => 'Portugal',
               'data_countrycode' => '351',
            ],
            [
               'country_name' => 'Puerto Rico',
               'data_countrycode' => '1787',
            ],
            [
               'country_name' => 'Qatar',
               'data_countrycode' => '974',
            ],
            [
               'country_name' => 'Reunion',
               'data_countrycode' => '262',
            ],
            [
               'country_name' => 'Romania',
               'data_countrycode' => '40',
            ],
            [
               'country_name' => 'Russia',
               'data_countrycode' => '7',
            ],
            [
               'country_name' => 'Rwanda',
               'data_countrycode' => '250',
            ],
            [
               'country_name' => 'San Marino',
               'data_countrycode' => '378',
            ],
            [
               'country_name' => 'Sao Tome and Principe',
               'data_countrycode' => '239',
            ],
            [
               'country_name' => 'Saudi Arabia',
               'data_countrycode' => '966',
            ],
            [
               'country_name' => 'Senegal',
               'data_countrycode' => '221',
            ],
            [
               'country_name' => 'Serbia',
               'data_countrycode' => '381',
            ],
            [
               'country_name' => 'Seychelles',
               'data_countrycode' => '248',
            ],
            [
               'country_name' => 'Sierra Leone',
               'data_countrycode' => '232',
            ],
            [
               'country_name' => 'Singapore',
               'data_countrycode' => '65',
            ],
            [
               'country_name' => 'Slovak Republic',
               'data_countrycode' => '421',
            ],
            [
               'country_name' => 'Slovenia',
               'data_countrycode' => '386',
            ],
            [
               'country_name' => 'Solomon Islands',
               'data_countrycode' => '677',
            ],
            [
               'country_name' => 'Somalia',
               'data_countrycode' => '252',
            ],
            [
               'country_name' => 'South Africa',
               'data_countrycode' => '27',
            ],
            [
               'country_name' => 'Spain',
               'data_countrycode' => '34',
            ],
            [
               'country_name' => 'Sri Lanka',
               'data_countrycode' => '94',
            ],
            [
               'country_name' => 'St. Helena',
               'data_countrycode' => '290',
            ],
            [
               'country_name' => 'St. Kitts',
               'data_countrycode' => '1869',
            ],
            [
               'country_name' => 'St. Lucia',
               'data_countrycode' => '1758',
            ],
            [
               'country_name' => 'Sudan',
               'data_countrycode' => '249',
            ],
            [
               'country_name' => 'Suriname',
               'data_countrycode' => '597',
            ],
            [
               'country_name' => 'Swaziland',
               'data_countrycode' => '268',
            ],
            [
               'country_name' => 'Sweden',
               'data_countrycode' => '46',
            ],
            [
               'country_name' => 'Switzerland',
               'data_countrycode' => '41',
            ],
            [
               'country_name' => 'Syria',
               'data_countrycode' => '963',
            ],
            [
               'country_name' => 'Taiwan',
               'data_countrycode' => '886',
            ],
            [
               'country_name' => 'Tajikstan',
               'data_countrycode' => '7',
            ],
            [
               'country_name' => 'Thailand',
               'data_countrycode' => '66',
            ],
            [
               'country_name' => 'Togo',
               'data_countrycode' => '228',
            ],
            [
               'country_name' => 'Tonga',
               'data_countrycode' => '676',
            ],
            [
               'country_name' => 'Trinidad & Tobago',
               'data_countrycode' => '1868',
            ],
            [
               'country_name' => 'Tunisia',
               'data_countrycode' => '216',
            ],
            [
               'country_name' => 'Turkey',
               'data_countrycode' => '90',
            ],
            [
               'country_name' => 'Turkmenistan',
               'data_countrycode' => '7',
            ],
            [
               'country_name' => 'Turkmenistan',
               'data_countrycode' => '993',
            ],
            [
               'country_name' => 'Turks & Caicos Islands',
               'data_countrycode' => '1649',
            ],
            [
               'country_name' => 'Tuvalu',
               'data_countrycode' => '688',
            ],
            [
               'country_name' => 'Uganda',
               'data_countrycode' => '256',
            ],
            [
               'country_name' => 'Ukraine',
               'data_countrycode' => '380',
            ],
            [
               'country_name' => 'United Arab Emirates',
               'data_countrycode' => '971',
            ],
            [
               'country_name' => 'Uruguay',
               'data_countrycode' => '598',
            ],
            [
               'country_name' => 'Uzbekistan',
               'data_countrycode' => '7',
            ],
            [
               'country_name' => 'Vanuatu',
               'data_countrycode' => '678',
            ],
            [
               'country_name' => 'Vatican City',
               'data_countrycode' => '379',
            ],
            [
               'country_name' => 'Venezuela',
               'data_countrycode' => '58',
            ],
            [
               'country_name' => 'Vietnam',
               'data_countrycode' => '84',
            ],
            [
               'country_name' => 'Virgin Islands - British',
               'data_countrycode' => '84',
            ],
            [
               'country_name' => 'Virgin Islands - US',
               'data_countrycode' => '84',
            ],
            [
               'country_name' => 'Wallis & Futuna',
               'data_countrycode' => '681',
            ],
            [
               'country_name' => 'Yemen (North)',
               'data_countrycode' => '969',
            ],
            [
               'country_name' => 'Yemen (South)',
               'data_countrycode' => '967',
            ],
            [
               'country_name' => 'Zambia',
               'data_countrycode' => '260',
            ],
            [
               'country_name' => 'Zimbabwe',
               'data_countrycode' => '263',
            ],
             
        );

        foreach ($countrycode as $ul){
            Countrycode::create($ul);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

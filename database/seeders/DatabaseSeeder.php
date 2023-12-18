<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SkillCompetency;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Dwi Khusnul Khotimah',
                'email' => 'dwikhusnul632@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'date_of_birth' => '2004-12-22',
                'place_of_birth' => 'Jember',
                'gender' => 'woman',
                'profile' => 'default.png'
            ],
            [
                'name' => 'Vue Fernandes',
                'email' => 'yahyasalamudin1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'date_of_birth' => '2012-05-21',
                'place_of_birth' => 'Jember',
                'gender' => 'man',
                'profile' => 'default.png'
            ],
            [
                'name' => 'Yahya Salamudin',
                'email' => 'yahyasalamudin39@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'date_of_birth' => '2005-04-20',
                'place_of_birth' => 'Jember',
                'gender' => 'man',
                'profile' => 'default.png'
            ]
        ];

        User::insert($users);

        $skill_competencies = [
            [
                'name' => 'RPL'
            ],
            [
                'name' => 'MM'
            ],
            [
                'name' => 'TKJ'
            ],
            [
                'name' => 'TKR'
            ],
            [
                'name' => 'TBSM'
            ],
            [
                'name' => 'PPT'
            ],
            [
                'name' => 'APH'
            ]
        ];

        SkillCompetency::insert($skill_competencies);
    }
}

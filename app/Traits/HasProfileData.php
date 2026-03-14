<?php

namespace App\Traits;

trait HasProfileData
{
    private function getProfile()
    {
        return [
            'name' => 'Jony Hossen',
            'role' => 'Full-Stack Developer',
            'bio' => 'I am a passionate software engineer specializing in building high-quality web applications using modern technologies like Laravel, Vue.js, and Tailwind CSS.',
            'birthday' => '1 July 1995',
            'website' => 'www.jonyhossen.com',
            'phone' => '+880 1XX XXX XXXX',
            'city' => 'Dhaka, Bangladesh',
            'age' => 30,
            'degree' => 'Master of Computer Science',
            'email' => 'hello@jonyhossen.com',
            'freelance' => 'Available',
            'avatar' => 'https://ui-avatars.com/api/?name=Jony+Hossen&background=34b7a7&color=fff&size=500'
        ];
    }
}

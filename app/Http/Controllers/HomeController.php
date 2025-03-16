<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\HeaderModel;
use App\Models\AppetizersModel;
use App\Models\MainCourseModel;
use App\Models\DessertModel;
use App\Models\TestimonialModel;

class HomeController extends Controller
{
    public function Home()
    {
        $headers = HeaderModel::all();
        $appetizers = AppetizersModel::all();
        $mainCourses = MainCourseModel::all();
        $desserts = DessertModel::all();
        $testimonials = TestimonialModel::all();
        return view('index', compact('headers', 'appetizers', 'mainCourses', 'desserts', 'testimonials'));
    }


    public function About()
    {
        return view('about');
    }

    public function Menu()
    {
        return view('menu');
    }

    public function Testimonial()
    {
        return view('testimonial');
    }

    public function Contact()
    {
        return view('contact');
    }

    public function Features()
    {
        return view('feature');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller {
    public function Home() {
        return view( 'index' );
    }

    public function About() {
        return view( 'about' );
    }

    public function Menu() {
        return view( 'menu' );
    }

    public function Testimonial() {
        return view( 'testimonial' );
    }

    public function Contact() {
        return view( 'contact' );
    }

    public function Features() {
        return view( 'feature' );
    }

}

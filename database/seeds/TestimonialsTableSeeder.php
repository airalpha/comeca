<?php

use App\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'name' => "Tchinda Lontsi",
            'work' => "Frelance",
            'text' => "Je recherchais un PFNL trés rares, grace a COMECA, j'ai trouvé
                        mon produit a un prix tres abordable.",
            'image' => "/uploads/testimonials/lontsi.jpeg"
        ]);
        Testimonial::create([
            'name' => "Tchemou Frantz",
            'work' => "Négociateur",
            'text' => "COMECA ma sauvé la vie en me procurant une tres bonne plante médécinale",
            'image' => "/uploads/testimonials/frantz.jpeg"
        ]);
        Testimonial::create([
            'name' => "Maxime KKM",
            'work' => "Ingenieur",
            'text' => "Je recherchais une espece de plante très rares pour l' étudier, Je l'ai trouvé sur COMECA",
            'image' => "/uploads/testimonials/max.jpg"
        ]);
    }
}

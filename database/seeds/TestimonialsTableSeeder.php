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
            'image' => "/uploads/testimonials/lontsi.jpg"
        ]);
        Testimonial::create([
            'name' => "Tcheumou Frantz",
            'work' => "Négociateur",
            'text' => "COMECA ma sauvé la vie en me procurant une tres bonne plante médécinale",
            'image' => "/uploads/testimonials/frantz.jpg"
        ]);
        Testimonial::create([
            'name' => "Maxime KKM",
            'work' => "Prof SVT",
            'text' => "Je recherchais une espece de plante très rares pour l' étudier, Je l'ai trouvé sur COMECA",
            'image' => "/uploads/testimonials/max.jpg"
        ]);
    }
}

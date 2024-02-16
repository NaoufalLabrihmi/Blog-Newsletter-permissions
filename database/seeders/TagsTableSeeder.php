<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'Agricultural Buildings',
            'Commercial Architecture',
            'Cultural Architecture',
            'Educational Buildings',
            'Green Architecture',
            'Healthcare Architecture',
            'Heritage Architecture',
            'Hospitality Architecture',
            'Industrial Buildings',
            'Institutional Architecture',
            'Miscellaneous Architecture',
            'Mixed Use',
            'Other Architecture',
            'Recreational Architecture',
            'Residential Architecture',
            'Restoration & Renovation',
            'Small Architecture',
            'Social Housing',
            'Tall Buildings',
            'Transportation',
            'Apartments Interior',
            'Commercial Interior',
            'Exhibition Interior',
            'Hospitality Interior',
            'Houses Interior',
            'Other Interior Designs',
            'Public Spaces Interior',
            'Residential Interior',
            'Retail Interior',
            'Rooms and Zones Interior',
            'Workplaces Interior',
            'Commercial Landscape',
            'Educational Landscape',
            'Gardens',
            'Installations and Structures',
            'Landscape Architecture',
            'Outdoor Designs',
            'Public Landscape',
            'Residential Landscape',
            'Small and Large Scale Landscape Projects',
            'Urban Design',
            'Urban Planning',
            'Panorama',
            '2D Plan',
            '3D Plan'
        ]);

        $tags->each(function ($c) {
            \App\Models\Tag::create([
                'name' => $c,
                'slug' => str()->slug($c),
            ]);
        });
    }
}

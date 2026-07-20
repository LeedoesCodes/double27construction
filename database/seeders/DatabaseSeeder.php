<?php

namespace Database\Seeders;

use App\Models\GalleryPhoto;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with the Double 27 company profile.
     */
    public function run(): void
    {
        // Copy bundled seed images into the public storage disk so the
        // demo renders on any fresh deploy (storage is not tracked in git).
        $this->publishSeedImages();

        // ---- Site settings (single row) ----
        SiteSetting::updateOrCreate(['id' => 1], [
            'company_name' => 'Double 27 Construction Supply',
            'tagline' => 'High-grade aggregates and expert concreting services for infrastructure, commercial, and residential projects.',
            'about' => 'DOUBLE 27 CONSTRUCTION SUPPLY is a leading provider of quality construction materials and specialized concreting services in the Philippines. With a strong commitment to excellence, safety, and customer satisfaction, we supply high-grade aggregates and deliver expert concreting solutions to infrastructure, commercial, and residential projects.',
            'vision' => 'To be the preferred partner in construction materials and concreting services — setting industry standards for reliability, quality, and sustainability.',
            'mission' => 'Deliver superior quality aggregates that meet industry standards; provide expert, timely, and cost-efficient concreting services; foster long-term partnerships through integrity and safe practices; and uphold environmental responsibility in sourcing and operations.',
            'phone' => '0908-152-6510',
            'email' => 'lycheeargente@yahoo.com',
            'head_office' => 'Dalag, Arakan, Cotabato — Region XII',
            'sub_office' => 'Purok 6, Songculan, Dauis, Bohol',
            'facebook' => null,
            'hero_image' => 'site/hero.jpg',
        ]);

        // ---- Products (aggregates) ----
        $products = [
            ['name' => 'Sand (Fine & Coarse)', 'category' => 'Sand', 'image' => null,
                'description' => 'Well-graded fine and coarse sand for plastering and concrete work.'],
            ['name' => 'Gravel & Pea Gravel', 'category' => 'Gravel', 'image' => 'products/gravel.jpg',
                'description' => 'Suitable for foundations, roads, and paving applications.'],
            ['name' => 'Crushed Stone', 'category' => 'Crushed Stone', 'image' => 'products/crushed-stone.jpg',
                'description' => 'Durable aggregate for structural concrete and asphalt base.'],
        ];
        foreach ($products as $i => $p) {
            Product::updateOrCreate(
                ['name' => $p['name']],
                array_merge($p, ['sort_order' => $i, 'is_active' => true])
            );
        }

        // ---- Services (concreting) ----
        $services = [
            ['title' => 'Structural & Girder Concreting', 'image' => 'services/girder.jpg',
                'description' => 'Structural concrete for slabs, beams, and columns, plus concrete girder fabrication for bridge works — built to project specifications.'],
            ['title' => 'Road Concreting & Pavements', 'image' => 'services/road-concreting.jpg',
                'description' => 'Road concreting and pavement works with proper placement, finishing, and controlled curing for long-lasting results.'],
            ['title' => 'Site Development & Earthworks', 'image' => 'services/earthworks.jpg',
                'description' => 'Site preparation, layout, and earthworks — readying ground for reliable, standards-compliant construction.'],
        ];
        foreach ($services as $i => $s) {
            Service::updateOrCreate(
                ['title' => $s['title']],
                array_merge($s, ['sort_order' => $i, 'is_active' => true])
            );
        }

        // ---- Projects ----
        $projects = [
            ['client' => 'Car Will', 'name' => 'SM Davao', 'scope' => 'Sand and Gravel Delivery',
                'location' => 'Davao City', 'year' => '2024 – Present', 'image' => 'projects/sm-davao.jpg', 'is_featured' => true],
            ['client' => 'FRYFIL', 'name' => 'Asia Brewery Building', 'scope' => 'Sand and Gravel Delivery',
                'location' => 'Cagayan / Davao', 'year' => '2025 – Present', 'image' => 'projects/asia-brewery.jpg', 'is_featured' => true],
            ['client' => 'TRU Bank', 'name' => 'Commercial Building', 'scope' => 'Structural Concrete Works',
                'location' => 'Davao City', 'year' => '2025', 'image' => 'projects/tru-bank.jpg', 'is_featured' => true],
            ['client' => 'Mac Builders', 'name' => 'Coastal Road Concreting', 'scope' => 'Road Concreting / Bridges',
                'location' => 'Davao City', 'year' => '2022 – 2024', 'image' => 'projects/mac-builders.jpg', 'is_featured' => false],
            ['client' => 'Double 27', 'name' => 'Concrete Girder Fabrication', 'scope' => 'Bridge Girder Fabrication',
                'location' => 'Bohol', 'year' => '2024', 'image' => 'projects/bridge-girder.jpg', 'is_featured' => false],
        ];
        foreach ($projects as $i => $p) {
            Project::updateOrCreate(
                ['client' => $p['client'], 'name' => $p['name']],
                array_merge($p, ['sort_order' => $i])
            );
        }

        // ---- Gallery ----
        $gallery = [
            ['image' => 'gallery/night-port.jpg', 'caption' => 'Aggregate unloading at port, Loon, Bohol'],
            ['image' => 'gallery/stockpile.jpg', 'caption' => 'Crushed stone stockpile'],
            ['image' => 'gallery/road-concreting.jpg', 'caption' => 'Road concreting in progress'],
            ['image' => 'gallery/girder.jpg', 'caption' => 'Concrete girder fabrication'],
            ['image' => 'gallery/road-works.jpg', 'caption' => 'Site earthworks and hauling'],
            ['image' => 'gallery/road-works-2.jpg', 'caption' => 'Access road development'],
        ];
        foreach ($gallery as $i => $g) {
            GalleryPhoto::updateOrCreate(
                ['image' => $g['image']],
                array_merge($g, ['sort_order' => $i, 'is_active' => true])
            );
        }
    }

    /**
     * Copy the tracked seed images into storage/app/public so they are
     * served via the public disk (works on fresh/ephemeral deployments).
     */
    private function publishSeedImages(): void
    {
        $source = database_path('seeders/assets');
        $target = storage_path('app/public');

        if (! File::isDirectory($source)) {
            return;
        }

        File::ensureDirectoryExists($target);
        File::copyDirectory($source, $target);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\GalleryPhoto;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function settings(): SiteSetting
    {
        return SiteSetting::current();
    }

    public function home()
    {
        return view('pages.home', [
            'settings' => $this->settings(),
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get(),
            'products' => Product::where('is_active', true)->orderBy('sort_order')->get(),
            'featuredProjects' => Project::where('is_featured', true)->orderBy('sort_order')->get(),
            'gallery' => GalleryPhoto::where('is_active', true)->orderBy('sort_order')->take(6)->get(),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'settings' => $this->settings(),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            'settings' => $this->settings(),
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get(),
            'products' => Product::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function projects()
    {
        return view('pages.projects', [
            'settings' => $this->settings(),
            'projects' => Project::orderBy('sort_order')->orderByDesc('year')->get(),
            'gallery' => GalleryPhoto::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'settings' => $this->settings(),
        ]);
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you for reaching out. We will get back to you shortly.');
    }
}

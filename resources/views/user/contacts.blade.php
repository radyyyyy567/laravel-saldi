@extends('layouts.master')
@section('title', 'Technorider')
@section('content')
    <section class="max-w-5xl mx-auto pt-20">
        <div class="grid grid-cols-2 py-20 gap-x-4">
            <div class=""><iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d249.3512347869627!2d101.41579983388037!3d0.5716271611170007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle%20map!5e0!3m2!1sid!2sid!4v1706728678213!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <div class="space-y-4">
                <div class="font-bold text-4xl">Our Contacts</div>
                <div class="space-y-4">
                    <a href="wa.me/6289513057659" class="space-x-3 bg-green-500 flex items-center rounded py-2 px-2">
                    <svg fill="#ffffff" class="h-[40px]" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"/><path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"/></svg>
                    
                    <div class="font-bold text-white">Contact Our in Whatsapp</div>
                    </a>
                </div>
                <div class="space-y-4">
                    <a href="mailto:info@technorider.id" class="space-x-3 bg-red-500 flex items-center rounded py-2 px-2">
                    <svg class="w-[40px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm3.519 0L12 11.671 18.481 6H5.52zM20 7.329l-7.341 6.424a1 1 0 0 1-1.318 0L4 7.329V18h16V7.329z" fill="#ffffff"/></svg>
                    
                    <div class="font-bold text-white">Contact Our in E-Mail</div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

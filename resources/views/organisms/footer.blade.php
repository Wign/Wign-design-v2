<footer class="absolute bottom-0 h-16 w-full bg-white text-xs text-center font-light">
    <div class="container mx-auto">
        <nav class="pt-3 pb-1">
            <a href="{{ route('index.contact')  }}" class="text-gray-700 underline mx-1 hover:text-gray-500">Kontakt</a>
            <a href="{{ route('index.policy') }}" class="text-gray-700 underline mx-1 hover:text-gray-500">Vilkår og betingelser</a>
            <a href="{{ route('index.cookies') }}" class="text-gray-700 underline mx-1 hover:text-gray-500">Cookies</a>
            <span class="px-1">|</span>
            <a href="{{ route('media.facebook') }}" target="_blank" class="no-underline mx-1 text-base"><fa-icon :icon="['fab', 'facebook']" class="align-middle"></fa-icon></a>
            <a href="{{ route('media.github') }}" target="_blank" class="no-underline mx-1 text-base"><fa-icon :icon="['fab', 'github']" class="align-middle"></fa-icon></a>
        </nav>
        <span class="text-gray-700">&copy; 2009-{{date('Y')}} Wign</span>
    </div>
</footer>
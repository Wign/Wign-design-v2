<div class="container mx-auto min-h-500 flex flex-col justify-start items-center">
    <form class="w-4/5 md:w-2/3 lg:w-2/5 p-4 mt-20 bg-translucent-60 shadow-box rounded-lg">
        <div class="relative">
        	<auto-complete count-hits="10"></auto-complete>
            <!--<label for="search-input" class="sr-only">@lang('text.search.text')</label>
            <input type="search"
                   class="block w-4/5 px-3 py-2 my-1 mx-auto text-base leading-normal text-black bg-transparent border-b-2 border-turkis rounded-none"
                   placeholder="@lang('text.search.text')" id="search-input" required autofocus>
            {{-- TODO: Søg knap, forbedret accessibility (farve, kontast osv) --}}-->
        </div>
    </form>
</div>

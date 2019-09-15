<div class="bg-translucent-80">
    <div class="container mx-auto pt-4 pb-6">
        <div class="flex flex-wrap">
            <div class="md:w-2/3 px-4 flex flex-col justify-between items-stretch content-start">
                @include('components.index.discovery.discover')
            </div>
            <div class="md:w-1/3 px-4 flex flex-col justify-between items-stretch">
                {{-- @include('components.index.discovery.requestNone') --}}
                @include('components.index.discovery.request')
            </div>
        </div>
    </div>
</div>
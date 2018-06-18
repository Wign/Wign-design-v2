<div class="bg-translucent">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-8 d-flex flex-column justify-content-between align-items-stretch align-content-start">
                @include('components.index.discovery.discover')
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-between align-items-stretch">
                {{-- @include('components.index.discovery.requestNone') --}}
                @include('components.index.discovery.request')
            </div>
        </div>
    </div>
</div>
<header class="bg-white pt-2 border-bottom">
    <div class="container">
        <div class="mb-2 d-flex justify-content-between align-items-stretch align-items-md-center flex-column flex-md-row">
            <div id="logo-wrapper">
                <a href="/"><img id="logo" src="{{ url('/logo.jpg') }}" alt="logo" width="150"></a>
            </div>
            <div class="d-flex gap-2 flex-column flex-md-row align-items-stretch align-items-md-center justify-content-center">
                <div class="d-flex align-items-center justify-content-between flex-shrink-0">
                    <div class="text-primary flex-shrink-0 text-center">
                        {{ __("Contacts and department numbers") }}
                    </div>
                    <x-main-header.language-dropdown/>
                </div>
                <x-main-header.search-box/>
                <div class="d-grid w-100">
                    <button class="btn btn-green btn-dark ps-4 pe-4">
                        {{ __('Log in') }}
                    </button>
                </div>
            </div>
        </div>
        <x-main-header.navbar/>
    </div>
</header>

<x-layout::main class="bg-primary bg-gradient d-flex justify-content-center align-items-center flex-grow-1">
    <section class="container d-flex flex-column justify-content-center align-items-center gap-3 pt-5 pb-5">
        <header>
            <h1 id="search-box-h1" class="text-white text-center fw-lighter fs-1">
                {{ __("Search in the municipality database") }}
            </h1>
        </header>
        <livewire:search-box/>
    </section>
</x-layout::main>

<x-layout::main class="bg-white d-flex justify-content-center align-items-center flex-grow-1">
    <section class="container d-flex flex-column justify-content-center align-items-center gap-4 pt-4 pb-5">
        <header class="pb-1 pt-1">
            <h1 class="fw-lighter text-center">{{ __('Detail of the municipality') }}</h1>
        </header>
        <x-detail-card :city="$city"/>
    </section>
</x-layout::main>

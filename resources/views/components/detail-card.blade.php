<article>
    <div class="card mb-3 shadow-lg border-0 mb-5">
        <div class="grid">
            <div class="g-col-12 g-col-xl-6 bg-light p-5">
                <div class="table-wrapper table-responsive-xxl p-0 p-xxl-5">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>{{ __('Mayor\'s name') }}:</th>
                            <td>{{ $city->mayor_name }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">{{ __('Address of the municipal office') }}:</th>
                            <td>{{ $address->street_name . ' ' . $address->house_number . ', ' . $address->postal_code . ' ' . $address->post_name}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Phone') }}:</th>
                            <td>{{ $city->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Fax') }}:</th>
                            <td>{{ $city->fax ?: "- - -" }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}:</th>
                            <td>{{ $city->email ?: "- - -" }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Web') }}:</th>
                            <td>{{ $city->web_address ?: "- - -" }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Geographic coordinates') }}:</th>
                            <td>{{ $city->latitude . ', ' . $city->longitude }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="g-col-12 g-col-xl-6 p-5">
                <header class="d-flex flex-column justify-content-center align-items-center h-100 gap-4 p-0 p-xxl-5">
                    <img src="{{ asset("storage/$city->coat_of_arms_image_file_name") }}"
                         class="img-fluid rounded-start" alt="...">
                    <h2 class="text-primary fw-bolder text-center">{{ $city->name }}</h2>
                </header>
            </div>
        </div>
    </div>
</article>

@php
    use \Illuminate\Support\Str
@endphp
<footer {{ $attributes->class(['bg-secondary bg-opacity-10 pt-4 pb-2 text-secondary']) }}>
    <div class="container grid footer-grid">
        <div class="g-col-12 g-col-md-6 g-col-xl-3">
            <div id="address-and-contact" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("Address and contact")) }}</h6>
                ŠÚKL<br>
                Kvetná 11<br>
                825 08 Bratislava 26<br>
                Ústredňa:<br>
                +421-2-50701 111
            </div>
            <div id="contacts" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(trans_choice("Contact|Contacts", 2)) }}</h6>
                <ul class="p-0">
                    <li>{{ __("phone numbers") }}</li>
                    <li>{{ __("address") }}</li>
                    <li>{{ __("office hours") }}</li>
                    <li>{{ __("bank launch") }}</li>
                </ul>
            </div>
            <div id="informations-for-the-public" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("Information's for the public")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("List of exported medicines") }}</li>
                    <li>{{ __("MZ SR") }}</li>
                    <li>{{ __("National health portal") }}</li>
                </ul>
            </div>
        </div>
        <div class="g-col-12 g-col-md-6 g-col-xl-3">
            <div id="about-us" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("About us")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("Questionnaires") }}</li>
                    <li>{{ __("Main representatives") }}</li>
                    <li>{{ __("Basic documents") }}</li>
                    <li>{{ __("Contracts for ŠÚKL") }}</li>
                    <li>{{ __("History and present") }}</li>
                    <li>{{ __("National cooperation") }}</li>
                    <li>{{ __("International cooperation") }}</li>
                    <li>{{ __("Advisory bodies") }}</li>
                    <li>{{ __("Legislation") }}</li>
                    <li>{{ __("Misdemeanors and other administrative offenses") }}</li>
                    <li>{{ __("List of debtors") }}</li>
                    <li>{{ __("Price list ŠÚKL") }}</li>
                    <li>{{ __("Educational events and presentations") }}</li>
                    <li>{{ __("Consultations") }}</li>
                    <li>{{ __("Job vacancy") }}</li>
                    <li>{{ __("Providing information") }}</li>
                    <li>{{ __("Complaints and petitions") }}</li>
                </ul>
            </div>
        </div>
        <div class="g-col-12 g-col-md-6 g-col-xl-3">
            <div id="media" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("The media")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("Press news") }}</li>
                    <li>{{ __("Medicines in the media") }}</li>
                    <li>{{ __("Media contact") }}</li>
                </ul>
            </div>
            <div id="databases-and-service" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("Databases and service")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("Database of medicines and medical devices") }}</li>
                    <li>{{ __("Other lists") }}</li>
                    <li>{{ __("Contact form") }}</li>
                    <li>{{ __("Site map") }}</li>
                    <li>{{ __("A - Z index") }}</li>
                    <li>{{ __("Lines") }}</li>
                    <li>{{ __("RSS") }}</li>
                    <li>{{ __("Add-on for Internet browser") }}</li>
                    <li>{{ __("Format browsers") }}</li>
                </ul>
            </div>
        </div>
        <div class="g-col-12 g-col-md-6 g-col-xl-3">
            <div id="drug-precursors" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("Drug precursors")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("News") }}</li>
                    <li>{{ __("Legislation") }}</li>
                    <li>{{ __("Instructions") }}</li>
                    <li>{{ trans_choice("Contact|Contacts", 1) }}</li>
                </ul>
            </div>
            <div id="other" class="footer-section">
                <h6 class="text-dark">{{ Str::upper(__("Other")) }}</h6>
                <ul class="p-0">
                    <li>{{ __("Lines") }}</li>
                    <li>{{ __("Site map") }}</li>
                    <li>{{ __("FAQ") }}</li>
                    <li>{{ __("Terms of Use") }}</li>
                </ul>
            </div>
            <div id="rapid-alert-system" class="footer-section">
                <h6 class="text-primary">{{ Str::upper(__("Rapid alert system")) }}</h6>
                <p class="text-primary text-decoration-underline text-opacity-75">{{ __("Rapid alert resulting from deficiencies in the quality of medicines") }}</p>
            </div>
        </div>
    </div>
</footer>

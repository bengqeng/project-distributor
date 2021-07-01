<div class="footer-landing-page bg-our-grey">
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <div class="text-center">
                    <img src="{{route('landingpage.index')}}/vendor/img/main/logo-white.png" width="180" height="180" alt="">
                        @if ($socialMedia->count() > 0)
                            <div class="row mt-3">
                                @foreach ($socialMedia as $item)
                                    @if ($item['media_type'] == 'Facebook')
                                        <div class="col">
                                            <a class="text-our-white" href="{{ $item->url }}" target="_blank"><i class="fab fa-facebook" style="font-size:24px"></i></a>
                                        </div>
                                    @endif
                                    @if ($item['media_type'] == 'Instagram')
                                        <div class="col">
                                            <a class="text-our-white" href=""><i class="fab fa-instagram" style="font-size:24px"></i></a>
                                        </div>
                                    @endif
                                    @if ($item['media_type'] == 'Twitter')
                                        <div class="col">
                                            <a class="text-our-white" href=""><i class="fab fa-twitter" style="font-size:24px"></i></a>
                                        </div>
                                    @endif
                                    @if ($item['media_type'] == 'Tik Tok')
                                        <div class="col">
                                            <a class="text-our-white" href=""><i class="fab fa-tiktok" style="font-size:24px"></i></a>
                                        </div>
                                    @endif
                                    @if ($item['media_type'] == 'Youtube')
                                        <div class="col">
                                            <a class="text-our-white" href=""><i class="fab fa-youtube" style="font-size:24px"></i></a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                </div>
            </div>
            <div class="col-lg-3">
                <h4 class="text-our-white pb-4">THE COMPANY</h4>
                <p class="mb-0"><a class="text-our-white" href="">Our Story</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Carrers</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Affiliates</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Own Your Pretty</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Events</a></p>
            </div>
            <div class="col-lg-3">
                <h4 class="text-our-white pb-4">THE COMPANY</h4>
                <p class="mb-0"><a class="text-our-white" href="">Our Story</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Carrers</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Affiliates</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Own Your Pretty</a></p>
                <p class="mb-0"><a class="text-our-white" href="">Events</a></p>
            </div>
            <div class="col-lg-3">
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15811.95911645435!2d110.37524085024413!3d-7.790905974671468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a577e736dacdd%3A0x71936924556892f6!2sStadion%20Mandala%20Krida!5e0!3m2!1sen!2sid!4v1622476650037!5m2!1sen!2sid"
                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>  --}}
                <div class="map-responsive">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15811.95911645435!2d110.37524085024413!3d-7.790905974671468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a577e736dacdd%3A0x71936924556892f6!2sStadion%20Mandala%20Krida!5e0!3m2!1sen!2sid!4v1622476650037!5m2!1sen!2sid"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

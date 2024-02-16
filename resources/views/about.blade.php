@section('title','About')
<x-public-layout>
    <!-- Hero Area Start -->
    <section id="hero-area" class="pt-24 pb-10">
        <div class="container">
            <div class="flex justify-between">
                <div class="w-full text-center">
                    <h2 class="md:mb-10 dark:text-white mb-8 text-4xl font-bold leading-snug text-gray-700">
                        Show clients your amazing designs.
                        <span class="md:block hidden text-xl underline">leave detail problem to us</span>
                    </h2>
                    <div class="md:mb-10 mb-0 text-center">
                        <a href="#" rel="nofollow">
                            <x-button_public>Download Now</x-button_public>
                        </a>
                    </div>
                    <div class="dark:text-white flex items-center justify-center text-center text-gray-800" ">
                        <div style=" width: 500px; height:500px">
                        <x-hero.hero></x-hero.hero>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Hero Area End -->
    <!-- Services Section Start -->
    <section id=" services" class="py-24">
        <div class="dark:text-white container">
            <div class="text-center">
                <h2 class=" mb-12 text-3xl font-semibold">Our Services</h2>
            </div>
            <div class="flex flex-wrap">
                <!-- Services item -->
                <div class="sm:w-1/2 md:w-1/2 w-full">
                    <x-service_card>
                        <x-slot name="icon">
                            <svg class="w-12 h-12" fill="currentColor" stroke="currentColor" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 122.88 110.98" style="enable-background:new 0 0 122.88 110.98"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M3.54,84.57c0.94-1.12,1.97-2.02,3.09-2.76c2.25-1.49,4.79-2.28,7.67-2.81c0-25.14,0-50.27,0-75.41 C3.39,4.66,3.46,14.75,3.52,24.12c0.01,1.26,0.02,1.92,0.02,2.23V84.57L3.54,84.57z M42.98,25.55h19.44l1.51,0v1.51v71.53v1.51 h-1.51H42.98h-1.51v-1.51V27.06v-1.51L42.98,25.55L42.98,25.55z M46.91,91.58h4.04v2.11h-4.04V91.58L46.91,91.58z M46.91,85.64 h4.04v2.11h-4.04V85.64L46.91,85.64z M46.91,79.7h4.04v2.11h-4.04V79.7L46.91,79.7z M46.91,73.75h4.04v2.11h-4.04V73.75 L46.91,73.75z M46.91,67.81h6.71v2.11h-6.71V67.81L46.91,67.81z M46.91,61.87h4.04v2.11h-4.04V61.87L46.91,61.87z M46.91,55.92 h4.04v2.11h-4.04V55.92L46.91,55.92z M46.91,49.98h4.04v2.11h-4.04V49.98L46.91,49.98z M46.91,44.04h4.04v2.11h-4.04V44.04 L46.91,44.04z M46.91,38.09h4.04v2.11h-4.04V38.09L46.91,38.09z M46.91,32.15h6.71v2.11h-6.71V32.15L46.91,32.15z M60.91,28.56 H44.49v68.51h16.42V28.56L60.91,28.56z M91.96,40.51v58.56H78.09V40.51h-0.06l0.47-0.96l5.73-11.77l0.58-1.2l0.61,1.18l6.1,11.77 l0.51,0.98H91.96L91.96,40.51z M80.18,39.16h9.66l-3.84-7.4h-2.22L80.18,39.16L80.18,39.16z M17.8,14.33h102.23 c0.79,0,1.5,0.32,2.02,0.84c0.52,0.52,0.84,1.23,0.84,2.02v90.95c0,0.78-0.32,1.49-0.84,2.01l-0.01,0.01h0 c-0.52,0.52-1.23,0.84-2.01,0.84H15.73c-4.27,0-10.19-3.35-12.66-6.88c-2.42-3.44-3.29-7.86-3.03-13.01V26.35c0-1.79,0-1.98,0-2.22 C-0.04,12.67-0.12,0.28,15.85,0.01C15.92,0,15.98,0,16.05,0c0.97,0,1.75,0.78,1.75,1.75V14.33L17.8,14.33z M3.52,91.53 c-0.18,4.28,0.52,7.88,2.41,10.57c1.9,2.71,5.09,4.58,9.92,5.39h103.54V17.82H17.8v62.64h-0.01c0,0.85-0.61,1.59-1.48,1.72 c-3.04,0.47-5.64,1.13-7.76,2.53C6.53,86.05,4.86,88.15,3.52,91.53L3.52,91.53z" />
                                </g>
                            </svg>
                        </x-slot>
                        <x-slot name="heading3">
                            Architect Design
                        </x-slot>
                        <x-slot name="paragraph">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Unde
                            perspiciatis dicta labore nulla beatae quaerat quia
                            incidunt laborum aspernatur...
                        </x-slot>
                    </x-service_card>
                </div>
                <!-- Services item -->
                <div class="sm:w-1/2 md:w-1/2 w-full">
                    <x-service_card>
                        <x-slot name="icon">
                            <svg class="w-12 h-12" fill="currentColor" stroke="currentColor" id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.34">
                                <path
                                    d="M67.94,103.65v4.69H65v-4.69H17.7v4.68H14.81v-4.68H13.14a5.92,5.92,0,0,1-4-1.19,5.35,5.35,0,0,1-1.68-4.18V77.17a12.82,12.82,0,0,1-3.43-1.48A7.6,7.6,0,0,1,1.1,72.42c-2.06-4.55-1-8.37,1.42-11a10.85,10.85,0,0,1,4.07-2.64,11.43,11.43,0,0,1,4.8-.7,9.92,9.92,0,0,1,3.5.92V44.5c0-6,.9-9.12,3.2-10.86s5.52-1.78,10.44-1.78H50V3.64A3.65,3.65,0,0,1,53.63,0h65.61a3.65,3.65,0,0,1,3.64,3.64v94h-2.77v4.95H96.46V97.65H75.27v.58h0v0a5.32,5.32,0,0,1-1.68,4.18,6,6,0,0,1-4,1.19H67.94ZM96.43,46.87a1.6,1.6,0,1,1,3.19,0v8.37a1.6,1.6,0,0,1-3.19,0V46.87ZM88,3.19V94.46h31.66V3.64a.44.44,0,0,0-.45-.45ZM84.84,94.46V3.19H53.63a.44.44,0,0,0-.31.13.42.42,0,0,0-.14.32V31.86H54.3c5.35,0,8.61.21,10.75,2.12s2.77,5.2,2.77,11.28V59.6a10.78,10.78,0,0,1,4.7-1,11.77,11.77,0,0,1,4.53.94,10.21,10.21,0,0,1,3.71,2.66c2.2,2.51,3,6.11.86,10.29a8.26,8.26,0,0,1-2.92,3.17,13.18,13.18,0,0,1-3.43,1.52V94.46ZM17.79,61.23a10.21,10.21,0,0,1,2.08,3.85,11.76,11.76,0,0,1,.47,2.43,15.42,15.42,0,0,1,0,2.72v3.86H62.4V70.17a17,17,0,0,1,0-2.65A8.4,8.4,0,0,1,62.92,65a10.43,10.43,0,0,1,2-3.23V45.26c0-5.19-.41-7.89-1.8-9.13S59,34.75,54.3,34.75H28.53c-4.34,0-7.18,0-8.7,1.2s-2,3.58-2,8.55V61.23ZM20.34,77v4.86H62.4V77Zm-4.79-13.9a1.44,1.44,0,0,1-.42-.43,6.67,6.67,0,0,0-4-1.65,8.41,8.41,0,0,0-3.58.52,7.92,7.92,0,0,0-3,1.93c-1.69,1.78-2.39,4.48-.89,7.76a4.76,4.76,0,0,0,1.87,2,11.39,11.39,0,0,0,3.64,1.39h0a1.45,1.45,0,0,1,1.12,1.41V98.21a2.63,2.63,0,0,0,.66,2.05,3.3,3.3,0,0,0,2.12.51h4.31V70a11.4,11.4,0,0,0,0-2.26,9.07,9.07,0,0,0-.35-1.85,7.35,7.35,0,0,0-1.57-2.83Zm49.75,12a1.48,1.48,0,0,1,0,.9v7a1.66,1.66,0,0,1,0,.32,1.84,1.84,0,0,1,0,.33v17.13h4.3a3.41,3.41,0,0,0,2.13-.52,2.7,2.7,0,0,0,.66-2h0V76.05a1.44,1.44,0,0,1,1.24-1.43,11,11,0,0,0,3.5-1.39A5.31,5.31,0,0,0,79,71.17c1.51-3,1-5.41-.45-7.09a7.44,7.44,0,0,0-2.68-1.89,8.87,8.87,0,0,0-3.41-.72A7.13,7.13,0,0,0,65.59,66a5.87,5.87,0,0,0-.35,1.68A13.93,13.93,0,0,0,65.29,70v.13h0v4.93Zm-45,25.67H62.4v-16H20.34v16Z" />
                            </svg>
                        </x-slot>
                        <x-slot name="heading3">
                            Furniture Design
                        </x-slot>
                        <x-slot name="paragraph">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Unde
                            perspiciatis dicta labore nulla beatae quaerat quia
                            incidunt laborum aspernatur...
                        </x-slot>
                    </x-service_card>
                </div>
                <!-- Services item -->
                <div class="sm:w-1/2 md:w-1/2 w-full">
                    <x-service_card>
                        <x-slot name="icon">
                            <x-hero.interior class="w-12 h-12" fill="currentColor" stroke="currentColor" />
                        </x-slot>
                        <x-slot name="heading3">
                            Interior Design
                        </x-slot>
                        <x-slot name="paragraph">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Unde
                            perspiciatis dicta labore nulla beatae quaerat quia
                            incidunt laborum aspernatur...
                        </x-slot>
                    </x-service_card>
                </div>
                <!-- Services item -->
                <div class="sm:w-1/2 md:w-1/2 w-full">
                    <x-service_card>
                        <x-slot name="icon">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                stroke="currentColor" shape-rendering="geometricPrecision"
                                text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 454.63">
                                <path fill-rule="nonzero"
                                    d="M474.53 297.19c-3.03-12.25-10.85-23.5-23.14-31.67a2.86 2.86 0 0 1-1.13-3.27c.35-1.04.64-2.12.86-3.24.22-1.05.38-2.15.46-3.28l.11-2.01-.24-3.42a2.8 2.8 0 0 1 .22-1.44c.62-1.45 2.3-2.12 3.75-1.5 21.45 9.21 37.46 22.94 46.87 38.6 7.37 12.25 10.7 25.71 9.46 39.13l-.01.08c-1.27 13.44-7.11 26.82-18.06 38.89-14.88 16.39-39.25 30.43-74.46 38.96l-1.7.41c-19.83 4.81-41.87 10.15-65.39 13.05l-.47.04a2.86 2.86 0 0 1-2.86-2.86V388.8a2.87 2.87 0 0 1 2.53-2.84c10.41-1.21 20.43-2.82 30.01-4.66 9.62-1.84 18.79-3.92 27.48-6.07 28.3-6.99 47.29-20.5 57.65-36.1 4.46-6.71 7.32-13.81 8.64-20.91 1.31-7.09 1.1-14.22-.58-21.03zM99.52 51.56 253.03.44c1.84-.62 3.75-.56 5.45.03V.44l155.55 53.28a8.564 8.564 0 0 1 5.8 8.88c.02.19.02.4.02.62v187.59h-.02c0 3.13-1.73 6.15-4.72 7.66l-154.44 78.48a8.624 8.624 0 0 1-4.45 1.24c-1.73 0-3.32-.51-4.67-1.38L96.76 256.07a8.597 8.597 0 0 1-4.61-7.61h-.03V60.09c0-4.35 3.21-7.93 7.4-8.53zm190.69 212.57 3.88-108.55 44.45-14.51c17.11-5.59 28.43-5.36 34.27.52 5.77 5.83 8.27 17.9 7.52 36.22-.73 18.29-4.28 32.5-10.68 42.71-6.46 10.3-18.07 18.85-35.12 25.73l-44.32 17.88zm47.76-96.17-12.86 4.45-1.94 51.77 12.84-4.92c4.18-1.61 7.22-3.28 9.12-5.06 1.91-1.76 2.93-4.53 3.08-8.31l1.29-33.19c.14-3.79-.68-5.89-2.52-6.29-1.82-.42-4.83.09-9.01 1.55zm-150.1 12.57.73-10.22c-3.2-2.29-8.38-5.39-15.54-9.31-7.08-3.87-15.9-7.56-26.39-11.08l-2.43-24.88c12.88 2.82 25.4 7.42 37.56 13.85 10.6 5.62 18.31 10.37 23.08 14.22 4.79 3.88 8.29 7.34 10.5 10.41 4.86 6.93 6.97 14.63 6.34 23.07-.8 10.69-6.02 15.79-15.61 15.27l-.06.8c10.71 10.54 15.67 21.61 14.8 33.11-.42 5.63-1.71 9.89-3.86 12.79-2.14 2.87-4.69 4.59-7.62 5.1-2.92.53-6.68.08-11.27-1.34-6.79-2.17-16.09-6.8-27.84-13.81-11.59-6.92-22.94-15.06-34.07-24.42l6-22.55c9.58 7.97 17.87 14 24.77 17.99 6.98 4.06 13.03 7.23 18.12 9.52l.72-10-27.15-18.26 1.57-22.36 27.65 12.1zm59.74 134.89V135.7L109.34 73.01v170.28l138.27 72.13zM402.62 75.06l-137.79 60.72v179.8l137.79-70.03V75.06zM255.65 17.63 124.87 61.19l131.4 59.59 131.4-57.91-132.02-45.24zM3.84 286.3c6.94-13.62 23.83-26.54 53.61-37.86.39-.16.82-.24 1.27-.21 1.57.11 2.76 1.47 2.66 3.04-.03.53.04 1.56.1 2.11.14 1.87.49 3.72 1.01 5.49.5 1.74 1.19 3.45 2.05 5.1l.18.32c.74 1.37.25 3.09-1.11 3.86-11.68 6.6-18.46 13.23-21.24 19.78-3.58 8.43-.31 17.06 7.65 25.55 8.52 9.07 22.24 17.89 38.81 26.08 54.49 26.97 138.89 46.87 171.76 47.77v-27.72c.01-.67.24-1.34.72-1.88a2.858 2.858 0 0 1 4.02-.27c17.19 15.1 35.95 30.16 52.06 46.27a2.846 2.846 0 0 1-.05 4.03c-16.47 15.93-34.68 30.92-51.92 46.08-.51.49-1.21.79-1.97.79-1.58 0-2.86-1.29-2.86-2.87v-25.74c-58.7 1.19-154.52-27.16-211.85-63.77-18.02-11.5-32.34-23.89-40.63-36.49-8.64-13.13-10.88-26.51-4.27-39.46z" />
                            </svg>
                        </x-slot>
                        <x-slot name="heading3">
                            3D Architecture Rendering
                        </x-slot>
                        <x-slot name="paragraph">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Unde
                            perspiciatis dicta labore nulla beatae quaerat quia
                            incidunt laborum aspernatur...
                        </x-slot>
                    </x-service_card>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <!-- Feature Section Start -->
    <div id="feature" class="py-24 bg-transparent">
        <div class="container">
            <div class="flex flex-wrap items-center">
                <div class="lg:w-1/2 w-full">
                    <div class="lg:mb-0 mb-5">
                        <h2 class="mb-12 text-2xl font-semibold">Learn More About Us</h2>

                        <div class="flex flex-wrap">
                            <div class="sm:w-1/2 lg:w-1/2 w-full">
                                <x-service_card>

                                    <x-slot name="heading3">
                                        Welcome To Our Studio
                                    </x-slot>
                                    <x-slot name="paragraph">
                                        We were so excited when we started talking about 3D, with this passion we wanted
                                        to share it with you. We look forward
                                        to working with you on your extraordinary project, hope you can get started now.
                                        It's not all about us, what matters is
                                        what we can do to support you.
                                    </x-slot>
                                </x-service_card>
                            </div>
                            <div class="sm:w-1/2 lg:w-1/2 w-full">
                                <x-service_card>

                                    <x-slot name="heading3">
                                        Specialist in 3D document processing
                                    </x-slot>
                                    <x-slot name="paragraph">
                                        With unlimited creativity and imagination, of course we are very confident in
                                        the 3D world. Supported by the latest
                                        technology, we offer your 3D document processing services that are closer to
                                        reality.Our team will always be at the
                                        forefront by continuously encouraging creativity, innovation, collaboration with
                                        ideas from clients, and providing a
                                        professional business culture that promotes and rewards great ideas.
                                    </x-slot>
                                </x-service_card>
                            </div>
                            <div class="sm:w-1/2 lg:w-1/2 w-full">
                                <x-service_card>

                                    <x-slot name="heading3">
                                        Our Mission
                                    </x-slot>
                                    <x-slot name="paragraph">
                                        with what we have, we have a mission to help clients convey their ideas to
                                        others.With 3D it will really help the public
                                        understand the ideas and works of our clients, so that it will be clearer and
                                        more professional.
                                    </x-slot>
                                </x-service_card>
                            </div>
                            <div class="sm:w-1/2 lg:w-1/2 w-full">
                                <x-service_card>

                                    <x-slot name="heading3">
                                        Our Expertise
                                    </x-slot>
                                    <x-slot name="paragraph">
                                        The resources and knowledge we gain from years of dedication to the 3d
                                        visualization industry, allow us to work quickly
                                        and produce effective solutions for your projects. By collaborating with
                                        clients, and supported by sufficient
                                        experience, it will produce work that the client likes. We are very enthusiastic
                                        and proud to work there with you, and
                                        we hope to be a pretty good partner in the long run.

                                        As a company with the majority of members being architects, we know very well
                                        about new buildings or objects. However,
                                        in the 3D world, artistic impression is very necessary for marketing needs and
                                        increasing selling value. With our
                                        experience, all of that will be combined into something extraordinary for our
                                        success together.
                                    </x-slot>
                                </x-service_card>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full">
                    <div class="lg:mr-0 lg:ml-3 mx-3">
                        <x-hero.feature />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Section End -->
    <!-- Team Section Start -->

    <!-- Team Section End -->
    <!-- Clients Section Start -->

    <!-- Clients Section End -->

</x-public-layout>
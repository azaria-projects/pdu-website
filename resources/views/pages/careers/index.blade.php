@extends('layouts.app')

@include('pages.careers.scripts')

@section('content')
    <div class="app-content px-0">
        <div class="container-fluid d-flex flex-column px-0">
            <div class="banner-container px-0" style="background-image: url('{{ url('images/career-1.jpeg') }}')">
                <img src="{{ asset('icons/icon-white.svg') }}" width="60" height="60" alt="icon-pdu-white">
                <p class="title mb-0">CAREERS</p>
                <p class="sub-title mb-0">Build a hands-on career in energy by analyzing real-time geological data on drilling sites</p>
            </div>

            <div class="menu-container">
                <div class="list-menu px-4">
                    <div id="menu-opportunities" class="menu active"><span>Job Opportunities</span></div>
                    <div id="menu-descriptions" class="menu"><span>Job Descriptions</span></div>
                </div>
            </div>

            <div class="menu-content px-0 pb-0">
                {{-- opportunities --}}
                <div id="content-opportunities" class="content">
                    <div class="d-flex flex-column align-items-center" style="padding: 32px;">
                        <h2 class="title mb-3">WORK WITH US</h2>
                        <p class="description text-center">As a mudlogging company, we offers a unique opportunity to be part of the frontline of energy exploration. You'll gain hands-on experience with real-time geological data and cutting-edge drilling technologies. Every day brings new challenges, from analyzing rock cuttings to supporting critical drilling decisions. It's a dynamic environment that combines fieldwork, technology, and teamwork. We provide full training, career growth opportunities, and the chance to travel to diverse drilling sites. Join us and be part of a team that plays a vital role in powering the world.</p>
                        <div class="d-flex gap-3">
                            <span class="d-flex gap-2 align-items-center"><i class="ti ti-mail-spark"></i>email@mail.com</span>
                            <span class="d-flex gap-2 align-items-center"><i class="ti ti-mail-spark"></i>email@mail.com</span>
                        </div>
                    </div>

                    <img src="{{ asset('images/career-2.jpeg') }}" class="w-100" style="object-fit: cover;" height="450" alt="image-career-pdu">
                </div>

                {{-- descriptions --}}
                <div id="content-descriptions" class="content pt-0 d-none" style="padding: 32px;">
                    <div class="d-flex flex-column">
                        <h2 class="title mb-2">MUD LOGGER</h2>
                        <div class="ps-4">
                            <p class="description">As a Mud Logger, you will be responsible for monitoring and recording drilling activities and geological formations during well operations. You’ll collect and analyze cuttings samples, monitor gas readings, and ensure accurate documentation of drilling parameters. Real-time data interpretation and reporting are essential parts of the role. You’ll work closely with drilling and geology teams to support safe and informed decision-making. The position requires strong attention to detail, willingness to work in remote locations, and the ability to work long shifts. A degree in geology or a related field is preferred; prior field experience is a plus.</p>
                            <span class=""><i class="ti ti-list-check"></i> requirements</span>
                            <ol class="mt-1">
                                <li>Bachelor’s degree in Geology, Geoscience, or a related field</li>
                                <li>Strong observational and analytical skills</li>
                                <li>Willingness to work in remote locations and on rotation (e.g., 12-hour shifts, 28/28)</li>
                                <li>Ability to identify rock cuttings and interpret basic lithology</li>
                                <li>Familiarity with gas detection equipment and drilling operations is an advantage</li>
                                <li>Good communication skills and teamwork under pressure</li>
                                <li>Basic computer skills for data entry and reporting</li>
                            </ol>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <h2 class="title mb-2">DATA ENGINEER</h2>
                        <p class="description ps-4">The Data Engineer manages real-time data acquisition systems and ensures the integrity and quality of all collected drilling and formation data. You’ll calibrate sensors, maintain hardware/software, and troubleshoot any data transmission issues. Coordination with field teams and clients to deliver timely, accurate reports is a key part of the job. You'll also help integrate geological and drilling data for interpretation. Candidates should have a background in geoscience, computer science, or petroleum engineering. Familiarity with mudlogging software and rig site data systems is highly desirable.</p>
                        <div class="ps-4">
                            <span class=""><i class="ti ti-list-check"></i> requirements</span>
                            <ol class="mt-1">
                                <li>Degree in Geoscience, Computer Science, Petroleum Engineering, or related discipline</li>
                                <li>Experience with real-time data acquisition systems and software (e.g., Rigwatch, Pason, WITS/WITSML)</li>
                                <li>Strong troubleshooting skills for hardware and software issues</li>
                                <li>Understanding of drilling operations and wellsite data flow</li>
                                <li>Ability to work in field conditions and coordinate with remote support teams</li>
                                <li>Proficient in data visualization and reporting tools</li>
                                <li>Excellent organizational and time-management skills</li>
                            </ol>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

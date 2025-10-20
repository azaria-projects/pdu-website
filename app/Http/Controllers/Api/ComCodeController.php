<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\ComCode;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComCodeResource;
use App\Http\Collections\ResponseCollection;

use App\Http\Requests\ComCode\GetRequest;
use App\Http\Requests\ComCode\StoreRequest;
use App\Http\Requests\ComCode\UpdateRequest;

class ComCodeController extends Controller
{
    protected $sin;
    protected $plu;

    public function __construct() 
    {
        $this->sin = 'com_code';
        $this->plu = 'com_codes';
    }

    public function index(GetRequest $req)
    {
        $fil = $req->validated();
        $col = ComCode::searchable();
        $dat = ComCode::filter($fil, $col);
        $res = new ResponseCollection($dat);
        $mes = sprintf('%s data retrieved!', $this->plu);

        return APIResponse('success', $mes, $res, 200);
    }
    
    public function store(StoreRequest $req)
    {
        $val = $req->validated();
        $dat = ComCode::create($val);
        $res = new ComCodeResource($dat);
        $mes = sprintf('%s data has been created!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function show(ComCode $dat)
    {
        $dat = new ComCodeResource($dat);
        $mes = sprintf('%s found!', $this->sin);

        return APIResponse('success', $mes, $dat, 200);
    }

    public function update(UpdateRequest $req, ComCode $dat)
    {
        $val = $req->validated();
        $dat->update($val);

        $res = new ComCodeResource($dat);
        $mes = sprintf('%s data has been updated!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function destroy(ComCode $dat)
    {
        $dat->delete();
        $res = new ComCodeResource($dat);
        $mes = sprintf('%s data has been deleted!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function resetCareersCode()
    {
        $cd1 = <<<HTML
        <div class="d-flex flex-column align-items-center" style="padding: 0px 32px 32px 32px;">
            <h2 class="title mb-3">WORK WITH US</h2>
            <p class="description text-center">
                As a mudlogging company, we offers a unique opportunity to be part of the frontline of energy exploration.
                You'll gain hands-on experience with real-time geological data and cutting-edge drilling technologies.
                Every day brings new challenges, from analyzing rock cuttings to supporting critical drilling decisions.
                It's a dynamic environment that combines fieldwork, technology, and teamwork.
                We provide full training, career growth opportunities, and the chance to travel to diverse drilling sites.
                Join us and be part of a team that plays a vital role in powering the world.
            </p>
            <div class="d-flex gap-3">
                <span class="d-flex gap-2 align-items-center">
                    <i class="icon ti ti-mail-spark"></i>email@mail.com
                </span>
                <span class="d-flex gap-2 align-items-center">
                    <i class="icon ti ti-mail-spark"></i>email@mail.com
                </span>
            </div>
        </div>
        HTML;

        $cd2 = <<<HTML
        <div class="d-flex flex-column">
            <h2 class="title mb-2">MUD LOGGER</h2>
            <div class="desc-data">
                <p class="description">As a Mud Logger, you will be responsible for monitoring and recording drilling activities and geological formations during well operations. You’ll collect and analyze cuttings samples, monitor gas readings, and ensure accurate documentation of drilling parameters. Real-time data interpretation and reporting are essential parts of the role. You’ll work closely with drilling and geology teams to support safe and informed decision-making. The position requires strong attention to detail, willingness to work in remote locations, and the ability to work long shifts. A degree in geology or a related field is preferred; prior field experience is a plus.</p>
                <span class="req-data"><i class="ti ti-list-check"></i> requirements</span>
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
            <p class="description">The Data Engineer manages real-time data acquisition systems and ensures the integrity and quality of all collected drilling and formation data. You’ll calibrate sensors, maintain hardware/software, and troubleshoot any data transmission issues. Coordination with field teams and clients to deliver timely, accurate reports is a key part of the job. You'll also help integrate geological and drilling data for interpretation. Candidates should have a background in geoscience, computer science, or petroleum engineering. Familiarity with mudlogging software and rig site data systems is highly desirable.</p>
            <div class="desc-data">
                <span class="req-data"><i class="ti ti-list-check"></i> requirements</span>
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
        HTML;

        $cro = ComCode::where('name', 'careers-jb-opp-default')->firstOrFail();
        $crd = ComCode::where('name', 'careers-jb-desc-default')->firstOrFail();

        $cro->value = $cd1;
        $crd->value = $cd2;

        $cro->save();
        $crd->save();

        $res = [];
        $mes = sprintf('%s data has been reset!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }

    public function resetCompanyCode()
    {
        $cd1 = <<<HTML
        <div class="content-data">
            <h2 class="title ">PARAMA DATA UNIT (PDU)</h2>
            <small class="sub-title">lorem ipsum lorem ipsum lorem ipsum lorem ipsum.</small>
            <p class="description mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</p>
            
            <div class="row menu-feat">
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat">
                    <i class="ti ti-drop-circle"></i>
                    <span class="feat-value">106</span>
                    <span class="feat-desc">description</span>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat even">
                    <i class="ti ti-drop-circle"></i>
                    <span class="feat-value">106</span>
                    <span class="feat-desc">description</span>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat">
                    <i class="ti ti-drop-circle"></i>
                    <span class="feat-value">106</span>
                    <span class="feat-desc">description</span>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat even">
                    <i class="ti ti-drop-circle"></i>
                    <span class="feat-value">106</span>
                    <span class="feat-desc">description</span>
                </div>
            </div>

            <p class="details mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. </p>
            <q class="vision-mission"><b>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</b></q>
        </div>

        <div id="company-addresses">
            <p class="address mb-1">
                <i class="ti ti-map-2"></i>
                <span class="address-type">Office : </span>
                <span class="address-data">Jl. alternatif cibubur km 3.5 cibubur times square blok c1 no 19-21 Jatisampurna, Kota Bks, RT.001/RW.010, Jatikarya, Kec. Jatisampurna, Kota Bks, Jawa Barat 17435</span>
            </p>
            <p class="address">
                <i class="ti ti-map-2"></i>
                <span class="address-type">Workshop : </span>
                <span class="address-data">Jl. Cemp. No.1, RT.002/RW.008, Jatisampurna, Kec. Jatisampurna, Kota Bks, Jawa Barat 17435</span>
            </p>
        </div>
        HTML;

        $cmo = ComCode::where('name', 'company-desc-default')->firstOrFail();
        
        $cmo->value = $cd1;
        $cmo->save();

        $res = [];
        $mes = sprintf('%s data has been reset!', $this->sin);

        return APIResponse('success', $mes, $res, 200);
    }
}

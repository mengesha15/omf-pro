@extends('layouts.welcome_sider_nav')
@section('welcome_sidebar_content')
    <!-- Main content -->
    <section class="content">
        <div class="row" style="padding-left: 4%;">
            <div class="col-md-10" style="padding-top: 3%">
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h2>

                                OROMIA MICROFINANCE
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($sliders as $key => $slider)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                    <img src="{{url('uploads/event_photo', $slider->event_photo)}}" class="img-animation"  alt="...">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row" style="padding-right: 4%" id="omf-background">
                    <div class="col-md-12">
                        <h5><b>BACKGROUND</b></h5>
                        <p>
                            Oromia Credit & Saving S.C. (OCSSCO) is one of the largest & leading Microfinance Institutions in Ethiopia. The company was first established as Oromia Credit & Saving Rural Schemes Development Project/OCSRSDP/ under Oromo Self Help Organization/OSHO/on January 1, 1996 and later grown to a microfinance institution on August 4, 1997 getting its current name - OROMIA CREDIT & SAVING S.C.
                        </p>
                        <p>
                            Today, OCSSCO has 339 branches operating mainly in the regional state of Oromia, Harar, Finfine (Addis Ababa) and Dire Dawa. In the past 20 years, the company has also been able to register tremendous achievements in all its operations and capital formation. Its capital and assets have currently grown to 2.1 Billion ETB & 8.71 Billion ETB respectively. Similarly, the company has demonstrated notable performances in expanding client outreach, enhancing disbursement and saving mobilization.
                        </p>
                    </div>
                    <div class="col-md-12" id="omf-about">
                        <h5><b>ABOUT</b></h5>
                        <p>
                            The establishment of microfinance institutions (MFIs) in Ethiopia is a recent phenomenon. The proclamation, which provides for the establishment of microfinance institution issued in July 1996. Since then, various MFIs have legally registered and started delivering microfinance service for different small and micro enterprises (SMEs). MFIs are an asset to the developing and transition countries. The services they provide are tailored to meet the needs and aspirations of the local inhabitants and emphases are towards the poor.  Microfinance gives people new opportunities by helping them to get and secure finances to equalize the chances and make them responsible for their own future endeavors. It plays both economic and social roles by improving the living conditions of the people as cited by. Further, some MFIs provide social intermediation services such as the formation of groups, development of self-confidence and the training of members in that group on financial literacy and management.
                        </p>
                        <p>
                            Oromia Credit & Saving Company (OCSC) is one of the largest & leading Microfinance Institutions in Ethiopia. The company was first established as Oromia Credit & Saving Rural Schemes Development Project under Oromo self Help Organization on January 1, 1996 and later grown to a microfinance institution on August 4, 1997 getting its current name - Oromia Credit & Saving Company.
                        </p>
                        <p>
                            Today, Oromia Credit & Saving Company has above 400 branches operating mainly in the regional state of Oromia, Harar, Addis Ababa, and Dire Dawa. In the past 25 years, the company has also been able to register tremendous achievements in all its operations and capital formation. Similarly, the company has demonstrated notable performances in expanding client outreach, enhancing disbursement and saving mobilization.
                        </p>
                        <h4>Mission of the organization</h4>
                        <p>
                            Provide affordable, innovative and customers responsive financial services to rural and urban economically active people to improve their income.
                        </p>
                        <h4>Vision of the organization</h4>
                        <p>
                            Aspire to be world class MFI contributing to economically empowered and transformed society.
                        </p>
                    </div>
                    <div  id="saving-services">
                        <h5><b>SAVING SERVICES</b></h5>
                    </div>
                    <div class="col-md-12" id="regular-saving">
                        <h3>Regular saving</h3>
                        <p>
                            Regular saving is non-contractual saving that allows savers to withdraw their deposits at any time during the period.
                        </p>
                    </div>
                    <div class="col-md-12" id="handhura-saving">
                        <h3>Handhura saving</h3>
                        <p>
                            Hhandura is a savings product aimed at parents and other relatives who want to save for future expenses, school fees, and resources for their children or children under their guardianship (protection). In addition to wealth accumulation for future uses, “handura” saving also used as one of the tools to educate the community including the children about savings and also used to promote saving culture early in the childhood.
                        </p>
                    </div>
                    <div class="col-md-12" id="women-saving">
                        <h3>Women saving</h3>
                        <p>
                            Women saving is a voluntary saving type that targets only women. It provides a special interest to its clients in order to encourage women to save and invest.
                        </p>
                    </div>
                    <div class="col-md-12" id="sorema-saving">
                        <h3>Sorema saving</h3>
                        <p>
                            Sorema is a long-term contracted savings plan intended to mobilize savings from people during their productive years, when they are making more money, invested with special interest rates and withdrawn for investment, family or self-employment, or to cover potential expected or unplanned expenses.
                        </p>
                    </div>
                    <div class="col-md-12" id="noninterest-saving">
                        <h3>Non-interest saving</h3>
                        <p>
                            It is a passbook type of saving designed for customers who prefer to open saving account without interest to be paid on the balance
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <p style="text-align: center">Saving services</p>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service name</th>
                                        <th>Service description</th>
                                        <th>Interest rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saving_services as $saving_service)
                                    <tr>
                                        <td>{{ $saving_service->id }}</td>
                                        <td>{{ $saving_service->saving_service_name }}</td>
                                        <td>{{ $saving_service->saving_service_description }}</td>
                                        <td>{{ $saving_service->saving_service_interest_rate }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div  id="loan-services">
                        <h5><b>LOAN SERVICES</b></h5>
                    </div>
                    <div class="col-md-12" id="solidarity-group-loan">
                        <h3>Solidarity group loan (SGBL)</h3>
                        <p>
                            The Self-Organized Groups a Microloan (SGBL) is a microloan for self-organized groups in rural and urban areas. In rural areas, it primarily targets women and unemployed youth, while in urban areas, it primarily targets women and unemployed youth. Agricultural inputs and land and agricultural machinery rentals are the main reasons for rural group based loans, while petty business practices are the main reason for urban group based loans.
                        </p>
                    </div>
                    <div class="col-md-12" id="bussiness-loan">
                        <h3>Bussiness loan (BL)</h3>
                        <p>
                            BL is a loan type offered by the company's branch offices in towns. It aim at individual business owners who want to expand their operations by obtaining credit. For their loan request, the operators must present matching collateral.
                        </p>
                    </div>
                    <div class="col-md-12" id="msel">
                        <h3>Micro and Small Enterprise loan (MSEL)</h3>
                        <p>
                            MSEL aims to help graduates of higher education institutions, as well as other unemployed youths and entrepreneurs, create a structured business enterprise or cooperative, such as a cooperative, a sole proprietorship, a partnership, a share company, or a private limited company.The organization prioritizes financing MSEs that can contribute to economic development, industrial transition, and sectors that can generate more job opportunities, according to the latest national MSE financing strategy.

                        </p>
                    </div>
                    <div class="col-md-12" id="wedpl">
                        <h3>Women entrepreneur's development program loan (WEDPL)</h3>
                        <p>
                            The aim of the WEDP loan is to provide financial support to women-owned businesses or enterprises. Individual women-owned businesses and incorporated women-owned businesses in any of the following business types: sole proprietorships, private limited companies, share companies, and partnerships registered with the appropriate bodies are the key goals.
                        </p>
                    </div>
                    <div class="col-md-12" id="general-purpose-loan">
                        <h3>General purpose loan</h3>
                        <p>
                            GPL is one of OCSS's loan programs for permanent workers. It isfor a variety of purposes, including medicine, education, purchasing household appliances, covering wedding expenses, running personal businesses, and so on.
                        </p>
                    </div>
                    <div class="col-md-12" id="housing-loan">
                        <h3>Housing loan</h3>
                        <p>
                            OCSSC offers housing loans to its workers in order to support the government's efforts to alleviate housing shortages in the region's towns. Permanent government and non-government employees, police officers, and government appointee officials who can provide a guarantor or collateral are eligible for HL.
                        </p>
                    </div>
                    <div class="card">
                     <div class="card-body">
                        <div>
                            <p style="text-align: center">Loan services</p>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Service name</th>
                                    <th>Service description</th>
                                    <th>Interest rate</th>
                                    <th>Loan term</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loan_services as $loan_service)
                                <tr>
                                    <td>{{ $loan_service->id }}</td>
                                    <td>{{ $loan_service->loan_service_name }}</td>
                                    <td>{{ $loan_service->loan_service_description }}</td>
                                    <td>{{ $loan_service->loan_service_interest_rate }}</td>
                                    <td>{{ $loan_service->loan_term }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     </div>
                    </div>
                    {{-- <div class="col-md-12" id="job-vacancy">
                        <h1><b>job-vacancy</b></h1>
                    </div> --}}
                    <div class="col-md-12" id="omf-contacts">
                        <h5><b>Contacts</b></h5>
                        <div class="row">
                            <div class="col-md-3">
                                Phone: <br>
                                <p><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <span> +251 115 57 11 60</span></p>
                                Fax:
                                <p>
                                    <span>
                                        <p>
                                            <i class="fa fa-fax" aria-hidden="true"></i>&nbsp;

                                        +251115571152
                                        </p>
                                        <p>
                                            <i class="fa fa-fax" aria-hidden="true"></i>&nbsp;
                                        +251115571157
                                        </p>
                                        <p>
                                            <i class="fa fa-fax" aria-hidden="true"></i>&nbsp;
                                        +251115571169
                                        </p>
                                        <p>E-mail: ocssco@oromiamfi.com</p>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <h3>Head office, Addis Ababa</h3>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1314.9893632910016!2d38.775837444089454!3d9.016655059231498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b859e55555555%3A0x90dd74724ac6eaf4!2sOromia%20Credit%20and%20Saving%20S.C!5e0!3m2!1sen!2set!4v1629049195684!5m2!1sen!2set"
                                    width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-2" style="background-color:rgb(192, 192, 192)">
                <div class="sidebar-right">
                    <div class="sidebar">
                        <div class="col-md-12">
                            <h4>Social media</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #3b5998;" href="https://www.facebook.com/oromiamicrofinance/" role="button"
                                ><i class="fab fa-facebook-f">acebook</i
                              ></a>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #55acee;" href="https://twitter.com/ocssco1?lang=en!" role="button"><i class="fab fa-twitter me-2"></i>&nbsp;Twitter</a>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i>oogle+</i></a>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #0082ca;" href="https://www.linkedin.com/company/oromia-credit-saving-s-c/" role="button"><i class="fab fa-linkedin-in"></i>&nbsp;Linkedln</a>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #ed302f;" href="#!" role="button"><i class="fab fa-youtube">&nbsp;Youtube</i></a>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="background-color: #25d366;" href="#!" role="button"><i class="fab fa-whatsapp">&nbsp; Whatsapp</i></a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>
    <script>
        // to aviod hidden the part of same
        window.addEventListener("hashchange", function () {
    window.scrollTo(window.scrollX, window.scrollY - 100);
});
    </script>
    <script type="text/javascript">
        var map;
        var centerPos = new google.maps.LatLng(-37.8046274,144.972156);
        var zoomLevel = 12;
        function initialize() {
          var mapOptions = {
            center: centerPos,
            zoom: zoomLevel
          };
          map = new google.maps.Map( document.getElementById("map-canvas"), mapOptions );
        }
        google.maps.event.addDomListener(window, 'load', initialize);
      </script>
@endsection

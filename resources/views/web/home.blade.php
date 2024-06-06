@extends('layouts2.frontend.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .select2.select2-container,
    .select2.select2-container .select2-selection {
        background-color: rgba(121, 134, 151, 0.7);
        border: none;
        border-radius: 5px;
        width: 100%;
        height: 42px;
        color: #fff;
        font-size: 14px;
        margin-bottom: 30px;
        outline: none;
    }

    .select2-container-default.select2-selection-single .select2-selection_rendered {
        color: #fff;
    }
</style>

@endpush

@section('body')

  <!-- ***** Main Banner Area Start ***** -->
  <div class="swiper-container" id="top">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
      <div class="slide-inner" style="background-image: url('{{ asset('frontend/images/slide-01.jpg') }}')">


          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                <h2>Siapkan <em>pengiriman</em> bisnis Anda<br>&amp; tingkatkan <em>semua aspek</em></h2>
                  <div class="div-dec"></div>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="#">Temukan lebih banyak</a>
                    </div>
                    <div class="orange-button">
                      <ul class="navbar-nav d-lg-block d-none">
                          <li class="nav-item">
                              <a href="https://wa.me/6287725728155" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">TANYA ADMIN</a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
      <div class="slide-inner" style="background-image:url('{{ asset('frontend/images/slide-02.jpg') }}')">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2><em>Digital</em> Currency for you <br>&amp; Best <em>Crypto</em> Tips</h2>
                  <div class="div-dec"></div>
                  <p>You will see a bunch of free CSS templates when you search on Google. TemplateMo website is probably the best one because it is 100% free. It does not ask you anything in return. You have a total freedom to use any template for any purpose.</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="#">Temukan lebih banyak</a>
                    </div>
                    <div class="orange-button">
                      <ul class="navbar-nav d-lg-block d-none">
                          <li class="nav-item">
                              <a href="https://wa.me/6287725728155" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">TANYA ADMIN</a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
      <div class="slide-inner" style="background-image:url('{{ asset('frontend/images/slide-03.jpg') }}')">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>Best One in Town<br>&amp; Crypto <em>Services</em></h2>
                  <div class="div-dec"></div>
                  <p>When you browse through different tags on TemplateMo website, you can see a variety of CSS templates which are responsive website designs for different individual needs. Please tell your friends about our website. Thank you.</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="#">Temukan lebih banyak</a>
                    </div>
                    <div class="orange-button">
                      <ul class="navbar-nav d-lg-block d-none">
                          <li class="nav-item">
                              <a href="https://wa.me/6287725728155" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">TANYA ADMIN</a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>

  <!-- ***** Main Banner Area End ***** -->

  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-archive"></i>
            <h4>CSS Templates</h4>
            <p>TemplateMo website is the best for you to explore and download free website templates.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-cloud"></i>
            <h4>HTML5 Web Pages</h4>
            <p>Templates are based on Bootstrap 5 CSS framework. You can easily adapt or modify based on your needs.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-charging-station"></i>
            <h4>Responsive Designs</h4>
            <p>All of our CSS templates are 100% free to use for commercial or business websites.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-suitcase"></i>
            <h4>Mobile and Tablet ready!</h4>
            <p>Our HTML CSS templates are well-tested on mobile, tablet, and desktop compatibility.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-archway"></i>
            <h4>Fast Customer Support</h4>
            <p>Do not be hesitated to contact us if you have any question or concern about our templates.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-puzzle-piece"></i>
            <h4>Fully Customizable</h4>
            <p>If you have any idea or suggestion about new templates, feel free to let us know.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <h4>Business <em>Solutions</em> and <strong>Crypto</strong> Investments</h4>
        </div>
        <div class="col-lg-7">
          <div class="buttons">
            <div class="green-button">
              <a href="#">Temukan lebih banyak</a>
            </div>
            <div class="orange-button">
              <a href="#">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>About Us</h6>
            <h4>Know Us Better</h4>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="active gradient-border"><span>Web Design</span></div>
                    <div class="gradient-border"><span>Graphics</span></div>
                    <div class="gradient-border"><span>Web Coding</span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Deadline</span>
                          <span class="title">Client</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Website Redesign</span>
                          <span class="item">$1,500 to $2,200</span>
                          <span class="item">2022 Dec 12</span>
                          <span class="item">Web Biz</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Website Renovation</span>
                          <span class="item">$2,500 to $3,600</span>
                          <span class="item">2022 Dec 10</span>
                          <span class="item">Online Ads</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Marketing Plan</span>
                          <span class="item">$2,500 to $4,200</span>
                          <span class="item">2022 Dec 8</span>
                          <span class="item">Web Biz</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">All-new Website</span>
                          <span class="item">$3,000 to $6,600</span>
                          <span class="item">2022 Dec 2</span>
                          <span class="item">Web Presence</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Deadline</span>
                          <span class="title">Client</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Graphics Redesign</span>
                          <span class="item">$500 to $800</span>
                          <span class="item">2022 Nov 24</span>
                          <span class="item">Media One</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Digital Graphics</span>
                          <span class="item">$1,500 to $3,000</span>
                          <span class="item">2022 Nov 18</span>
                          <span class="item">Second Media</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">New Artworks</span>
                          <span class="item">$2,200 to $4,400</span>
                          <span class="item">2022 Nov 10</span>
                          <span class="item">Artwork Push</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">Complex Arts</span>
                          <span class="item">$1,100 to $2,400</span>
                          <span class="item">2022 Nov 3</span>
                          <span class="item">Media One</span>
                        </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Estimated</span>
                          <span class="title">Technology</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Backend Coding</span>
                          <span class="item">$2,000 to $5,000</span>
                          <span class="item">2022 Nov 28</span>
                          <span class="item">PHP MySQL</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">New Web App</span>
                          <span class="item">$1,500 to $3,000</span>
                          <span class="item">2022 Nov 18</span>
                          <span class="item">Python Programming</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Frontend Interactions</span>
                          <span class="item">$3,000 to $6,000</span>
                          <span class="item">2022 Nov 10</span>
                          <span class="item">JavaScripts</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">Video Creations</span>
                          <span class="item">$1,800 to $4,400</span>
                          <span class="item">2022 Nov 3</span>
                          <span class="item">Multimedia</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-content">
            <h4>Please tell us about your idea and how you want it to be</h4>
            <p>You are allowed to use this template for your websites. You are <b>NOT allowed</b> to redistribute the template ZIP file on any other template websites.<br><br>Thank you for downloading and using our templates. Please tell your friends about our website.</p>
            <div class="green-button">
              <a href="about-us.html">Temukan lebih banyak</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="calculator">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="left-image">
          <img src="{{ asset('frontend/images/calculator-image.png') }}" alt="">
          </div>
         </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>Cargo</h6>
            <h4>From Order</h4>
          </div>
          <form id="calculate" action="/web/orders" method="post">
            @csrf
            <div class="row">
            <div class="col-lg-6">
                <fieldset>
                  <label for="name">Nama Muatan</label>
                  <input type="text" name="nama_muatan" id="nama_muatan" placeholder="" autocomplete="on" required>
                </fieldset>
            </div>
            <div class="col-lg-6">
                <fieldset>
                  <label for="name">Berat Muatan (Kg)</label>
                  <input type="number" name="berat_muatan" id="berat_muatan" placeholder="" autocomplete="on" required>
                </fieldset>
            </div>
            <div class="col-lg-12">
                <fieldset>
                  <label for="name">Waktu Muat barang</label>
                  <input type="datetime-local" name="waktu_muat"  placeholder="" autocomplete="on" required>
                </fieldset>
            </div>


            <div class="col-lg-12">
                <fieldset>
                  <label for="muat_kelurahanId" class="form-label">Muat Kelurahan</label>
                    <select name="muat_kelurahan_id" class="form-select selectKelurahan" aria-label="Default select example" id="muat_kelurahanId" onchange="this.form.click()">
                    </select>
                    </fieldset>
                  </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Alamat lengkap Muat Barang</label>
                  <input type="text" name="muat_alamat" placeholder="" autocomplete="on" required>
                </fieldset>
            </div>
            <div class="col-lg-12">
                                <fieldset>
                                    <label for="bongkar_kelurahanId" class="form-label">Bongkar Kelurahan</label>
                                    <select name="bongkar_kelurahan_id" class="form-select selectKelurahan" aria-label="Default select example" id="bongkar_kelurahanId" onchange="this.form.click()">
                                    </select>
                                </fieldset>
                            </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Alamat lengkap Bongkar Barang</label>
                  <input type="text" name="bongkar_alamat"  placeholder="" autocomplete="on" required>
                </fieldset>
            </div>
            <div class="col-lg-12">
                <fieldset>
                  <label for="armadaId" class="form-label">Pilih Armada</label>
                  <select name="armada_id" class="form-select" aria-label="Default select example" id="armadaId" onchange="this.form.click()">
                  <option>Pilih Armada</option>
                    @foreach($armada as $arm)
                      <option value="{{ $arm->id }}">{{ $arm->name }}</option>
                    @endforeach
                  </select>
              </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="name">Nama Anda</label>
                  <input type="text" name="name" id="name" placeholder="" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="email">Address</label>
                  <input type="text" name="address" id="address" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="subject">Telephone</label>
                  <input type="text" name="phone" id="phone" placeholder="" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Submit Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h4>What They Say</h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>“Donec et nunc massa. Nullam non felis dignissim, dapibus turpis semper, vulputate lorem. Nam volutpat posuere tellus, in porttitor justo interdum nec. Aenean in dapibus risus, in euismod ligula. Aliquam vel scelerisque elit.”</p>
              <h4>David Eigenberg</h4>
              <span>CEO of Mexant</span>
              <div class="right-image">
              <img src="{{ asset('frontend/images/testimonials-01.jpg') }}" alt="">
              </div>
            </div>
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>“Etiam id ligula risus. Fusce fringilla nisl nunc, nec rutrum lectus cursus nec. In blandit nibh dolor, at rutrum leo accumsan porta. Nullam pulvinar eros porttitor risus condimentum tempus.”</p>
              <h4>Andrew Garfield</h4>
              <span>CTO of Mexant</span>
              <div class="right-image">
                <img src="{{ asset('frontend/images/testimonials-01.jpg') }}" alt="">
              </div>
            </div>
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>“Ut dictum vehicula massa, ac pharetra leo tincidunt eu. Phasellus in tristique magna, ac gravida leo. Integer sed lorem sapien. Ut viverra mauris sed lobortis commodo.”</p>
              <h4>George Lopez</h4>
              <span>Crypto Manager</span>
              <div class="right-image">
                <img src="{{ asset('frontend/images/testimonials-01.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="partners">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="{{ asset('frontend/images/client-01.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.selectKelurahan').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '/search-kelurahan',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
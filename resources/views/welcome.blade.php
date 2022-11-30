@extends('layouts.app')

@section('style_css')


@section('content')


<!-- Header -->
<header id="header" class="header">
  <div class="container-lg">
      <div class="row">
          <div class="col-lg-5">
      
              <div class="text-container">
                  <h1 class="h1-large">Istražite ponudu usluga u vašem gradu!</h1>

                  <p class="p-large">Gllity ti pomaže da pronađeš najbolje salone, spa centre, stomatološke ordinacije i još mnogo toga, uz mogućnost online zakazivanja termina. </p>
             <div class="input-group mb-3">
                   <input type="text" class="form-control btn-solid-src1" placeholder="Pretraga usluga i salona..."  >
                 <div class="input-group-append">
                  <button class="btn btn-solid-src" type="button">Traži</button>
                     </div>
                   </div>



              </div> <!-- end of text-container -->
          </div> <!-- end of col -->
          <div class="col-lg-7">
  
  
  
  
      <!-- Card Slider -->
              <div class="slider-container">
                  <div class="swiper-container card-slider-header">
                      <div class="swiper-wrapper">
                        
            


                        @foreach(App\Slide::all() as $key => $slider)
                          <!-- Slide -->
                          <div class="swiper-slide {{$key == 0 ? 'active' : '' }}">
                              <div class="card">
                                  <div class="card-body">
                                      <img class="img-fluid" src="{{url('admin/images/slides', $slider->slide)}}" style="width:100%;" alt="alternative">
                                  </div>
                              </div> 
                          </div> <!-- end of swiper-slide -->
                          <!-- end of slide -->
                        @endforeach
        
  
                      </div> <!-- end of swiper-wrapper -->
  
                      <!-- Add Arrows -->
                      <div class="swiper-button-next"></div>
                      <div class="swiper-button-prev"></div>
                      <!-- end of add arrows -->
  
                  </div> <!-- end of swiper-container -->
              </div> <!-- end of slider-container -->
              <!-- end of card slider -->
  

              
          </div> <!-- end of col -->
      </div> <!-- end of row -->
  </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->


        <!-- Services -->
    <div id="category" class="cards-2 bg-gray">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
               
                  <h2 class="h2-heading">Kategorije usluga</h2>
              </div> <!-- end of col -->
          </div> <!-- end of row -->
          <div class="row">
              <div class="col-lg-12">
                  
                @foreach (App\Service_Category::all() as $service)
                  <!-- Card -->
                  <div class="card">
                      <div class="card-image">
                          <img class="img-fluid" src="{{url('admin/images/category')}}/{{$service->cat_image}}" alt="alternative">
                      </div>
                      <div class="card-body">
                          <div class="price"> <a href="{{url('category')}}"><h5 class="card-title">{{$service->cat_name}}</h5></a></div>
                      </div>
                      
                  </div>
                  <!-- end of card -->
                  @endforeach

              </div> <!-- end of col -->
          </div> <!-- end of row -->
      </div> <!-- end of container -->
  </div> <!-- end of cards-2 -->
  <!-- end of services -->



  <!-- Customers -->
  <div id="istaknuta" class="slider-2">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h4>Istaknuta mjesta.</h4>
                  <hr class="section-divider">
        
        <!-- Card Slider -->
                  <div class="slider-container">
                      <div class="swiper-container card-slider">
                          <div class="swiper-wrapper">
                              
                              <!-- Slide -->
                              <div class="swiper-slide">
                                  <div class="card">
                                      <div class="card-body">
                                          
                    <div class="details">
                                              <img class="testimonial-image" src="theme/images/testimonial-1.jpg" alt="alternative">
                                              <div class="text">
                                                 <div class="testimonial-author">Salon Name</div>
                                                    <div class="occupation"><i class="fas fa-map-marker-alt"></i> Nikole Koljevića 12, Sarajevo</div>
                                              </div> <!-- end of text -->
                                          </div> <!-- end of testimonial-details -->
                                      </div>
                                  </div> 
                              </div> <!-- end of swiper-slide -->
                              <!-- end of slide -->

                               <!-- Slide -->
                              <div class="swiper-slide">
                                  <div class="card">
                                      <div class="card-body">
                                        
                    <div class="details">
                                              <img class="testimonial-image" src="theme/images/testimonial-1.jpg" alt="alternative">
                                              <div class="text">
                                                 <div class="testimonial-author">Salon Name</div>
                                                    <div class="occupation"><i class="fas fa-map-marker-alt"></i> Nikole Koljevića 12, Sarajevo</div>
                                              </div> <!-- end of text -->
                                          </div> <!-- end of testimonial-details -->
                                      </div>
                                  </div> 
                              </div> <!-- end of swiper-slide -->
                              <!-- end of slide -->
               <!-- Slide -->
                              <div class="swiper-slide">
                                  <div class="card">
                                      <div class="card-body">
                                          
                    <div class="details">
                                              <img class="testimonial-image" src="theme/images/testimonial-1.jpg" alt="alternative">
                                              <div class="text">
                                                 <div class="testimonial-author">Salon Name</div>
                                                     <div class="occupation"><i class="fas fa-map-marker-alt"></i> Nikole Koljevića 12, Sarajevo</div>
                                              </div> <!-- end of text -->
                                          </div> <!-- end of testimonial-details -->
                                      </div>
                                  </div> 
                              </div> <!-- end of swiper-slide -->
                              <!-- end of slide -->
               <!-- Slide -->
                              <div class="swiper-slide">
                                  <div class="card">
                                      <div class="card-body">
                                          
                    <div class="details">
                                              <img class="testimonial-image" src="theme/images/testimonial-1.jpg" alt="alternative">
                                              <div class="text">
                                                 <div class="testimonial-author">Salon Name</div>
                                                      <div class="occupation"><i class="fas fa-map-marker-alt"></i> Nikole Koljevića 12, Sarajevo</div>
                                              </div> <!-- end of text -->
                                          </div> <!-- end of testimonial-details -->
                                      </div>
                                  </div> 
                              </div> <!-- end of swiper-slide -->
                              <!-- end of slide -->
               <!-- Slide -->
                              <div class="swiper-slide">
                                  <div class="card">
                                      <div class="card-body">
                                          
                    <div class="details">
                                              <img class="testimonial-image" src="theme/images/testimonial-1.jpg" alt="alternative">
                                              <div class="text">
                                                 <div class="testimonial-author">Salon Name</div>
                                                  <div class="occupation"><i class="fas fa-map-marker-alt"></i> Nikole Koljevića 12, Sarajevo</div>
                                              </div> <!-- end of text -->
                                          </div> <!-- end of testimonial-details -->
                                      </div>
                                  </div> 
                              </div> <!-- end of swiper-slide -->
                              <!-- end of slide -->
      
                          </div> <!-- end of swiper-wrapper -->
      
                          <!-- Add Arrows -->
                          
                          <!-- end of add arrows -->
      
                      </div> <!-- end of swiper-container -->
                  </div> <!-- end of slider-container -->
                  <!-- end of card slider -->
        
        
        
        
        

              </div> <!-- end of col -->
          </div> <!-- end of row -->
      </div> <!-- end of container -->
  </div> <!-- end of slider-1 -->
  <!-- end of customers -->


 

  <!-- Features -->
  <div id="features" class="cards-1">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h2 class="h2-heading">Kako funkcioniše?</h2>
                  <p class="p-heading">Gllity je stvoren kako bi svakom korisniku priuštio jednostavno korištenje i nezaboravno iskustvo.</p>
              </div> <!-- end of col -->
          </div> <!-- end of row -->
          <div class="row">
              <div class="col-lg-12">
                  
                  <!-- Card -->
                  <div class="card">
                      <div class="card-icon-wrapper">
                          <div class="card-icon">
                              <span class="fas fa-search"></span>
                          </div>
                      </div>
                      <div class="card-body">
                          <h4 class="card-title">Otkrijte</h4>
                          <p>Pronađite najbolje beauty salone, wellness centre, tattoo studije i mnoge druge usluge...</p>
                         
                      </div>
                  </div>
                  <!-- end of card -->

                  <!-- Card -->
                  <div class="card">
                      <div class="card-icon-wrapper">
                          <div class="card-icon">
                              <span class="fas fa-calendar-alt"></span>
                          </div>
                      </div>
                      <div class="card-body">
                          <h4 class="card-title">Zakažite</h4>
                          <p>Odaberi uslugu, pogledaj slobodne termine i zakažite svoj termin u samo par klikova.</p>
                          </div>
                  </div>
                  <!-- end of card -->

                  <!-- Card -->
                  <div class="card">
                      <div class="card-icon-wrapper">
                          <div class="card-icon">
                              <span class="fas fa-heart"></span>
                          </div>
                      </div>
                      <div class="card-body">
                          <h4 class="card-title">Uživajte</h4>
                          <p>Opustite se i uživajte u jedinstvenim trenutcima i širokoj ponudi usluga.</p>
                           </div>
                  </div>
                  <!-- end of card -->

              </div> <!-- end of col -->
          </div> <!-- end of row -->
      </div> <!-- end of container -->
  </div> <!-- end of cards-1 -->
  <!-- end of features -->


@endsection

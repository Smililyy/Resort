<?php include("pages/header.php") ?>
  <div class="booking-container">
  <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
              <div class="container-fluid flex-lg-column align-item-stretch">
                <h4 class="mt-2">FILTERS</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-item-stretch mt-2" id="filterDropdown">
                  <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                      <label class="form-label">Check-in</label>
                      <input type="date" class="form-control shadow-none mb-3">
                      <label class="form-label">Check-out</label>
                      <input type="date" class="form-control shadow-none">
                  </div>
                  <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                      <div class="mb-2">
                          <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                          <label class="form-check-label" for="f1">Facility one</label>
                      </div>
                      <div class="mb-2">
                          <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                          <label class="form-check-label" for="f2">Facility two</label>
                      </div> 
                      <div class="mb-2">
                          <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                          <label class="form-check-label" for="f3">Facility three</label>
                      </div>
                  </div>
                  <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                      <div class="d-flex">
                          <div class="me-3">
                              <label class="form-label">Adults</label>
                              <input type="number" class="form-control shadow-none">
                          </div>
                          <div>
                              <label class="form-label">Childrens</label>
                              <input type="number" class="form-control shadow-none">
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4">
          <div class="card mb-4 border-0 shadow">
              <div class="row g-0 p-3 align-item-center">
                <div class="col-md-5">
                  <img src="elite.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-5">
                  <h5 class="mb-1">Normal Room</h5>
                  <div class="features mb-3">
                      <h6 class="mb-1">Features</h6>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          2 Rooms
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          2 Bathrooms
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          1 Balcony
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          2 Sofa
                      </span>
                      
                  </div>
                  <div class="facilities mb-3">
                      <h6 class="mb-1">Facilities</h6>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          Wifi
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          Television
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          AC
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          Room heater
                      </span>
                      
                  </div>
                  <div class="guests mb-3">
                      <h6 class="mb-1">Guests</h6>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          4 Adults
                      </span>
                      <span class="badge rounde-pill bg-light text-dark text-wrap">
                          2 Childrens
                      </span>
                  </div>
                </div>
                <div class="col-md-2">
                  <div>
                      <h6 class="mb-4">1.750.000 per night</h6>
                      <a href="" class="btn btn-info text-white shadow-none mb-2">Book</a><br>
                      <a href="" class="btn btn-sm btn-outline-dark shadow-none">Details</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>
<?php include("pages/footer.php") ?>
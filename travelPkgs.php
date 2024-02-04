<?php 
     $title =" Manage Tour Packages ";
include 'header.php'; ?>
        </section>
        <!-- Tour Plan -->

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>THRILLING TOUR PLANS</h1>
                    </div>
                </div>
                <div class="container text-center mt-2">
                    <div class="row tourPlanCards">
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/sri-dalada-maligawa.jpg"
                                        alt="Temple of tooth">
                                    <div class="card-body">
                                        <h5 class="card-title">Kandy</h5>
                                        <p class="card-text">The Temple of the Sacred Tooth Relic, or Sri Dalada
                                            Maligawa,
                                            is a Buddhist temple in Kandy,
                                            Sri Lanka</p>
                                        <a href="#" class="btn btn-warning" onclick="togglepopup()">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/Arch-Bridge-Train.jpg"
                                        alt="Ella Nine Arch Bridge">
                                    <div class="card-body">
                                        <h5 class="card-title">Ella</h5>
                                        <p class="card-text">Laid-back Ella draws travellers to Sri Lanka's
                                            highlands with its mountain forests, tea plantations, relatively
                                            climate.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/yala-resting-leopard.jpg"
                                        alt="Yala National Safari Park">
                                    <div class="card-body">
                                        <h5 class="card-title">Yala</h5>
                                        <p class="card-text"> Yala is best known for its variety of wildlife and is
                                            important
                                            of Sri Lankan elephants, Sri Lankan leopards.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row tourPlanCards">
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/hikkaduwa-marine.jpg"
                                        alt="Hikkaduwa Marine Adventures">
                                    <div class="card-body">
                                        <h5 class="card-title">Hikkaduwa</h5>
                                        <p class="card-text">Hikkaduwa is a world famous beach holiday destination, for
                                            its
                                            scenic beaches,
                                            coral reef sanctuary, surfing and nightlife.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/udawalawa.jpg" alt="Udawalawa">
                                    <div class="card-body">
                                        <h5 class="card-title">Udawalawa</h5>
                                        <p class="card-text">Udawalawe is famous for its herd around 250 elephants,
                                            that are quite easy spot grazing on surrounding grasslands.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/dolphin-watching.jpg"
                                        alt="whale-and-dolphin-watching">
                                    <div class="card-body">
                                        <h5 class="card-title">Galle</h5>
                                        <p class="card-text">Not only can you see them, you can also swim with dolphins
                                            in
                                            Sri Lanka,
                                            which is an never to be forgotten!</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--tourPlan-->
        </section>
        <section id="services">
            <div class="service-header text-center">
                <div class="row">
                    <div class="col">
                        <h1>Manage Tour Plans</h1>
                    </div>
                </div>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                confirmed
                                </label>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div> <!--Services-->
        </section>

        
<?php include 'footer.php'; ?>
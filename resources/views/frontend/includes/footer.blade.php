  <!--Newsletter-->
        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h2 class="tit">SUBSCREVA A NOSSA NEWSLETTER</h2>
                                <br/>
                                <form action="{{ route('subscrever')}}" method="POST">
                                    @csrf
                            <div class="input-group">
                                <input type="email" class="form-control formcontrol-email @error('email') is-invalid @enderror" name="email"
                                    placeholder="Enter email to subscribe" value="{{old('email')}}">

                                    <span class="input-group-btn">

                                         <button class="btn btn-subscribe" type="submit">Subscrever</button></span>
                                          @error('email')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                             </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fim newsletter-->
        <!--Footer-->

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-bottom">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <img src="{{asset('frontend/img/logolilas2.png')}}" width="170" height="52" alt="">
                    </a>

                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                      <li class="ms-3"><a class="text-muted" href="https://m.youtube.com/channel/UCjuCmsr8TcWvui79dFYPPVA"><i class="bi bi-youtube"
                                style="font-size: 18pt; color: #692f8f;"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/mwlite/in/jo%C3%A3o-dono-57944416a"><i class="bi bi-linkedin"
                                style="font-size: 18pt; color: #692f8f;"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/joao.dono"><i class="bi bi-facebook"
                                style="font-size: 18pt; color: #692f8f;"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="https://instagram.com/joaodonooficial?igshid=YmMyMTA2M2Y="><i class="bi bi-instagram"
                                style="font-size: 18pt; color: #692f8f;"></i></a></li>
                </ul>
            </footer>

            <p class="text-center text-muted" style="color: #692f8f; font-size: 12pt;">&copy; Lemtech {{now()->format('Y')}}-All rights
                reserved.</p>
        </div>
        <!--fim Footer-->

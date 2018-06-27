<section id="contacts" class="contact_form_section">

    <div class="container">

        <div class="contact_form_inner big_padding row">

            <div class="col-md-6  slideInLeft">

                <div class="contact_form_detail">
                    <div class="text-center">
                        <h3 class="default_section_heading raleway navy_blue"> <span class="font_200">Контакты</span> </h3>
                        <hr class="default_divider default_divider_blue ">
                    </div>
                    <div class="text-center mt-4">

                        <div class="row d-inline-block text-left contact_form_extra_inner clearfix">

                            <div class="col-12">
                                <p class="form_text open_sans default_text_light">
                                    <i class="fas fa-map-marker-alt contact-icon" style="color:#f15927; " aria-hidden="true"></i> Мариуполь, Украина.
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="form_text open_sans default_text_light">
                                    <a href="tel:+380979653838" class="default_text_light">
                                        <i class="kyivstar contact-icon" aria-hidden="true"></i> <span style="font-size: 0.9em;">+380979653838</span>
                                    </a>
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="form_text open_sans default_text_light">
                                    <a href="viber://add?number=%2B380979653838 " class="default_text_light ">
                                        <i class="fab fa-viber contact-icon " style="color: #8F5DB7; " aria-hidden="true "></i> <span style="font-size: 0.9em; ">+380979653838</span></a>
                                </p>
                            </div>
                            <div class="col-12 ">
                                <p class="form_text open_sans default_text_light ">
                                    <a href="skype:djekiseven?add " class="default_text_light ">
                                        <i class="fab fa-skype contact-icon " style="color: #32C5F0; " aria-hidden="true "></i> djekiseven</a>
                                </p>
                            </div>
                            <div class="col-12 ">
                                <p class="form_text open_sans default_text_light ">
                                    <a href="mailto:admin@yt-studio.com " class="default_text_light ">
                                        <i class="far fa-envelope contact-icon " style="color:#c30000; " aria-hidden="true "></i> admin@yt-studio.com</a>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6  slideInRight email_form_block">

                <div class="text-center ">
                    <h3 class="default_section_heading raleway navy_blue "> <span class="font_200 ">Напишите нам</span> </h3>
                    <hr class="default_divider default_divider_blue ">
                </div>
                
                <form method="POST" id="mail_send" action="javascript:void(null);" class="form_class text-center needs-validation" novalidate>
                    
                    @if(count($errors) > 0)
                    <div class="col-sm-12 ">
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                        
                    

                    {{ csrf_field() }}

                    <div class="email_form row ">

                        <div class="col-sm-5 ">

                            <input type="text" placeholder="Имя. " class="form_inputs form-control" id="name" name="name" value="{{old('name')}}" required >

                        </div>
                        <div class="invalid-feedback">введите Имя.</div>

                        <div class="col-sm-7 ">

                            <input type="email" placeholder="Ваш email. " class="form_inputs form-control" id="email" name="email"value="{{old('email')}}" required>
                            
                            <div class="invalid-feedback">введите корректный email.</div>

                        </div>

                        <div class="col-sm-12 ">

                            <input type="phone" placeholder="Телефон. " class="form_inputs form-control " id="phone" name="phone" value="{{old('phone')}}">

                        </div>

                        <div class="col-sm-12 ">

                            <textarea placeholder="Текст сообщения" class="form_inputs form_textarea form-control" id="message" name="message"  required>@if(old('message')) {{old('message')}} @endif</textarea>

                            <div class="invalid-feedback">введите текст сообщения.</div>
                            
                            
                        </div>

                        <div class="col-12 ">

                            <div class="button_div ">
                            
                                <button type="submit" form="mail_send" class=" btn btn-orange  open_sans"> 
                                    <i class="fa fa-envelope " aria-hidden="true "></i> Отправить
                                </button>

                            </div>

                        </div>



                    </div>

                </form>

                <script type="text/javascript" language="javascript">
                    function call() {
                         $('#mail_send_result').html(
                             '<div class="alert alert-info" >Отправка сообщения...</div>');

                        var msg   = $('#mail_send').serialize();
                        $.ajax({
                        type: 'POST',
                        url: '/',
                        data: msg,
                        success: function(data) {
                            $('#mail_send_result').html(data);
                        },
                        error:  function(xhr, str){
                        alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                        });
                
                    }
                </script>
                

            </div>
        </div>
    </div>

</section>
 
 
 <div id="order_dialog" class=" small_text open_sans default_text_light " style="widht:100%; height:100%;">

    <form class="container-flude" id="order-form" action="javascript:void(null)" method="POST" needs-validation" novalidate >
        {{ csrf_field() }}
        
        <div class="row m-auto">
            <div class="order_block">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Имя" required >
                        <div class="invalid-feedback mt-1">введите Имя.</div>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="client_family" id="client_family" placeholder="Фамилия" required>
                        <div class="invalid-feedback mt-1">введите Фамилию.</div>
                    </div>
                    <div class="col-sm-4">
                        <input type="phone" class="form-control" name="client_phone" id="client_phone" placeholder="Телефон" required>
                        <div class="invalid-feedback mt-1">введите контактный телефон.</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="client_company" id="client_company" placeholder="Организация">
                    </div>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="client_email" id="client_email" placeholder="Email">
                    </div>
                </div>
            </div>

            <div class="row order_block">
                    <div class="col-sm-4">
                        <input type="radio"  class="order_radio radio-custom" name="new_or_has" value="Заказать новый сайт"  switch-class="new_site" id="new_site" checked>
                        <label class="radio-custom-label" for="new_site">
                            Заказать новый сайт
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <input type="radio"  class="order_radio radio-custom" name="new_or_has" switch-class="has_site" id="has_site" value="У меня уже есть сайт">
                        <label class="radio-custom-label" for="has_site">
                            У меня уже есть сайт
                        </label>
                    </div>
                    
                    <div class="col-sm-4  has_site" style="display: none;">
                        <input type="site" class="form-control" name="client_site" id="client_site" placeholder="Адрес сайта" disabled="disabled">
                    </div>
                    
            </div>

            <div class="row order_block has_site" style="display: none;">
                    <div class="col-sm-4">
                        <input class="order_radio  radio-custom" type="radio" name="has_site" id="order_update_site" switch-class="order_update_site" value="доработка сайта" checked disabled="disabled">
                        <label class=" radio-custom-label" for="order_update_site">
                            доработка сайта 
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <input class="order_radio  radio-custom" type="radio" name="has_site" id="order_support_site" switch-class="order_support_site" value="тех. поддержка сайта" disabled="disabled">
                        <label class=" radio-custom-label" for="order_support_site">
                            тех. поддержка сайта 
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <input class="order_radio  radio-custom" type="radio"  name="has_site" id="order_seo_site" switch-class="order_seo_site" value="SEO оптимизация или реклама сайта" disabled="disabled">
                        <label class=" radio-custom-label" for="order_seo_site">
                            SEO оптимизация или реклама сайта 
                        </label>
                    </div>
            </div>

            <div class="row order_block new_site">

                    <div class="col-sm-4">
                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="site-visitka" value="сайт-Визитка" checked>
                            <label class="radio-custom-label" for="site-visitka">
                                сайт-Визитка
                            </label>
                        </div>

                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="site-mini" value="сайт-Мини" >
                            <label class="radio-custom-label" for="site-mini">
                                сайт-Мини
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="site-info" value="сайт-Инфо">
                            <label class="radio-custom-label" for="site-info">
                                сайт-Инфо
                            </label>
                        </div>
                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="landing-page" value="landing-page">
                            <label class="radio-custom-label" for="landing-page">
                                landing Page
                            </label>
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="site-catalog" value="сайт-Каталог" >
                            <label class="radio-custom-label" for="site-catalog">
                                сайт-Каталог
                            </label>
                        </div>
                        <div class="">
                            <input type="radio"  class="radio-custom" name="new_site" id="internet-shop" value="интернет-Магазин">
                            <label class="radio-custom-label" for="internet-shop">
                                интернет-Магазин
                            </label>
                        </div>
                    </div>
            </div>

            <div class="order_buttons">
                <div class="float-right">
                    <button type="reset" class="btn btn-white mr-2 order_close">Закрыть</button>
                    <button type="submit" form="order-form" class="btn btn-green">Отправить заявку</button>
                </div>
            </div>
        </div>
    </form>    

    
</div>


<!-- start of order-form -->
<form class="kinesko-form order-form">
    <div class="form-wrapper vertical-align">
        <div class="gl-container">
            <div class="close-btn">
                <i class="icon icon-cross-yellow"></i>
            </div>
            <p class="form-header">Расскажите нам о своем проекте</p>
            <p class="form-header-small">Получите консультацию уже сейчас!</p>

            <input type="text" name="name" required="required" class="user-name"
                   placeholder="Имя *" tabindex="1">

            <div class="full-container clearfix">
                <div class="left-cont">
                    <input type="tel" name="phone" required="required" class="user-tel"
                           placeholder="Телефон *" tabindex="2">
                </div>
                <div class="right-cont">
                    <input type="email" name="email" required="required" class="user-email"
                           placeholder="email *" tabindex="3">
                </div>
            </div>

            <input type="text" name="company" required="required" class="user-company"
                   placeholder="Название компании *" tabindex="4">

            <input type="text" name="text" required="required" class="user-text"
                   placeholder="Сопроводительный текст *" tabindex="5">

            <div class="add-file-cont">
                <input type="file" name="file" id="write-us-file" multiple data-multiple-caption="{count} files selected"
                       class="inputfile inputfile-2">
                <label for="write-us-file"><span>+ Добавить файл</span></label>
            </div>

            <button type="submit" class="skew-right gl-transparent-btn submit-btn" tabindex="6">
                <span class="skew-left">Отправить</span>
            </button>

        </div>
    </div>
</form>
<!-- end of order-form -->

<!-- start of callback-form -->
<form class="kinesko-form callback-form">
    <div class="form-wrapper vertical-align">
        <div class="gl-container">
            <div class="close-btn">
                <i class="icon icon-cross-yellow"></i>
            </div>

            <p class="form-header">Введите свои данные</p>
            <p class="form-header-small">и наши менеджеры с вам свяжутся в течении 5 минут</p>

            <div class="input-wrapper">
                <div class="input-cont skew-right">
                    <input type="text" name="name" required="required" class="user-name skew-left"
                           placeholder="Ваше имя" tabindex="1">
                </div>
            </div>

            <div class="input-wrapper">
                <div class="input-cont skew-left">
                    <input type="tel" name="phone" required="required" class="user-tel skew-right"
                           placeholder="Ваш телефон" tabindex="2">
                </div>
            </div>

            <button type="submit" class="skew-right gl-transparent-btn submit-btn" tabindex="3">
                <span class="skew-left">отправить</span>
            </button>
        </div>
    </div>
</form>
<!-- end of callback-form -->

<!-- start of success-form -->
<form class="kinesko-form success-form">
    <div class="form-wrapper vertical-align">
        <div class="gl-container">
            <div class="close-btn">
                <i class="icon icon-cross-yellow"></i>
            </div>

            <div class="success-close-btn">
                <i class="icon icon-check-mark"></i>
            </div>

            <p class="form-header">Спасибо за ваше сообщение!</p>
            <p class="form-header-small">КОНТАКТЫ</p>

            <div class="footer-col footer-contacts">

                <div class="contact-info">
                    <p class="contact-address">ул. Трехсвятительская 5/1-А, <br> офис 1, 2-й этаж</p>
                </div>

                <div class="contact-info">
                    <p class="contact-telephone">{{ setting('site.main_phone') }}</p>
                    <p class="contact-telephone">+38 099 618 87 50</p>
                    <p class="contact-email">{{ setting('site.main_email') }}</p>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- end of success-form -->
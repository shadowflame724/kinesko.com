<!-- start of order-form -->
<form class="kinesko-form order-form">
    <div class="form-wrapper vertical-align">
        <div class="gl-container">
            <div class="close-btn">
                <i class="icon icon-cross-yellow"></i>
            </div>
            <p class="form-header">@lang('client.forms.form_header')</p>
            <p class="form-header-small">@lang('client.forms.form_header_small')</p>

            <input type="text" name="name" required="required" class="user-name"
                   placeholder="@lang('client.forms.name')" tabindex="1">

            <div class="full-container clearfix">
                <div class="left-cont">
                    <input type="tel" name="phone" required="required" class="user-tel"
                           placeholder="@lang('client.forms.phone')" tabindex="2">
                </div>
                <div class="right-cont">
                    <input type="email" name="email" required="required" class="user-email"
                           placeholder="@lang('client.forms.email')" tabindex="3">
                </div>
            </div>

            <input type="text" name="company" required="required" class="user-company"
                   placeholder="@lang('client.forms.company')" tabindex="4">

            <input type="text" name="text" required="required" class="user-text"
                   placeholder="@lang('client.forms.text')" tabindex="5">

            <div class="add-file-cont">
                <input type="file" name="file[]" id="write-us-file" multiple data-multiple-caption="{count} files selected"
                       class="inputfile inputfile-2">
                <label for="write-us-file"><span>+ @lang('client.forms.attach_file')</span></label>
            </div>

            <button type="submit" class="skew-right gl-transparent-btn submit-btn" tabindex="6">
                <span class="skew-left">@lang('client.forms.send')</span>
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

            <p class="form-header">@lang('client.forms.callback_header')</p>
            <p class="form-header-small">@lang('client.forms.callback_header_small')</p>

            <div class="input-wrapper">
                <div class="input-cont skew-right">
                    <input type="text" name="name" required="required" class="user-name skew-left"
                           placeholder="@lang('client.forms.name')" tabindex="1">
                </div>
            </div>

            <div class="input-wrapper">
                <div class="input-cont skew-left">
                    <input type="tel" name="phone" required="required" class="user-tel skew-right"
                           placeholder="@lang('client.forms.phone')" tabindex="2">
                </div>
            </div>

            <button type="submit" class="skew-right gl-transparent-btn submit-btn" tabindex="3">
                <span class="skew-left">@lang('client.forms.send')</span>
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

            <p class="form-header">@lang('client.forms.form_success')</p>
            <p class="form-header-small">@lang('client.menu.contacts')</p>

            <div class="footer-col footer-contacts">

                <div class="contact-info">
                    <p class="contact-address">@lang('client.general.address')/p>
                </div>

                <div class="contact-info">
                    <p class="contact-telephone">{{ setting('site.main_phone') }}</p>
                    <p class="contact-telephone">{{ setting('site.add_phone') }}</p>
                    <p class="contact-email">{{ setting('site.main_email') }}</p>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- end of success-form -->
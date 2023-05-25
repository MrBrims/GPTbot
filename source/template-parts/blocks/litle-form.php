<?php $post_id = get_the_ID(); ?>
<form class="form litle-form">
  <div class="litle-form__items">
    <div class="litle-form__item">
      <div class="input-box form__box">
        <span class="input-box__text">
          Art der Arbeit <span class="input-box__required">*</span>
        </span>
        <input class="input" name="type" type="text" value="<?= carbon_get_post_meta(get_the_ID(), 'form_arbeit'); ?>" required readonly>
      </div>
      <div class="input-box form__box">
        <span class="input-box__text">
          Thema der Arbeit <span class="input-box__required">*</span>
          <div class="tolltip" data-tippy-content="Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben">?</div>
        </span>
        <input class="input" name="theme" type="text" placeholder="Thema der Arbeit" required>
      </div>
      <div class="litle-form__inner">
        <div class="input-box form__box">
          <span class="input-box__text">
            Abgabetermin <span class="input-box__required">*</span>
            <div class="tolltip" data-tippy-content="Wählen Sie bitte den Abgabetermin für Ihre Arbeit aus. Es wäre besser, wenn Sie dem Autor mindestens ein paar zusätzliche Tage vor dem Abgabetermin geben, damit Sie auch Zeit für Lesen und Revisionsanfrage falls nötig haben">?</div>
          </span>
          <input class="input date-input" name="deadline" id="date-input" placeholder="<?php echo date('F, j'); ?>" type="text" autocomplete="off" required>
          <label class="date-img" for="date-input"></label>
        </div>
        <div class="input-box form__box litle-form__count">
          <span class="input-box__text">
            Seitenanzahl
          </span>
          <div class="form-counter">
            <div data-id="decrement" class="counter-btn">-</div>
            <input class="count-input" name="number" type="number" value="40" max="1000" min="0" step="5" />
            <div data-id="increment" class="counter-btn">+</div>
            <span class="count-text">Seiten</span>
          </div>
        </div>
      </div>
    </div>
    <div class="litle-form__item">
      <div class="input-box form__box">
        <span class="input-box__text">
          Vorname/Nickname <span class="input-box__required">*</span>
        </span>
        <input class="input" name="name" type="text" placeholder="Vorname/Nickname" required>
      </div>
      <div class="input-box form__box">
        <span class="input-box__text">
          Whatsapp
          <span class="input-box__required">*</span>
          <div class="tolltip" data-tippy-content="Erfahrungsgemäß lassen sich viele Fragen am besten telefonisch klären. Falls Sie einen Rückruf wünschen, geben Sie bitte hier Ihre Telefonummer an">?</div>
        </span>
        <input class="input phone-input" type="text" name="phone" required>
      </div>
      <div class="input-box form__box">
        <span class="input-box__text">
          E-Mail <span class="input-box__required">*</span>
          <div class="tolltip" data-tippy-content="Stellen Sie sicher, dass Sie richtige E-Mail-Adresse eingegeben haben">?</div>
        </span>
        <input class="input" name="email" type="email" placeholder="E-Mail" required>
      </div>
    </div>
  </div>
  <div class="litle-form__footer">
    <p class="litle-form__text">
      Vor dem Abschicken des Formulars überprüfen Sie bitte Ihre E-Mail Adresse und Telefonnummer.
    </p>
    <div class="input-box form__box litle-form__btn-box">
      <input class="litle-form__btn btn" type="submit" value="PREIS KALKULIEREN">
      <input type="hidden" name="form-id" value="first-form">
      <input type="hidden" name="recaptcha_response" class="recaptchaResponse">
      <input type="hidden" name="constect-index" value="<?= carbon_get_post_meta(get_the_ID(), 'index_const'); ?>">
      <input type="hidden" name="landing-address" value="<?= carbon_get_post_meta(get_the_ID(), 'adress_site'); ?>">
      <?php echo DE\Helpers::get_utm(); ?>
    </div>
  </div>
</form>
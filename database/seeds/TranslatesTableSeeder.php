<?php

use App\Translate;
use Illuminate\Database\Seeder;

class TranslatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Translate::query()->count()) {
            return;
        }
        $langs = \App\Lang::all();

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'back']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Назад'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'next']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Далее'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'phone_number']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Номер телефона'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'password']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Пароль'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'password.confirm']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Подтвердите пароль'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'login']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Войти'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'register']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Регистрация'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'add.photo']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Добавить фото'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'your_name']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Ваше имя'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'email']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Email'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'select.region']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Выберите регион'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'select.city']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Выберите город'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'street']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Улица'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'house']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Дом'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'apartment']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Квартира'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'select.lang']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Выберите язык'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'pregnant']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Беременна'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'not.pregnant']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Не беременна'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'terms']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Пользовательское соглашение'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'sms.code']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Смс-код'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'to.register']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Зарегистрироваться'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'resend']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Отправить повторно'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'calculate.gestational.age']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Рассчитать срок беременности'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'calculate.gestational.age']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Рассчитать срок беременности'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'by.screening']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'По скринигу'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'enter.weight.data']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Введите данные о весе'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'before.pregnant']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'До беременности'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'now']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Сейчас'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'emergency.contacts']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Контакты для экстренной связи'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'name']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Имя'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'add.contact']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Добавить контакт'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'start']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Начать'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'measuring']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Измерения'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'measuring']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Измерения'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'my.weight']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Мой вес'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'my.baby']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Мой малыш'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'my.tummy']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Мой животик'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'contractions']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Схватки'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'clinic']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Клиники'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'recommendations']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Рекомендации'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'chat']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Чат'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'personal.cabinet']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Личный кабинет'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'current.weight']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Текущий вес'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'new.weight']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Новый вес'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'add.weight']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Добавить вес'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'add']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Добавить'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'enter.data']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Введите данные'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'when.measurements']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Когда сделаны замеры'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'girth']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Обхват'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'ufh']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'ВДМ'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'uterine.fundus.height']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Высота дна матки'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'add.data']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Добавить данные'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'girth.abdomen']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Обхват живота'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'contractions.counter']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Счетчик схваток'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'duration']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Длительность'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'interval']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Интервал'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'phone']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Телефон'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'support']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Помощь и поддержка'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'settings']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Настройки'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'exit']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Выход'];
        })->toArray());


        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'forums']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Форумы'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'message']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Сообщение'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'rate.quality.service']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Оцените качество обслуживания'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'check.lists']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Чек-листы'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'articles']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Статьи'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'state']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Государственные'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'private']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Частные'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'eще']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'more'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'schedules']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'График работы'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'registry']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Регистратура'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'our.specialists']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Наши спешиалисты'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'reviews']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Отзывы'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'all.reviews']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Все отзывы'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'price.list']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Прайс-лист'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'good']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Хорошо'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'great']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Отлично'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'bad']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Плохо'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'call']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Связаться'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'education']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Образование'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'account.settings']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Настройки аккаунта'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'edit']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Изменить'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'location']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Местоположение'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'app.settings']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Настройки приложения'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'lang']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Язык'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'notification']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Уведомления'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'feedback']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Обратная связь'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'change.phone.number']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Изменить номер телефона'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'new.phone.number']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Новый номер телефона'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'save']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Сохранить'];
        })->toArray());

        /** @var Translate $translate */
        $translate = Translate::query()->create(['key' => 'close']);
        $translate->translates()->createMany($langs->map(function (\App\Lang $lang) {
            return ['lang_id' => $lang->id, 'text' => 'Закрыть'];
        })->toArray());
    }
}

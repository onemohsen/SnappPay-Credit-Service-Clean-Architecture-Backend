<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted" => ":attribute باید پذیرفته شده باشد.",
    "active_url" => "آدرس :attribute معتبر نیست",
    "after" => ":attribute باید تاریخی بعد از :date باشد.",
    "after_or_equal" => ":attribute باید تاریخی برابر یا بعد از :date باشد.",
    "alpha" => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash" => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num" => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array" => ":attribute باید شامل آرایه باشد.",
    "before" => ":attribute باید تاریخی قبل از :date باشد.",
    "between" => [
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file" => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string" => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array" => ":attribute باید بین :min و :max آیتم باشد.",
    ],
    "boolean" => "فیلد :attribute فقط میتواند صحیح و یا غلط باشد",
    "confirmed" => ":attribute با تاییدیه مطابقت ندارد.",
    "date" => ":attribute یک تاریخ معتبر نیست.",
    "date_format" => ":attribute با الگوی :format مطاقبت ندارد.",
    "different" => ":attribute و :other باید متفاوت باشند.",
    "digits" => ":attribute باید :digits رقم باشد.",
    "digits_between" => ":attribute باید بین :min و :max رقم باشد.",
    "email" => "فرمت :attribute معتبر نیست.",
    "exists" => ":attribute انتخاب شده، معتبر نیست.",
    "filled" => "فیلد :attribute الزامی است",
    'gt' => [
        'numeric' => ':attribute باید بزرگتر از :value.',
        'file' => ':attribute باید بزرگتر از :value کیلوبایت.',
        'string' => ':attribute باید بزرگتر از :value characters.',
        'array' => ':attribute باید بیشتر از :value آیتم.',
    ],
    'gte' => [
        'numeric' => ':attribute باید بزرگتر یا مساوی :value.',
        'file' => ':attribute باید بزرگتر یا مساوی :value کیلوبایت.',
        'string' => ':attribute باید بزرگتر یا مساوی :value کاراکتر.',
        'array' => ':attribute باید داشته باشد :value آیتم ها یا بیشتر.',
    ],
    "image" => ":attribute باید تصویر باشد.",
    "in" => ":attribute انتخاب شده، معتبر نیست.",
    "integer" => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip" => ":attribute باید IP آدرس معتبر باشد.",
    "max" => [
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file" => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string" => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array" => ":attribute نباید بیشتر از :max آیتم باشد.",
    ],
    "mimes" => ":attribute باید یکی از فرمت های :values باشد.",
    "min" => [
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file" => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string" => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array" => ":attribute نباید کمتر از :min آیتم باشد.",
    ],
    "not_in" => ":attribute انتخاب شده، معتبر نیست.",
    "numeric" => ":attribute باید شامل عدد باشد.",
    "regex" => ":attribute یک فرمت معتبر نیست",
    "required" => "فیلد :attribute الزامی است",
    "required_if" => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with" => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all" => ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same" => ":attribute و :other باید مانند هم باشند.",
    "size" => [
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file" => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string" => ":attribute باید برابر با :size کاراکتر باشد.",
        "array" => ":attribute باید شامل :size آیتم باشد.",
    ],
    "string" => "The :attribute must be a string.",
    "timezone" => "فیلد :attribute باید یک منطقه صحیح باشد.",
    "unique" => ":attribute قبلا انتخاب شده است.",
    "url" => "فرمت آدرس :attribute اشتباه است.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "family" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        "file" => "فایل",
        "fullname" => "نام کامل",
        "start_date" => "تاریخ شروع",
        "end_date" => "تاریخ پایان",
        "start_time" => "ساعت شروع",
        "end_time" => "ساعت پایان",
        "capacity" => "ظرفیت",
        "is_active" => "فعال یا غیرفعال",
        "parentRoleId" => "نوع",
        "childRoleId" => "نوع",
        'brand_id' => "برند",
        'firstName' => "نام",
        'lastName' => "نام خانوادگی",
        'value' => "مقدار",
        'value1' => "مقدار",
        'national_code' => "کد ملی",
        'province' => "استان",
        'address.county_id' => 'شهر',
        'address.main_street' => 'خیابان اصلی',
        'address.side_street' => 'خیابان فرعی',
        'address.alley' => 'کوچه',
        'address.number' => 'پلاک',
        'address.postal_code' => 'کد پستی',
        'car_id' => 'خودرو',
        'color_id' => 'رنگ',
        'vin' => 'شماره شاسی',
        'production_date' => 'سال تولید',
        'number_plate' => 'پلاک',
        'plateThree' => ' ',
        'plateAlpha' => ' ',
        'plateTwo' => ' ',
        'plateCity' => ' ',
        'owner_first_name' => 'نام مالک',
        'owner_last_name' => 'نام خانوادگی مالک',
        'reception_time' => 'ساعت پذیرش',
        'reception_date' => 'تاریخ پذیرش',
        'user_id' => 'کاربر',
        'delivery.first_name' => "نام",
        'delivery.last_name' => "نام خانوادگی",
        'delivery.national_code' => "کدملی",
        'delivery.type' => " شخص تحویل گیرنده",
        'guaranty' => "گارانتی",
        'rulesChecked' => "قبول قوانین",
        "label" => "عنوان",
        'user.mobile' => "تلفن همراه",
        "user.password" => "رمز عبور",
        "user.password_confirmation" => "تایید رمز عبور",
        'activeCode' => 'کد فعال سازی',
        'owner.first_name' => 'نام مالک',
        'owner.last_name' => 'نام خانوادگی مالک',
        'addresses.*.address' => 'آدرس',
        'addresses.*.city_id' => 'شهر',
        'addresses.*.plate' => 'پلاک',
        'addresses.*.postal_code' => 'گد پستی',
        'addresses.*.province_id' => 'استان',
        'roles.*.id' => 'نقش',
        'parent_id' => 'دسته بندی پدر',
        'category_id' => 'دسته بندی',
        'categoryIds' => 'دسته بندی',
        'body' => 'متن',
        'summary' => 'خلاصه متن',
        'service_id' => 'خدمت',
        'postal_code' => 'کد پستی',
        'city_id' => 'شهر',
        'order_date' => 'تاریخ',
        'order_time' => 'ساعت',
        'is_show' => 'نمایش',
        'driver' => 'درگاه',
        'staticTest' => 'تعداد آزمایش',
        'staticPlace' => 'تعداد مکان',
        'staticInfection' => 'تعداد عفونت',
        'staticResult' => 'تعداد نتایج',
        'order_id' => 'سفارش',
        'user_type' => 'نوع کاربر',
        'carts.*.quantity' => 'ظرفیت',
        'carts.*.service_id' => 'خدمت',
        'is_custom' => 'سفارشی',
        'sub_total' => 'جمع مبلغ',
        'meta.title' => 'عنوان متا',
        'meta.description' => 'توضیحات متا',
        'meta.keywords' => 'کلمات کلیدی متا',
        'price' => 'قیمت',
        'payment_deadline_by_days' => 'مدت زمان تسویه به روز',
        "user.wallet_balance" => "موجودی کیف پول",
    ],

    'values' => [
        'delivery' => [
            'type' => ['otherPerson' => 'شخص دیگر',]
        ]
    ],
];

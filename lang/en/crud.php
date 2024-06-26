<?php

return [
    'common' => [
        'actions' => 'العمليات',
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'update' => 'حفظ التعديلات',
        'new' => 'جديد',
        'cancel' => 'إلغاء',
        'attach' => 'أضافة',
        'detach' => 'إزالة',
        'save' => 'حفظ',
        'delete' => 'حذف',
        'delete_selected' => 'حذف المحدد',
        'search' => 'بحث',
        'back' => 'رجوع إلى القائمة',
        'are_you_sure' => 'هل انت متأكد؟',
        'no_items_found' => 'لاتوجد عناصر',
        'created' => 'تم الانشاء بنجاح',
        'saved' => 'تم الحفظ بنجاح',
        'removed' => 'تم الحذف بنجاح',
    ],

    'users' => [
        'name' => 'المستخدمين',
        'index_title' => 'قائمة المستخدمين',
        'new_title' => 'مستخدم جديد',
        'create_title' => 'انشاء مستخدم',
        'edit_title' => 'تعديل مستخدم',
        'show_title' => 'عرض مستخدم',
        'inputs' => [
            'name' => 'الإسم',
            'email' => 'البريد الالكتروني',
            'password' => 'كلمة المرور',
            'phone' => 'رقم الهاتف',
            'hospital_id' => 'المستشفى',
            'active' => 'الحالة',
        ],
    ],

    'hospitals' => [
        'name' => 'المستشفيات',
        'index_title' => 'قائمة المستشفيات',
        'new_title' => 'مستشفى جديد',
        'create_title' => 'انشاء مستشفى',
        'edit_title' => 'تعديل مستشفى',
        'show_title' => 'عرض مستشفى',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'patients' => [
        'name' => 'الحالات',
        'index_title' => 'قائمة الحالات',
        'new_title' => 'حالة جديدة',
        'create_title' => 'أنشاء حالة',
        'edit_title' => 'تعديل حالة',
        'show_title' => 'عرض حالة',
        'inputs' => [
            'name' => 'الإسم',
            'birth_date' => 'تاريخ الميلاد',
            'n_id' => 'الرقم الوطني',
            'gender' => 'الجنس',
            'phone' => 'رقم الهاتف',
            'escort_phone' => 'رقم هاتف المرافق',
            'city' => 'المدينة',
            'category' => 'تصنيف الحالة',
            'hospital_id' => 'المستشفى',
        ],
    ],

    'diagnoses' => [
        'name' => 'التشخيصات',
        'index_title' => 'قائمة التشخيصات',
        'new_title' => 'تشخيص جديد',
        'create_title' => 'أنشاء تشخيص',
        'edit_title' => 'تعديل تشخيص',
        'show_title' => 'عرض تشخيص',
        'inputs' => [
            'patient_id' => 'الحالة',
            'eye' => 'Eye',
            'BCVA' => 'Bcva',
            'IOP' => 'Iop',
            'LID' => 'Lid',
            'conjunctiva' => 'Conjunctiva',
            'cornea' => 'Cornea',
            'AC' => 'Ac',
            'IrisPupil' => 'Iris Pupil',
            'lens' => 'Lens',
            'fundus' => 'Fundus',
            'remarks' => 'Remarks',
            'diagnosis' => 'Diagnosis',
            'OCT' => 'Oct',
            'US' => 'Us',
            'pantacam' => 'Pantacam',
        ],
    ],

    'patient_diagnoses' => [
        'name' => 'حالة التشخيصات',
        'index_title' => 'التشخيصات قائمة',
        'new_title' => 'جديد تشخيص',
        'create_title' => 'أنشاء تشخيص',
        'edit_title' => 'تعديل تشخيص',
        'show_title' => 'عرض تشخيص',
        'inputs' => [
            'eye' => 'Eye',
            'BCVA' => 'BCVA',
            'IOP' => 'I.O.P',
            'LID' => 'LID',
            'conjunctiva' => 'CONJUNCTIVA',
            'cornea' => 'CORNEA',
            'AC' => 'A/C',
            'IrisPupil' => 'IRIS & PUPIL',
            'lens' => 'LENS',
            'fundus' => 'FUNDUS',
            'remarks' => 'REMARKS',
            'diagnosis' => 'DIAGNOSIS',
            'OCT' => 'OCT',
            'US' => 'U/S',
            'pantacam' => 'PANTACAM',
        ],
    ],

    'cities' => [
        'name' => 'المدن',
        'index_title' => 'قائمة المدن',
        'new_title' => 'مدينة جديدة',
        'create_title' => 'انشاء مدينة',
        'edit_title' => 'تعديل مدينة',
        'show_title' => 'عرض مدينة',
        'inputs' => [
            'name' => 'الاسم',
        ],
    ],

    'templates' => [
        'name' => 'القوالب',
        'index_title' => 'قائمة القوالب',
        'new_title' => 'قالب جديد',
        'create_title' => 'إنشاء قالب',
        'edit_title' => 'تعديل قالب',
        'show_title' => 'عرض قالب',
        'inputs' => [
            'title' => 'العنوان',
            'text' => 'النص',
            'after' => 'بعد عدد ايام',
        ],
    ],


    'roles' => [
        'name' => 'الادوار',
        'index_title' => 'الادوار قائمة',
        'create_title' => 'انشاء دور',
        'edit_title' => 'تعديل دور',
        'show_title' => 'عرض دور',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'permissions' => [
        'name' => 'الصلاحيات',
        'index_title' => 'الصلاحيات قائمة',
        'create_title' => 'انشاء صلحية',
        'edit_title' => 'تعديل صلحية',
        'show_title' => 'عرض صلحية',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],
];

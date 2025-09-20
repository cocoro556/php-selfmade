<?php

return [
    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行はバリデタークラスにより使用されるデフォルトのエラー
    | メッセージです。サイズルールのようにいくつかのバリデーションを
    | 持っているものもあります。メッセージはご自由に調整してください。
    |
    */

    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url' => ':attributeが有効なURLではありません。',
    'after' => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal' => ':attributeには、:date以降の日付を指定してください。',
    'alpha' => ':attributeはアルファベットのみがご利用できます。',
    'alpha_dash' => ':attributeはアルファベットとダッシュ(-)及び下線(_)がご利用できます。',
    'alpha_num' => ':attributeはアルファベット数字がご利用できます。',
    'array' => ':attributeは配列でなくてはなりません。',
    'ascii' => ':attributeは半角英数字および記号のみ使用できます。',
    'before' => ':attributeには、:dateより前の日付をご利用ください。',
    'before_or_equal' => ':attributeには、:date以前の日付をご利用ください。',
    'between' => [
        'array' => ':attributeは:min個から:max個の間で指定してください。',
        'file' => ':attributeは、:min kBから、:max kBの間で指定してください。',
        'numeric' => ':attributeは、:minから:maxの間で指定してください。',
        'string' => ':attributeは、:min文字から、:max文字の間で指定してください。',
    ],
    'boolean' => ':attributeは、trueかfalseを指定してください。',
    'can' => ':attributeフィールドには認可されていない値が含まれています。',
    'confirmed' => ':attributeと、確認フィールドとが、一致していません。',
    'contains' => ':attributeフィールドに必須の値が含まれていません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeには有効な日付を指定してください。',
    'date_equals' => ':attributeには、:dateと同じ日付けを指定してください。',
    'date_format' => ':attributeは:format形式で指定してください。',
    'decimal' => ':attributeは:decimal桁の小数で指定してください。',
    'declined' => ':attributeは拒否してください。',
    'declined_if' => ':otherが:valueの場合、:attributeは拒否してください。',
    'different' => ':attributeと:otherには、異なった内容を指定してください。',
    'digits' => ':attributeは:digits桁で指定してください。',
    'digits_between' => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions' => ':attributeの図形サイズが正しくありません。',
    'distinct' => ':attributeフィールドには重複した値があります。',
    'doesnt_end_with' => ':attributeは:valuesのいずれかで終わってはいけません。',
    'doesnt_start_with' => ':attributeは:valuesのいずれかで始まってはいけません。',
    'email' => ':attributeには、有効なメールアドレスを指定してください。',
    'ends_with' => ':attributeには、:valuesのどれかで終わる値を指定してください。',
    'enum' => '選択された:attributeは正しくありません。',
    'exists' => '選択された:attributeは正しくありません。',
    'extensions' => ':attributeには:extensionsのうちいずれかの拡張子のファイルを指定してください。',
    'file' => ':attributeにはファイルを指定してください。',
    'filled' => ':attributeに値を指定してください。',
    'gt' => [
        'array' => ':attributeには、:value個より多くのアイテムを指定してください。',
        'file' => ':attributeには、:value kBより大きなファイルを指定してください。',
        'numeric' => ':attributeには、:valueより大きな値を指定してください。',
        'string' => ':attributeは、:value文字より長く指定してください。',
    ],
    'gte' => [
        'array' => ':attributeには、:value個以上のアイテムを指定してください。',
        'file' => ':attributeには、:value kB以上のファイルを指定してください。',
        'numeric' => ':attributeには、:value以上の値を指定してください。',
        'string' => ':attributeは、:value文字以上で指定してください。',
    ],
    'hex_color' => ':attributeは有効な16進数カラーコードである必要があります。',
    'image' => ':attributeには画像ファイルを指定してください。',
    'in' => '選択された:attributeは正しくありません。',
    'in_array' => ':attributeには:otherの値を指定してください。',
    'integer' => ':attributeは整数で指定してください。',
    'ip' => ':attributeには、有効なIPアドレスを指定してください。',
    'ipv4' => ':attributeには、有効なIPv4アドレスを指定してください。',
    'ipv6' => ':attributeには、有効なIPv6アドレスを指定してください。',
    'json' => ':attributeには、有効なJSON文字列を指定してください。',
    'list' => ':attributeはリストである必要があります。',
    'lowercase' => ':attributeは小文字である必要があります。',
    'lt' => [
        'array' => ':attributeには、:value個より少ないアイテムを指定してください。',
        'file' => ':attributeには、:value kBより小さなファイルを指定してください。',
        'numeric' => ':attributeには、:valueより小さな値を指定してください。',
        'string' => ':attributeは、:value文字より短く指定してください。',
    ],
    'lte' => [
        'array' => ':attributeには、:value個以下のアイテムを指定してください。',
        'file' => ':attributeには、:value kB以下のファイルを指定してください。',
        'numeric' => ':attributeには、:value以下の値を指定してください。',
        'string' => ':attributeは、:value文字以下で指定してください。',
    ],
    'mac_address' => ':attributeは有効なMACアドレスである必要があります。',
    'max' => [
        'array' => ':attributeは:max個以下指定してください。',
        'file' => ':attributeには、:max kB以下のファイルを指定してください。',
        'numeric' => ':attributeには、:max以下の数字を指定してください。',
        'string' => ':attributeは、:max文字以下で指定してください。',
    ],
    'max_digits' => ':attributeは:max桁以下で指定してください。',
    'mimes' => ':attributeには:valuesタイプのファイルを指定してください。',
    'mimetypes' => ':attributeには:valuesタイプのファイルを指定してください。',
    'min' => [
        'array' => ':attributeは:min個以上指定してください。',
        'file' => ':attributeには、:min kB以上のファイルを指定してください。',
        'numeric' => ':attributeには、:min以上の数字を指定してください。',
        'string' => ':attributeは、:min文字以上で指定してください。',
    ],
    'min_digits' => ':attributeは:min桁以上で指定してください。',
    'missing' => ':attributeフィールドは存在しない必要があります。',
    'missing_if' => ':otherが:valueの場合、:attributeフィールドは存在しない必要があります。',
    'missing_unless' => ':otherが:valueでない場合、:attributeフィールドは存在しない必要があります。',
    'missing_with' => ':valuesが存在する場合、:attributeフィールドは存在しない必要があります。',
    'missing_with_all' => ':valuesがすべて存在する場合、:attributeフィールドは存在しない必要があります。',
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは正しくありません。',
    'not_regex' => ':attributeの形式が正しくありません。',
    'numeric' => ':attributeには、数字を指定してください。',
    'password' => [
        'letters' => ':attributeは文字を含む必要があります。',
        'mixed' => ':attributeは大文字と小文字を含む必要があります。',
        'numbers' => ':attributeは数字を含む必要があります。',
        'symbols' => ':attributeは記号を含む必要があります。',
        'uncompromised' => '指定された:attributeはデータ漏洩に含まれています。別の:attributeを選択してください。',
    ],
    'present' => ':attributeが存在していません。',
    'present_if' => ':otherが:valueの場合、:attributeフィールドが存在している必要があります。',
    'present_unless' => ':otherが:valueでない場合、:attributeフィールドが存在している必要があります。',
    'present_with' => ':valuesが存在する場合、:attributeフィールドが存在している必要があります。',
    'present_with_all' => ':valuesが存在する場合、:attributeフィールドが存在している必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesにない場合、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの存在を禁止しています。',
    'regex' => ':attributeに正しい形式を指定してください。',
    'required' => ':attributeは必ず指定してください。',
    'required_array_keys' => ':attributeフィールドには:valuesのエントリを含める必要があります。',
    'required_if' => ':otherが:valueの場合、:attributeも指定してください。',
    'required_if_accepted' => ':otherが承認された場合、:attributeフィールドは必須です。',
    'required_if_declined' => ':otherが拒否された場合、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valuesでない場合、:attributeを指定してください。',
    'required_with' => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_with_all' => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_without' => ':valuesを指定しない場合は、:attributeを指定してください。',
    'required_without_all' => ':valuesのどれも指定しない場合は、:attributeを指定してください。',
    'same' => ':attributeと:otherには同じ値を指定してください。',
    'size' => [
        'array' => ':attributeは:size個指定してください。',
        'file' => ':attributeのファイルは、:sizeキロバイトでなければなりません。',
        'numeric' => ':attributeは:sizeを指定してください。',
        'string' => ':attributeは:size文字で指定してください。',
    ],
    'starts_with' => ':attributeには、:valuesのどれかで始まる値を指定してください。',
    'string' => ':attributeは文字列を指定してください。',
    'timezone' => ':attributeには、有効なタイムゾーンを指定してください。',
    'unique' => ':attributeの値は既に存在しています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'uppercase' => ':attributeは大文字である必要があります。',
    'url' => ':attributeに正しい形式を指定してください。',
    'ulid' => ':attributeは有効なULIDである必要があります。',
    'uuid' => ':attributeに有効なUUIDを指定してください。',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'category' => 'カテゴリ',
        'difficulty' => '難易度',
        'question' => '問題',
        'answer' => '答え',
        'hint' => 'ヒント',
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
    ],
];
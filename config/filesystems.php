<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'gcs'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 'gcs'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "dropbox"
    |
    */

    'disks' => [
        'gcs' => [
            'driver' => 'gcs',
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID', 'flipit-app'),
            'key_file' => [
                "type" => "service_account",
                "project_id" => "flipit-app",
                "private_key_id" => "ff6b3cb299c533f88c13e4a22abe85d68ba1f6b5",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDIlsb4eKhb26ua\nT9P0SHsWoj4W3DxqLvHQyGUL+WLumQkn/g7rCO4uFQ/oZnDjOADg98a27bMf8TNM\nnn0ExD7gJbHPqV/3LnUIcrzdhoaUVAEY0IT1tJwgXtw9gsYn+H7ogF3Rt2qScB2K\nMM2zuAx2HemLiwqGeZvV4CvpOJoTltDqyhaDY3hO4b+TM8qSqXRWq0knyza7OwKM\nYeM8Rc6M0mIoWKM9zssONUQBeWD+W3lRib1gNwWGYFG5F0o44EmTsa80/nXqLiky\n69S04+N3jWV3ze6UHG4u8UBrIcXSGFeT2YG9HNL3oep3LdBkqJ6RJjIQr+cENEA7\nWR0Z1K2tAgMBAAECggEAKMAI1/2bJl4wNH83Lg9zghufxYEkfOXglmu/q3kUkihg\n5dEFMtZznMUGoE3/bQm5k/qCUjNkCn8zzsL73vYHV/4Qa4GbT1oOyJKWr+JegM+4\nEVR7TndMqH7c+1oP65reHVnGtY4vhmRke+iCQZqIXY6iHYk3sC4QbJjIEu8+ze+f\nKlOHspk3fkriRoTRCbZ79et1NA2put1hXLvMzSGH6cTGMMA8HknJwusvHFom7RdG\n2d2s4k47g+rx8nt72+swtYnsElHanW7fGmg+/MlwNcYp4eOUk94cakZJPzMo/P7P\n4suANzH10Hb5wrIG2L+mY9iOu2upZnOGkjIDzEq6OQKBgQD54F4Q84vafikEMAYz\n9gN9VbxGnSYLG3I3J+5IVz+/nFNCDJigo8lyWxmqCvMXbPkD0bU+LPGLIg4+Fa5K\nRG+v70C4ix6iseZe0o2RBSp4Nhd912/ymxYsiIn0PuYiNlaEnIwxhumv+MHByMsm\nOrycRC1ZLCUwypxhaFzAf++5jwKBgQDNgTLMkWa/PijR0ZBGOqwV6hBKgHARMeUX\n9KNqHWS3Y56yya1hgBp/BsT1xAvbrQfICrjfCEt7CvDJRqCZrIu85GtlGpbu9czg\nKAEstV59iY7Uqq8AZ+EQdSqpefG5N7L2lWfKN+1IGOUdiQyIWKLYH9hhJFUWtVN5\n9cboiSfvAwKBgFp3F7dNZXG6QUFJ3cUMKWFEHAD4viBBVI2RgFxicir9/sqn4s4t\n3i3vu4/rnOz7QABY+SREg0KbFsr1cH9k3Ya1uRnXDEVc4QmtcyFw3FpfQwwFZntQ\nGKwQ1tk9uHXkdFhYkQ0RSiOyjPuKpbn2g/iTWlOxftl2UT2W2hW7e+ATAoGAf1gX\nRYK4e7umCdblo09KQc4oSDJsv4r+nqie9uu99JJLzhiBUxDR2nM0a+MPQhJn5wMV\n6kc2lsmBygf1DyVH9kZJcn5Wlz9DtIe1qqG9Kuep1YjrJsI4Sj2AsUJ6kr68LGcK\nyNl9NRcQKww48uiSCIE7UX71Jzw3vTSbDI+pakcCgYEA9aMP9kN4cj0D48KcrGdq\nEmjjXcBwna5ls79sAt5dQKoC4qv6mQ++vVgBjr64GpWoQ0BXiARcZ1dpjVAeAAo/\nftg/fbYkzo5RwYYWiFljJ9Y0leODXm7A+itn32SENq0HWsDdkoozY/IjSJhLROkR\nyrskuXntvcOzQRUlG+GX+TY=\n-----END PRIVATE KEY-----\n",
                "client_email" => "flipit@flipit-app.iam.gserviceaccount.com",
                "client_id" => "112639167889874171945",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/flipit%40flipit-app.iam.gserviceaccount.com"

            ], // optional: /path/to/service-account.json
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'flipit-app'),
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', null), // optional: /default/path/to/apply/in/bucket
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', 'https://storage.googleapis.com/flipit-app'), // see: Public URLs below
            'visibility' => 'public', // optional: public|private
        ],

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        //---

        // Used for Admin -> Log
        'storage' => [
            'driver' => 'local',
            'root' => storage_path(),
        ],

        // Used for Admin -> Backup
        'backups' => [
            'driver' => 'local',
            'root' => storage_path('backups'), // that's where your backups are stored by default: storage/backups
        ],

        //---

        'ftp' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port' => env('FTP_PORT', 21),
            'root' => env('FTP_ROOT', ''),
            'passive' => env('FTP_PASSIVE', true),
            'ssl' => env('FTP_SSL', true),
            'timeout' => env('FTP_TIMEOUT', 30),
        ],

        'sftp' => [
            'driver' => 'sftp',
            'host' => env('SFTP_HOST'),
            'username' => env('SFTP_USERNAME'),
            'password' => env('SFTP_PASSWORD'), // Or SSH Encryption Password
            'privateKey' => env('SFTP_SSH_PRIVATE_KEY'), // '/path/to/privateKey'
            'port' => env('SFTP_PORT', 22),
            'root' => env('SFTP_ROOT', ''),
            'timeout' => env('SFTP_TIMEOUT', 30),
        ],

        'minio' => [
            'driver' => 's3',
            'endpoint' => env('MINIO_ENDPOINT', 'http://127.0.0.1:9000'),
            'key' => env('MINIO_KEY'),
            'secret' => env('MINIO_SECRET'),
            'region' => env('MINIO_REGION'),
            'bucket' => env('MINIO_BUCKET'),
            'use_path_style_endpoint' => true,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL', ''),
        ],

        's3-cached' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL', ''),
        ],

        'dropbox' => [
            'driver' => 'dropbox',
            'root' => env('DROPBOX_ROOT', '/'),
            'authorization_token' => env('DROPBOX_AUTHORIZATION_TOKEN', ''),
        ],

        'backblaze' => [
            'driver' => 'backblaze',
            'account_id' => env('BACKBLAZE_ACCOUNT_ID'),
            'application_key' => env('BACKBLAZE_APPLICATION_KEY'),
            'bucket' => env('BACKBLAZE_BUCKET'),
        ],

        'digitalocean' => [
            'driver' => 'digitalocean',
            'key' => env('DIGITALOCEAN_KEY'),
            'secret' => env('DIGITALOCEAN_SECRET'),
            'region' => env('DIGITALOCEAN_REGION'),
            'bucket' => env('DIGITALOCEAN_BUCKET'),
        ],

    ],

];

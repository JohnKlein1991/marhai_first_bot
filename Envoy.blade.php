@setup
    $user = 'andrew';
    $timezone = new DateTimeZone('Europe/Moscow');
    $path = '/var/www/project';
    $current = $path . '/current';
    $repo = 'git@github.com:JohnKlein1991/marhai_first_bot.git';
    $branch = 'master';
    $chmods = [
        'storage/logs'
    ];
    $date = new DateTime('now', $timezone);
    $release = $path . '/releases/' . $date->format('YmdHis');
@endsetup
@servers(['prod' => [$user . '@185.231.155.142']])

@story('deploy')
    rm_from_releases
    clone
    composer
    artisan
    chmod
    update_symlinks
@endstory

@story('test')
    test_task
@endstory

@task('test_task', ['on' => 'prod'])
    cd /var/www/project
    ls -l
    echo '#1 Test task has been copleted'
@endtask

@task('rm_from_releases', ['on' => 'prod'])
    rm -Rf /var/www/project/releases/*
    echo '#0 Folder releases is empty'
@endtask

@task('clone', ['on' => 'prod'])
    mkdir -p {{ $release }}
    git clone --depth 1 -b {{ $branch }} "{{ $repo }}" {{ $release }}
    echo "#1 - Repository has been cloned"
@endtask

@task('composer', ['on' => 'prod'])
    composer self-update
    cd {{ $release }}
    composer install --no-interaction --no-dev --prefer-dist
    echo "#2 - Composer dependencies have been installed"
@endtask

@task('artisan', ['on' => 'prod'])
    cd {{ $release }}

    ln -nfs {{ $path }}/.env .env
    chgrp -h www-data .env

    php artisan config:clear

    php artisan migrate
    php artisan clear-compiled --env=production
    php artisan optimize --env=production

    echo "#3 - Production dependencies have been installed"
@endtask

@task('chmod', ['on' => 'prod'])
    chgrp -R www-data {{ $release }}
    chmod -R ug+rwx {{ $release }}

    @foreach($chmods as $file)
        chmod -R 775 {{ $release }}/{{ $file }}
        chown -R {{ $user }}:www-data {{ $release }}/{{ $file }}
        echo "Permission have been set for {{ $file }}"
    @endforeach

    echo "#4 - Permission has been set"
@endtask

@task('update_symlinks', ['on' => 'prod'])
    ln -nfs {{ $release }} {{ $current }}
    chgrp -h www-data {{ $current }}

    echo "#5 - Symlink has been set"
@endtask



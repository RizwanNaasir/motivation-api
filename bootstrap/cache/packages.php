<?php return array (
  'dedoc/scramble' =>
  array (
    'providers' =>
    array (
        0 => 'Dedoc\\Scramble\\ScrambleServiceProvider',
    ),
  ),
    'laravel/sanctum' =>
        array(
            'providers' =>
                array(
                    0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
                ),
        ),
    'laravel/telescope' =>
        array(
            'providers' =>
                array(
                    0 => 'Laravel\\Telescope\\TelescopeServiceProvider',
                ),
        ),
    'nesbot/carbon' =>
        array(
            'providers' =>
                array(
                    0 => 'Carbon\\Laravel\\ServiceProvider',
                ),
        ),
    'nunomaduro/collision' =>
        array(
            'providers' =>
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' =>
  array (
    'providers' =>
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'spatie/laravel-ignition' =>
  array (
    'providers' =>
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' =>
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
);

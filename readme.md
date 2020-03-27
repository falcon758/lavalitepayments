Lavalite package that provides payments management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `shopping/payments`.

    "falcon758/lavalitepayments": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Shopping\Payments\Providers\PaymentsServiceProvider::class,

And also add it to alias

    'Payments'  => Shopping\Payments\Facades\Payments::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Shopping\\PaymentsTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Shopping\Payments\Providers\PaymentsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Shopping\Payments\Providers\PaymentsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Shopping\Payments\Providers\PaymentsServiceProvider" --tag="view"


## Usage



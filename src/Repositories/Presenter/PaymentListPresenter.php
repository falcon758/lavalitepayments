<?php

namespace Shopping\Payments\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class PaymentListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaymentListTransformer();
    }
}
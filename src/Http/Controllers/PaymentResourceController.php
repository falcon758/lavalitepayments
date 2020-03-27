<?php

namespace Shopping\Payments\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Shopping\Payments\Http\Requests\PaymentRequest;
use Shopping\Payments\Interfaces\PaymentRepositoryInterface;
use Shopping\Payments\Models\Payment;

/**
 * Resource controller class for payment.
 */
class PaymentResourceController extends BaseController
{

    /**
     * Initialize payment resource controller.
     *
     * @param type PaymentRepositoryInterface $payment
     *
     * @return null
     */
    public function __construct(PaymentRepositoryInterface $payment)
    {
        parent::__construct();
        $this->repository = $payment;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Shopping\Payments\Repositories\Criteria\PaymentResourceCriteria::class);
    }

    /**
     * Display a list of payment.
     *
     * @return Response
     */
    public function index(PaymentRequest $request)
    {

        if ($this->response->typeIs('json')) {
            $pageLimit = $request->input('pageLimit');
            $data      = $this->repository
                ->setPresenter(\Shopping\Payments\Repositories\Presenter\PaymentListPresenter::class)
                ->getDataTable($pageLimit);
            return $this->response
                ->data($data)
                ->output();
        }

        $payments = $this->repository->paginate();

        return $this->response->title(trans('payments::payment.names'))
            ->view('payments::payment.index', true)
            ->data(compact('payments'))
            ->output();
    }

    /**
     * Display payment.
     *
     * @param Request $request
     * @param Model   $payment
     *
     * @return Response
     */
    public function show(PaymentRequest $request, Payment $payment)
    {

        if ($payment->exists) {
            $view = 'payments::payment.show';
        } else {
            $view = 'payments::payment.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('payments::payment.name'))
            ->data(compact('payment'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new payment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PaymentRequest $request)
    {

        $payment = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('payments::payment.name')) 
            ->view('payments::payment.create', true) 
            ->data(compact('payment'))
            ->output();
    }

    /**
     * Create new payment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PaymentRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $payment                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('payments::payment.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('payments/payment/' . $payment->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/payments/payment'))
                ->redirect();
        }

    }

    /**
     * Show payment for editing.
     *
     * @param Request $request
     * @param Model   $payment
     *
     * @return Response
     */
    public function edit(PaymentRequest $request, Payment $payment)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('payments::payment.name'))
            ->view('payments::payment.edit', true)
            ->data(compact('payment'))
            ->output();
    }

    /**
     * Update the payment.
     *
     * @param Request $request
     * @param Model   $payment
     *
     * @return Response
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        try {
            $attributes = $request->all();

            $payment->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('payments::payment.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('payments/payment/' . $payment->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('payments/payment/' . $payment->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the payment.
     *
     * @param Model   $payment
     *
     * @return Response
     */
    public function destroy(PaymentRequest $request, Payment $payment)
    {
        try {

            $payment->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('payments::payment.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('payments/payment'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('payments/payment/' . $payment->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple payment.
     *
     * @param Model   $payment
     *
     * @return Response
     */
    public function delete(PaymentRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('payments::payment.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('payments/payment'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/payments/payment'))
                ->redirect();
        }

    }

    /**
     * Restore deleted payments.
     *
     * @param Model   $payment
     *
     * @return Response
     */
    public function restore(PaymentRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('payments::payment.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/payments/payment'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/payments/payment/'))
                ->redirect();
        }

    }

}

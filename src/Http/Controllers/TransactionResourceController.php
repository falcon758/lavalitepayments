<?php

namespace Shopping\Payments\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Shopping\Payments\Http\Requests\TransactionRequest;
use Shopping\Payments\Interfaces\TransactionRepositoryInterface;
use Shopping\Payments\Models\Transaction;

/**
 * Resource controller class for transaction.
 */
class TransactionResourceController extends BaseController
{

    /**
     * Initialize transaction resource controller.
     *
     * @param type TransactionRepositoryInterface $transaction
     *
     * @return null
     */
    public function __construct(TransactionRepositoryInterface $transaction)
    {
        parent::__construct();
        $this->repository = $transaction;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Shopping\Payments\Repositories\Criteria\TransactionResourceCriteria::class);
    }

    /**
     * Display a list of transaction.
     *
     * @return Response
     */
    public function index(TransactionRequest $request)
    {

        if ($this->response->typeIs('json')) {
            $pageLimit = $request->input('pageLimit');
            $data      = $this->repository
                ->setPresenter(\Shopping\Payments\Repositories\Presenter\TransactionListPresenter::class)
                ->getDataTable($pageLimit);
            return $this->response
                ->data($data)
                ->output();
        }

        $transactions = $this->repository->paginate();

        return $this->response->title(trans('payments::transaction.names'))
            ->view('payments::transaction.index', true)
            ->data(compact('transactions'))
            ->output();
    }

    /**
     * Display transaction.
     *
     * @param Request $request
     * @param Model   $transaction
     *
     * @return Response
     */
    public function show(TransactionRequest $request, Transaction $transaction)
    {

        if ($transaction->exists) {
            $view = 'payments::transaction.show';
        } else {
            $view = 'payments::transaction.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('payments::transaction.name'))
            ->data(compact('transaction'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new transaction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(TransactionRequest $request)
    {

        $transaction = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('payments::transaction.name')) 
            ->view('payments::transaction.create', true) 
            ->data(compact('transaction'))
            ->output();
    }

    /**
     * Create new transaction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(TransactionRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $transaction                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('payments::transaction.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('payments/transaction/' . $transaction->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/payments/transaction'))
                ->redirect();
        }

    }

    /**
     * Show transaction for editing.
     *
     * @param Request $request
     * @param Model   $transaction
     *
     * @return Response
     */
    public function edit(TransactionRequest $request, Transaction $transaction)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('payments::transaction.name'))
            ->view('payments::transaction.edit', true)
            ->data(compact('transaction'))
            ->output();
    }

    /**
     * Update the transaction.
     *
     * @param Request $request
     * @param Model   $transaction
     *
     * @return Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        try {
            $attributes = $request->all();

            $transaction->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('payments::transaction.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('payments/transaction/' . $transaction->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('payments/transaction/' . $transaction->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the transaction.
     *
     * @param Model   $transaction
     *
     * @return Response
     */
    public function destroy(TransactionRequest $request, Transaction $transaction)
    {
        try {

            $transaction->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('payments::transaction.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('payments/transaction'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('payments/transaction/' . $transaction->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple transaction.
     *
     * @param Model   $transaction
     *
     * @return Response
     */
    public function delete(TransactionRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('payments::transaction.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('payments/transaction'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/payments/transaction'))
                ->redirect();
        }

    }

    /**
     * Restore deleted transactions.
     *
     * @param Model   $transaction
     *
     * @return Response
     */
    public function restore(TransactionRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('payments::transaction.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/payments/transaction'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/payments/transaction/'))
                ->redirect();
        }

    }

}

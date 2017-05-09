<?php

namespace App\Traits;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

trait RestApiController
{
    use Helpers;

    /**
     * Show all items of a resource.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $perPage = (int) app('request')->input('per_page')
            ?: config('repository.pagination.limit');

        if ($this->paginate == false || app('request')->input('per_page') == -1) {
            return $this->response->array($this->repository->all());
        }

        return $this->response->array($this->repository->paginate($perPage));
    }

    /**
     * Store a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->repository->rules());

        $this->repository->create($request);

        return $this->response->created();
    }

    /**
     * Show a single resource.
     *
     * @param int $id
     * @return \Dingo\Api\Http\Response
     */
    public function show(int $id)
    {
        return $this->response->array($this->repository->find($id));
    }


    /**
     * Update a single resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, $this->repository->rules());

        $this->repository->update($this->getRequestValues($request), $id);

        return $this->response->accepted();
    }

    /**
     * Delete a single resource.
     *
     * @param int $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return $this->response->noContent();
    }

    /**
     * Get the request input values.
     * - Get the JSON values first
     * - Get the Form data values if JSON is not available
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function getRequestValues(Request $request)
    {
        if ($request->json()->all()) {
            return $request->json()->all();
        }

        return $request->all();
    }
}

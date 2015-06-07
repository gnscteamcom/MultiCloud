<?php namespace App\Http\Controllers;

use \Response;
use App\Http\Requests;
use App\Services\CloudActionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CloudController extends Controller {

    protected $cloudActionService;

    public function __construct(CloudActionService $cloudActionService)
    {
        $this->cloudActionService = $cloudActionService;
        $this->middleware('clouds.access', ['except' => 'index', 'store']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Auth::user()->clouds;
	}

    public function store(Request $request)
    {
        //save a cloud info
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->cloudActionService->getInfo($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param   Request $request
	 * @param   int $id
	 * @return  Response
	 */
	public function update(Request $request, $id)
	{
        return $this->cloudActionService->rename($id, $request->get('name'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        return response()->json($this->cloudActionService->remove($id));
	}
}
